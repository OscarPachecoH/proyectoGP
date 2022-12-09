<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RNFuncional') }}
        </h2>
    </x-slot>

    <style>
        .label{
            text-align: end
        }
    </style>
    <center>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>EDITAR NO REQUERIMIENTO FUNCIONAL </h1><br><br>
                    <form action="{{route('updateRNF', array($project->id, $RNFuncional->id))}}" method="POST" >
                        @csrf
                        @method('put')
                        <table>
                            <tr>
                                <td class="label">
                                    <label for="">Clave:</label>
                                </td>
                                <td>
                                    <input name="clave" type="text" placeholder="Ejem: CU.01" value="{{old('clave', $RNFuncional->clave)}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="label">
                                    <label for="">Descripcion:</label>
                                </td>
                                <td>
                                    <textarea name="descripcion" id="" cols="30" rows="3" >{{old('descripcion', $RNFuncional->descripcion)}}</textarea>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-success">Actualizar</button><br>
                        <a href="{{route('listarRNF',array($project->id, $RNFuncional->id))}}" class="btn btn-danger" >Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>