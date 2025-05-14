<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>
    <style>
        .label{
            text-align: end
        }
    </style>
    <center>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>AGREGAR PROYECTO </h1>
                {{--Formulario principal--}}
                <form action="{{route('addPro')}}" method="POST">
                    @csrf
                    @include('layouts.messages')
                        <table>
                            <tr>
                                <td>
                                    <label for="">Nombre:</label>
                                </td>
                                <td>
                                    <input name="nomPro" type="text" size="30">
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-success">
                            {{--Boton para agregar datos--}}
                            <img src="https://cdn-icons-png.flaticon.com/512/2740/2740600.png" width="20" height="20">
                            <b>AGREGAR</b>
                        </button><br><br>
                </form>
                <a class="btn btn-primary" href="{{route('listarPro')}}">
                    {{--Boton para mostrar lista de proyectos--}}
                    <img src="https://cdn-icons-png.flaticon.com/512/839/839860.png" width="20" height="20">
                    <b>LISTA DE PROYECTOS</b>
                </a>
            </div>
        </div>
    </div>
</center>
</x-app-layout>