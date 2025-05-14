<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <img src="https://cdn-icons-png.flaticon.com/512/6823/6823086.png" width="25" height="25">
            {{ __('Procesos') }}
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
                    <h1>AGREGAR PROCESOS </h1>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a><br><br>
                    {{/*Formulario principal*/}}
                    <form action="{{route('addProc', $project->id)}}" method="POST">
                        @csrf
                        @include('layouts.messages')
                            <table>
                                <tr>
                                    <td class="label">
                                        <label for="">Clave:</label>
                                    </td>
                                    <td>
                                        <input name="claveProc" type="text"  placeholder="Ejem: PROC.01" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Nombre del proceso:</label>
                                    </td>
                                    <td>
                                        <input name="nombreProc" type="text" size="30">
                                    </td>
                                </tr>
                                <tr>
                            
                                    <td>
                                        <input name="idProyecto" type="hidden" value="{{$project->id}}">
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-success">{{/*Boton para agregar datos*/}}
                                <img src="https://cdn-icons-png.flaticon.com/512/2740/2740600.png" width="20" height="20">
                                <b>AGREGAR</b>
                            </button><br>
                    </form>
                    <a class="btn btn-primary" href="{{route('listarProc', $project->id)}}">{{/*Boton para mostrar lista de procesos*/}}
                        <img src="https://cdn-icons-png.flaticon.com/512/8111/8111775.png" width="20" height="20">
                        <b>LISTA DE PROCESOS</b>
                    </a>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>