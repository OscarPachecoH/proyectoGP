<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Casos') }}
        </h2>
    </x-slot>
 
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>LISTA DE CASOS DE USO</h1>
                    <a href="{{route('caso', $project->id)}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a><br><br>
                    <table class="table table-info">
                        <td class="bg-info" align="center"><b>CLAVE</b></td>
                        <td class="bg-info" align="center"><b>DESCRIPCIÓN</b></th>
                        <td class="bg-info" align="center"><b>OPCIONES</b></th>
    
                    @foreach ($casos as $caso)
                        @if($caso->idProyecto == $project->id)
                            <tr>
                                <td align="center">{{$caso->clave}}</td>
                                <td align="center">{{$caso->descripcion}}</td>
                                <td align="center">
                                    <a href="{{route('editCU', array($project->id, $caso->id))}}" class="btn btn-outline-primary"><img src="https://img.icons8.com/ios/50/null/edit-file.png" width="20" height="20" title="Editar"/>
                                    </a>
                                    <form action="{{route('casos.destroy', $caso)}}"  method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" width="20" height="20" title="Eliminar">
                                        </button><br><br>
                                    </form>
                                </td>
                            </tr> 
                        @endif 
                    @endforeach
                    </table>
                    <a href="{{route('pdfCU', $project->id)}}">
                        <img src="https://efis.mk/wp-content/uploads/2019/08/pdf-icon.png" width="150" height="150">
                    </a>
                    {{$casos->links()}}
                    <br><br>
                </div>
            </div>
        </div>
    </center>
    
</x-app-layout>