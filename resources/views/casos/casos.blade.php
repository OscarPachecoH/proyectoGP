<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <img src="https://cdn-icons-png.flaticon.com/512/6823/6823086.png" width="25" height="25">
            {{ __('Casos De Uso') }}
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
                    <h1>AGREGAR CASOS DE USO  </h1>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a><br><br>
                    {{/*Formulario para creacion de casos de uso*/}}
                    <form action="{{route('addCU',$project->id)}}" method="POST">
                        @csrf
                        @include('layouts.messages')
                            <table>
                                <tr>
                                    <td class="label">
                                        <label for="">Clave:</label>
                                    </td>
                                    <td>
                                        <input name="claveCU" type="text"  placeholder="Ejem: CU.01" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Descripcion</label>
                                    </td>
                                    <td>
                                        <textarea name="descCU" id="" cols="30" rows="2"></textarea>
                                    </td>
                                </tr>
                                <tr>
                            
                                    <td>
                                        <input name="idProyecto" type="hidden" value="{{$project->id}}">
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-success">{{/*Boton tipo sudmit para proceso de datos*/}}
                                <img src="https://cdn-icons-png.flaticon.com/512/2740/2740600.png" width="20" height="20">
                                <b>AGREGAR</b>
                            </button><br>
                    </form>
                    {{/*Link tipo boton para mostrar vista de lista de casos de uso*/}}
                    <a class="btn btn-primary" href="{{route('listarCU', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/901/901533.png" width="20" height="20">
                        <b>LISTA DE CSOS DE USO </b>
                    </a>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>