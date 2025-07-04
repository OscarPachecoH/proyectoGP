<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <img src="https://cdn-icons-png.flaticon.com/512/6823/6823086.png" width="25" height="25">
            {{ __('Actores') /*Titulo de encabezado*/}}
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
                    {{/*Parte forntal de la pagina con boton de retorno*/}}
                    <h1>AGREGAR ACTOR </h1>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    {{/*Formulario para creacion de actor*/}}
                    <form action="{{route('addAct', $project->id)}}" method="POST">
                        @csrf
                        @include('layouts.messages')
                            <table>
                                <tr>
                                    <td class="label">
                                        <label for="">Clave:</label>
                                    </td>
                                    <td>
                                        <input name="claveAct" type="text"  placeholder="Ejem: ACT.01" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Nombre:</label>
                                    </td>
                                    <td>
                                        <input name="nomAct" type="text" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Descripción:</label>
                                    </td>
                                    <td>
                                        <textarea name="descAct" id="" cols="30" rows="3"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Caracteristicas:</label>
                                    </td>
                                    <td>
                                        <textarea name="caractAct" id="" cols="30" rows="2"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        <label for="">Responsabilidad:</label>
                                    </td>
                                    <td>
                                        <textarea name="resAct" id="" cols="30" rows="2"></textarea>
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
                    {{/*Link tipo boton para mostrar vista de lista de actores*/}}
                    <a class="btn btn-primary" href="{{route('listarAct', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4803/4803187.png" width="20" height="20">
                        <b>LISTA DE ACTORES</b>
                    </a>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>