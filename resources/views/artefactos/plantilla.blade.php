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
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a><br><br>
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
                                <td><input type="text" name="atributo" value="{{old('atributo')}}"></td>
                                <td><input type="text" name="descripcion" value="{{old('descripcion')}}"></td>
                                <td>
                                    <select name="tipo" id="">
                                        <option value="">--SELECCIONAR--</option>
                                        <option value="Numerico">Numerico</option>
                                        <option value="Cadena">Cadena</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="rango" id="">
                                        <option value="">--SELECCIONAR--</option>
                                        <option value="[0-9]">[0-9]</option>
                                        <option value="[A-Z], [a-z]">[A-Z], [a-z]</option>
                                        <option value="[A-Z], [a-z], [0-9]">[A-Z], [a-z], [0-9]</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="checkbox" name="exec1" id="excep1" value="No se permiten letras">
                                    <label for="excep1">No se permiten letras</label><br>
                                    <input type="checkbox" name="exec2" id="excep2" value="No se permiten numeros">
                                    <label for="excep2">No se permiten numeros</label><br>
                                    <input type="checkbox" name="exec3" id="excep2" value="No se caracteres especiales">
                                    <label for="excep2">No se permiten caracteres especiales</label>
                                    <!--select name="excepciones" id="">
                                        <option value="">--SELECCIONAR--</option>
                                        <option value="No se permiten letras">No se permiten letras</option>
                                        <option value="No se permiten numeros">No se permiten numeros</option>
                                        <option value="No se permiten caracteres especiales">No se permiten caracteres especiales</option>
                                    </select-->
                                </td>
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
                            <td class="bg-primary" align="center">Atributo:</td>
                            <td class="bg-primary" align="center">Descripción:</td>
                            <td class="bg-primary" align="center">Tipo:</td>
                            <td class="bg-primary" align="center">Rango:</td>
                            <td class="bg-primary" align="center">Excepciones:</td>
                        </tr>
                        @foreach ($listaPlantilla as $plantilla)
                            @if ($plantilla->idArtefacto == $artefacto->id && $plantilla->idProyecto == $project->id)
                                <tr>
                                    <td align="center">{{$plantilla->atributos}}</td>
                                    <td align="center">{{$plantilla->descripcion}}</td>
                                    <td align="center">{{$plantilla->tipo}}</td>
                                    <td align="center">{{$plantilla->rango}}</td>
                                    <td align="center">{{$plantilla->excepciones}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>