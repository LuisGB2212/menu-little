@if (Request()->session()->has('client'))
    <div class="col-lg-12">
        <strong>Cliente: {{Request()->session()->get('client')['name']}}</strong> <br>
        <strong>Teléfono: {{Request()->session()->get('client')['phone']}}</strong> <br>
        <strong>Dirección: {{Request()->session()->get('client')['address']}}</strong> <br>
        <strong>Referencias: {{Request()->session()->get('client')['references']}}</strong> <br>
        <strong>Correo: {{Request()->session()->get('client')['email']}}</strong> <br>
    </div>
@else
    <div class="col-lg-12">
        <strong>Datos para su orden</strong>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
            <div class="col-md-6">
                <input id="phone" type="text" maxlength="10" class="form-control" name="phone" required autocomplete="phone">
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
            </div>
        </div>
        <div class="form-group row">
            <label for="references" class="col-md-4 col-form-label text-md-right">{{ __('Referencias') }}</label>
            <div class="col-md-6">
                <input id="references" type="text" class="form-control" name="references" required autocomplete="references">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
            </div>
        </div>
    </div>
@endif
