<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyecto: ' . $project->nombreProyecto) }}
        </h2>
    </x-slot>
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
                    <h1 class="titulo">Inicio</h1>
                    <a href="{{route('listarPro')}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <br><br>
                    {{/*Tabla que muestra los datos del proyecto*/}}
                    <table class="table table-info">
                        <tr>
                            <td class="bg-info" align="right"><b>Nombre:</b></td>
                            <td>{{$project->nombreProyecto}}</td>
                        </tr>
                        <tr>
                            <td class="bg-info" align="right"><b>Creado el:</b></td>
                            <td>{{$project->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                    {{/*Tabla que muestra las opciones de proyecto*/}}
                    <table>
                        <tr>
                            <td align="right">
                                {{/*Link de ruta Actor*/}}
                                <a href="{{route('actor', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4175/4175032.png" width="25" height="25">
                                    AGREGAR ACTOR
                                </a>
                            </td>
                            <td align="left">
                                {{/*Link de ruta Artefacto*/}}
                                <a href="{{route('artefacto', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1091/1091916.png" width="25" height="25">
                                    AGREGAR ARTEFACTO
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{/*Link de ruta Requerimiento Funcional*/}}
                                <a href="{{route('RFuncional', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4698/4698650.png" width="25" height="25">
                                    AGREGAR REQUERIMIENTO FUNCIONAL
                                </a>
                            </td>
                            <td>
                                {{/*Link de ruta Requerimiento No Funcional*/}}
                                <a href="{{route('RNFuncional', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/444/444219.png" width="25" height="25">
                                    AGREGAR REQUERIMIENTO NO FUNCIONAL
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                {{/*Link de ruta Proceso*/}}
                                <a href="{{route('proceso', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2360/2360235.png" width="25" height="25">
                                    AGREGAR PROCESO
                                </a>
                            </td>
                            <td align="left">
                                {{/*Link de ruta Caso de uso*/}}
                                <a href="{{route('caso', $project->id)}}" class="btn btn-light">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2360/2360235.png" width="25" height="25">
                                    AGREGAR CASO DE USO
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                {{/*Formulario para eliminacion de datos*/}}
                                <form action="{{route('projects.destroy', $project->id)}}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20" title="Eliminar">
                                        <b>Eliminar</b>
                                    </button><br><br>
                                </form>
                            </td> 
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>