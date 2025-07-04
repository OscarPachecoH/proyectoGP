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
                    <h1 class="titulo">Plantilla del Actor</h1>
                    <a href="{{route('listarAct', $project->id)}}" class="btn btn-warning" >
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a><br><br>
                    <table class="table table-info">{{/*Tabla que muestra los datos de elemento seleccionado*/}}
                        <tr>
                            <td class="bg-info" align="right"><b>Clave</b></td>
                            <td class="bg-info"><b>{{$actor->clave}}</b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Nombre</b></td>
                            <td>{{$actor->nombre}}</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Descripción</b></td>
                            <td>{{$actor->descripcion}}</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Caracteristicas</b></td>
                            <td>{{$actor->caracteristicas}}</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Responsabilidad</b></td>
                            <td>{{$actor->responsabilidad}}</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Referencias</b></td>
                            <td>{{$actor->referencias}}</td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                {{/*Link tipo boton para editar*/}}
                                <a href="{{route('actores.edit', array($project->id, $actor->id))}}" class="btn btn-primary">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3489/3489659.png" width="20" height="20">
                                    <b>ACTUALIZAR</b>
                                </a><br>
                                {{/*Formulario para eliminar datos*/}}
                                <form action="{{route('actores.destroy', array($project->id, $actor->id))}}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20">
                                        <b>ELIMINAR</b>
                                    </button><br><br>
                                </form>
                                <a href="{{route('actores.pdf', array($project->id, $actor->id))}}">
                                        <img src="https://efis.mk/wp-content/uploads/2019/08/pdf-icon.png" width="150" height="150">
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>