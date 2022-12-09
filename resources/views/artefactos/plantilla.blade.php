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
                    <h1>{{$artefacto->clave . ": " . $artefacto->nombre}}</h1>
                    <a href="{{route('showArt', array($project->id, $artefacto->id))}}" class="btn btn-warning">
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <form action="{{route('agregarAtributo', array($project->id, $artefacto->id))}}" method="POST">
                        @csrf
                        @include('layouts.messages')
                        <table>
                            <tr>
                                <td>Atributo:</td>
                                <td>Descripción:</td>
                                <td>Tipo:</td>
                                <td>Rango:</td>
                                <td>Excepciones:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="atributo"></td>
                                <td><input type="text" name="descripcion"></td>
                                <td><input type="text" name="tipo"></td>
                                <td><input type="text" name="rango"></td>
                                <td><input type="text" name="excepciones"></td>
                                <td><input type="hidden" name="idArtefacto" value="{{$artefacto->id}}"></td>
                                <td><input type="hidden" name="idProyecto" value="{{$project->id}}"></td>
                            </tr>
                        </table><br>
                        <button class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/512/2740/2740600.png" width="20" height="20">
                            <b>AGREGAR</b>
                        </button>
                    </form><br>
                    <table class="table table-primary">
                        <tr>
                            <td class="bg-primary">Atributo:</td>
                            <td class="bg-primary">Descripción:</td>
                            <td class="bg-primary">Tipo:</td>
                            <td class="bg-primary">Rango:</td>
                            <td class="bg-primary">Excepciones:</td>
                        </tr>
                        @foreach ($listaPlantilla as $plantilla)
                            @if ($plantilla->idArtefacto == $artefacto->id && $plantilla->idProyecto == $project->id)
                                <tr>
                                    <td>{{$plantilla->atributos}}</td>
                                    <td>{{$plantilla->descripcion}}</td>
                                    <td>{{$plantilla->tipo}}</td>
                                    <td>{{$plantilla->rango}}</td>
                                    <td>{{$plantilla->excepciones}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <a href="{{route('pdfArt', array($project->id, $artefacto->id))}}">
                        <img src="https://efis.mk/wp-content/uploads/2019/08/pdf-icon.png" width="150" height="150">
                    </a>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>