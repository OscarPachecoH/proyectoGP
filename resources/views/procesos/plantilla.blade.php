<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Procesos') }}
        </h2>
    </x-slot>
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table>
                        <tr>
                            <td>
                                {{$proceso->clave}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{$proceso->nombre}}
                            </td>
                        </tr>
                    </table>
                    <form action="{{route('agregarAtributoProc', array($project->id, $proceso->id))}}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td>Descripción:</td>
                                <td>Actividades:</td>
                                <td>Actores:</td>
                            </tr>
                            <tr>
                                <td><textarea name="descripcion" id="" cols="30" rows="2"></textarea></td>
                                <td><textarea name="actividades" id="" cols="30" rows="2"></textarea></td>
                                <td>
                                    <input type="text" name="actores" size="20">
                                </td>
                                <td><input type="hidden" name="idProceso" value="{{$proceso->id}}"></td>
                                <td><input type="hidden" name="idProyecto" value="{{$project->id}}"></td>
                            </tr>
                        </table><br>
                        <button class="btn btn-success">Agregar</button>
                    </form><br>
                    <table class="table table-primary">
                        <tr>
                            <td class="bg-primary">Descripción:</td>
                            <td class="bg-primary">Actividades:</td>
                            <td class="bg-primary">Actores:</td>
                            <td class="bg-primary" align="center">Acciones:</td>
                        </tr>
                        @foreach ($listaPlantilla as $plantilla)
                            @if ($plantilla->idProceso == $proceso->id && $plantilla->idProyecto == $project->id)
                                <tr>
                                    <td>{{$plantilla->descripcion}}</td>
                                    <td>{{$plantilla->actividades}}</td>
                                    <td>{{$plantilla->actores}}</td>
                                    <td>
                                        <form action="{{route('destroyPlantillaProc', array($project->id, $proceso->id,$plantilla->id))}}"  method="POST" align="center">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20" title="Eliminar">
                                            </button>
                                        </form>
                                    </td>
                                </tr> 
                            @endif
                        @endforeach
                    </table>
                    <a href="{{route('pdfProc', array($project->id, $proceso->id))}}">
                        <img src="https://efis.mk/wp-content/uploads/2019/08/pdf-icon.png" width="150" height="150">
                    </a>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>