<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <table class="table">
            <thead>
            <th> #</th>
            <th>Matricula</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Detalle</th>
            <th>Editar</th>
            </thead>
            <tbody>
            @foreach($myCars as $myCar)
                <tr>

                <td>{{$myCar->id}}</td>
                <td>{{$myCar->matricula}}</td>
                <td>{{$myCar->marca}}</td>
                <td>{{$myCar->modelo}}</td>
                <td><a href="{{url('car/'. $myCar->id)}}" class="btn btn-primary" >Detalle</a></td>
                <td><a href="{{url('car/' . $myCar->id .'/edit')}}" class="btn btn-secondary">Editar</a></td>

                <td>
                    <form action="{{url('car/'. $myCar->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="borrar" class="btn btn-warning">Borrar</button>

                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endsection
</x-app-layout>

