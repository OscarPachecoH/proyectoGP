<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actores') }}
        </h2>
    </x-slot>
 
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{/*Parte forntal de la pagina con boton de retorno*/}}
                    <h1>LISTA DE ACTORES</h1>
                    <a href="{{route('actor', $project->id)}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a><br><br>
                    <table class="table table-info">{{/*Tabla que muestra los datos ordenados*/}}
                        <td class="bg-info" align="center"><b>CLAVE</b></td>
                        <td class="bg-info" align="center"><b>NOMBRE</b></th>
                        <td class="bg-info" align="center"><b>DESCRIPCIÓN</b></th>
                        <td class="bg-info" align="center"><b>CARACTERISTICAS</b></th>
                        <td class="bg-info" align="center"><b>RESPONSABILIDAD</b></th>
                        <td class="bg-info" align="center"><b>REFERENCIAS</b></th>
                        <td class="bg-info" align="center"><b>OPCIONES</b></th>
                    @foreach ($actores as $actor)
                        @if ($actor->idProyecto == $project->id)
                            <tr>{{/*Obtencion de datos*/}}
                                <td align="center">{{$actor->clave}}</td>
                                <td align="center">{{$actor->nombre}}</td>
                                <td align="center">{{$actor->descripcion}}</td>
                                <td align="center">{{$actor->caracteristicas}}</td>
                                <td align="center">{{$actor->responsabilidad}}</td>
                                <td align="center">{{$actor->referencias}}</td>
                                <td align="center">
                                    {{/*Lik tipo boton para mostrar datos de actor seleccionado*/}}
                                    <a href="{{route('actores.show', array($project->id, $actor->id))}}" class="btn btn-outline-primary" title="View">
                                        <img src="https://cdn-icons-png.flaticon.com/512/64/64999.png" width="20" height="20">
                                    </a>
                                </td>
                            </tr> 
                        @endif
                    @endforeach
                    </table>
                    {{$actores->links() /*Genera una barra de paginación de datos*/}}
                    <br><br>
                </div>
            </div>
        </div>
    </center>
    
</x-app-layout>