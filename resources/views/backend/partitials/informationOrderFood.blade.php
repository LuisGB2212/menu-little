<table class="table table-responsive-lg table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($drinkFoods as $drinkFood)
            <tr>
                <td>
                    <strong>{{$drinkFood->drinkFood->name}}</strong> <br>
                    {{$drinkFood->details}}
                </td>
                <td>{{$drinkFood->quantity}}</td>
                <td>{{$drinkFood->price}}</td>
                <td id="btnOrderServ{{$drinkFood->id}}">
                    @if ($drinkFood->status == 'pendiente')
                        <button type="button" idDrinkFoodOrder="{{$drinkFood->id}}" class="btn btn-danger drinkFoodOrderServ">
                            Marcar como Servido
                        </button>
                    @else
                        <button type="button" class="btn btn-success">
                            {{$drinkFood->status}}
                        </button>
                        
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>