
<a href="{{action([\App\Http\Controllers\FrutaController::class, 'naranjas'])}}">Ir a naranjas</a>
<a href="{{action([\App\Http\Controllers\FrutaController::class, 'peras'])}}">Ir a peras</a>
<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta}}</li>
    @endforeach
</ul>

@if(session('error'))
        {{session('error')}}
@endif
<form action="" method="post">
        @csrf
        <p>
                <input type="text" name="nombre" placeholder="Nombre de la fruta" value="{{old('nombre')}}">
        </p>

        <p>
                <input type="textarea" name="descripcion" placeholder="Descripción">
        </p>
        <p>
                <input type="submit" name="enviar" value="enviar">
        </p>
</form>

<ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
</ul>