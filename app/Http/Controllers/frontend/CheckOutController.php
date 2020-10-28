<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Order;
use App\CheckOrder;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as RequestGuz;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        alert()->success('Error de entrada', 'Aun no tiene order procesada');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    function getApiKey()
    {
        return 'PGYtiQpsdo922ADGgFHQWAx5Sk0t4IaQ';
    }
    function getApiSecret()
    {
        //DO NOT HARDCODE THIS VALUE, YOU SHOULD STORE IT ON A SECURE WAY. FOR EXAMPLE: READ IT FROM DATABASE
        return 'PV9F3ivW4izlPbn9';
    }

    function create_uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    function createMessageSignature($CLIENT_REQUEST_ID, $TIMESTAMP, $DATA)
    {
        $msg = $this->getApiKey() . $CLIENT_REQUEST_ID . $TIMESTAMP . $DATA;
        $hmac = hash_hmac('sha256', $msg, $this->getApiSecret());
        $messageSignature = base64_encode($hmac);
        return $messageSignature;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->session()->has('order')){
            $request->validate([
                'card_number' => 'required',
                'card_cvv' => 'required',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'card_name' => 'required',
            ]);
            $orderSession = $request->session()->get('order');
            $order = Order::findOrFail($orderSession['id']);
            $result = '';
            if (!is_object($result))
                $result = new \stdClass;

            //BUILD TRANSACTION
            $transaction = ["paymentMethod"=>[
                "paymentCard"=> [
                    "number" => $request->card_number,
                    "securityCode" => $request->card_cvv,
                    "expiryDate" => [
                        "month" => $request->exp_month,
                        "year" => $request->exp_year
                    ]
                ]
            ],
            "transactionAmount" =>["total"=>$order->total(),"currency"=>"MXN"],
            "requestType"=>"PaymentCardSaleTransaction"];
        
            //SERIALIZE TO JSON
            $data_string = json_encode($transaction);
        
            //GET VALUES FOR HEADERS AND SIGNATURE
            $API_KEY = $this->getApiKey();
            $uuid = $this->create_uuid();
            $timestamp = round(microtime(true) * 1000);
            $msg_signature = $this->createMessageSignature($uuid, $timestamp, $data_string);
        
            //API URL
            $url = "https://cert.api.firstdata.com/gateway/v2/";

            //PREPARE REQUEST
            $client = new Client([
                'base_uri' => $url,
                'timeout' => 30.0,
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                'http_errors' => false
            ]);
            $headers = [
                'Api-Key' => $API_KEY,
                'Client-Request-Id' => $uuid,
                'Timestamp' => $timestamp,
                'Message-Signature' => $msg_signature
            ];

            try {
                //SEND REQUEST
                $requestResult = new RequestGuz('POST', 'payments', $headers, $data_string);
                $response = $client->send($requestResult);
                http_response_code($response->getStatusCode());
                $result = json_decode($response->getBody()->getContents());
                
                if($result->transactionStatus == 'APPROVED'){
                    $checkOrder = CheckOrder::create([
                        'payment_method' => $result->paymentMethodDetails->paymentMethodType,
                        'transaction_status' => 'Aprobado',
                        'payment_id' => $result->ipgTransactionId,
                        'order_id' => $order->id
                    ]);
                    $order->diner_id = $request->session()->get('client')['id'];
                    $order->save();
                    $request->session()->pull('client');
                    $request->session()->pull('order');
                    $request->session()->pull('table');
                }

            } catch (Exception $e) {
                http_response_code(503);
                //HANDLE GUZZLE EXCEPTION 
                //FOR EXAMPLE: SERVER IMPOSSIBLE TO REACH DUE CONNECTION ERRORS
            }
        }

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $payOrder = Order::where('number_order',$order)->first();
        return view('frontend.checkOut',compact('payOrder'));
        //return $payOrder->checkOrders;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
