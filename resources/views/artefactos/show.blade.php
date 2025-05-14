<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artefactos') }}
        </h2>
    </x-slot>
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{/*Parte forntal de la pagina con boton de retorno*/}}
                    <h1 class="titulo">Artefacto</h1>
                    <a href="{{route('listarArt', $project->id)}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a>
                    <br><br>
                    <table class="table table-info">{{/*Tabla que muestra los datos de elemento seleccionado*/}}
                        <tr>
                            <td class="bg-info" align="right"><b>Clave</b></td>
                            <td class="bg-info"><b>{{$artefacto->clave}}</b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Nombre</b></td>
                            <td>{{$artefacto->nombre}}</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Descripción</b></td>
                            <td>{{$artefacto->descripcion}}</td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <a href="{{route('editArt', array($project->id, $artefacto->id))}}" class="btn btn-primary">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3489/3489659.png" width="20" height="20">
                                    <b>ACTUALIZAR</b>
                                </a><br>
                                {{/*Formulario para eliminar datos*/}}
                                <form action="{{route('destroyArt', array($project->id, $artefacto->id))}}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20">
                                        <b>ELIMINAR</b>
                                    </button><br><br>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                {{/*Link tipo boton para creacion de plantilla*/}}
                                <a href="{{route('addPlantilla', array($project->id, $artefacto->id))}}" class="btn btn-outline-dark">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2875/2875069.png" width="20" height="20">
                                    <b>HACER PLANTILLA</b>
                                </a><br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>