<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar la información') }}
        </h2>
    </x-slot>


    @section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contenido de edit.blade
        </h2>
        <div class="md:container mx-auto">
            <div class="max-w-md mx-auto">
                <form action="{{url('car/' . $myCar->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mt-2">
                        <div>
                            <input type="text" value="{{$myCar->matricula}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Matrícula" name="matricula">

                        </div>
                        <div class="mt-2">
                            <input type="text" value="{{$myCar->marca}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Marca" name="marca">

                        </div>
                        <div class="mt-2">
                            <input type="text" value="{{$myCar->modelo}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Modelo" name="modelo">

                        </div >
                        <div class="mt-2">
                            <input type="text" value="{{$myCar->year}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Año" name="year">

                        </div>
                        <div class="mt-2">
                            <input type="text" value="{{$myCar->color}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Color" name="color">

                        </div >
                        <div class="mt-2">
                            <input type="date" value="{{$myCar->fecha_ultima_revision}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Fecha última revisión" name="ult_revision">

                        </div>
                        <div class="mt-2">
                            <img class="w-25" src="{{asset($url.$myCar->foto)}}">
                            <input type="file"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Foto" name="foto">

                        </div>
                        <div class="mt-2">
                            <input type="number" value="{{$myCar->precio}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Precio" name="precio">

                        </div>

                        <div class="mt-2">
                            <input type="submit" class="btn btn-primary" value="Enviar" name="enviar">

                        </div>


                    </div>
                </form>

            </div>

        </div>

    @endsection
</x-app-layout>