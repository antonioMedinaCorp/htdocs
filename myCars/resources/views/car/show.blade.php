<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @section('content')
    <h1>{{$myCar->marca}}-{{$myCar->modelo}}</h1>
    <div class="row">
        <div class="col-sm-4">
            <img class="rounded float-left w-50" src="{{asset($url.$myCar->foto)}}" >
        </div>
        <div class="col-sm-8">
            <h2>Matrícula: {{$myCar->matricula}}</h2>
            <h2>Año: {{$myCar->year}}</h2>
            <h2>Color: {{$myCar->color}}</h2>
            <h2>Última Revisión: {{$myCar->fecha_ultima_revision}}</h2>
            <h2>Precio: {{$myCar->precio}}</h2>
        </div>
    </div>
    @endsection
</x-app-layout>