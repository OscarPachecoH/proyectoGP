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
                    
                    <h1>LISTA DE PROCESOS</h1>
    
                    <table class="table table-info">
                        <td class="bg-info" align="center"><b>CLAVE</b></td>
                        <td class="bg-info" align="center"><b>NOMBRE</b></th>
                        <td class="bg-info" align="center"><b>OPCIONES</b></th>
    
                    @foreach ($procesos as $proceso)
                        @if($proceso->idProyecto == $project->id)
                            <tr>
                                <td align="center">{{$proceso->clave}}</td>
                                <td align="center">{{$proceso->nombre}}</td>
                                <td align="center">
                                    <a href="{{route('showProc', array($project->id, $proceso->id))}}" class="btn btn-outline-primary" title="View">
                                        <img src="https://cdn-icons-png.flaticon.com/512/64/64999.png" width="20" height="20">
                                    </a>
                                </td>
                            </tr> 
                        @endif 
                    @endforeach
                    </table>
                    {{$procesos->links()}}
                    <br><br>
                    <a href="{{route('proceso', $project->id)}}"><button class="btn btn-warning">Regresar</button></a>
                </div>
            </div>
        </div>
    </center>
    
</x-app-layout>