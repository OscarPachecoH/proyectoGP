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
                    <h1 class="titulo">Procesos</h1>
                    <a href="{{route('listarProc', $project->id)}}" class="btn btn-warning" >
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a><br><br>
                    <table class="table table-info">
                        <tr>
                            <td class="bg-info" align="right"><b>Clave</b></td>
                            <td class="bg-info"><b>{{$proceso->clave}}</b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Nombre</b></td>
                            <td>{{$proceso->nombre}}</td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <a href="{{route('editProc', array($project->id, $proceso->id))}}" class="btn btn-primary">Actualizar</a><br>
                                <form action="{{route('destroyProc', array($project->id, $proceso->id))}}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20" title="Eliminar">
                                        <b>Eliminar</b>
                                    </button><br><br>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <a href="{{route('addPlantillaProc', array($project->id, $proceso->id))}}" class="btn btn-primary">Hacer Plantilla</a><br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>