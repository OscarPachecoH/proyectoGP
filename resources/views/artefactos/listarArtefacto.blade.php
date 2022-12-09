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
                    <h1>LISTA DE ARTEFACTOS</h1>
                    <a href="{{route('artefacto', $project->id)}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a><br><br>
                    <table class="table table-info">
                        <td class="bg-info" align="center"><b>CLAVE</b></td>
                        <td class="bg-info" align="center"><b>NOMBRE</b></th>
                        <td class="bg-info" align="center"><b>DESCRIPCIÓN</b></th>
                        <td class="bg-info" align="center"><b>OPCIONES</b></th>
                    @foreach ($artefactos as $artefacto)
                        @if($artefacto->idProyecto == $project->id)
                            <tr>
                                <td align="center">{{$artefacto->clave}}</td>
                                <td align="center">{{$artefacto->nombre}}</td>
                                <td align="center">{{$artefacto->descripcion}}</td>
                                <td align="center">
                                    <a href="{{route('showArt', array($project->id, $artefacto->id))}}" class="btn btn-outline-primary" title="View">
                                        <img src="https://cdn-icons-png.flaticon.com/512/64/64999.png" width="20" height="20">
                                    </a>
                                </td>
                            </tr> 
                        @endif 
                    @endforeach
                    </table>
                    <a href="{{route('pdfListArt',$project->id)}}">
                        <img src="https://efis.mk/wp-content/uploads/2019/08/pdf-icon.png" width="150" height="150">
                    </a>
                    {{$artefactos->links()}}
                    <br><br>
                </div>
            </div>
        </div>
    </center>
    
</x-app-layout>