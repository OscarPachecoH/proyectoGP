<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Casos') }}
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
                    <h1>EDITAR CASO DE USO</h1>
                    <a href="{{route('listarCU',array($project->id, $caso->id))}}" class="btn btn-warning" >
                        <img src="https://cdn-icons-png.flaticon.com/512/60/60775.png" width="20" height="20">
                        <b>REGRESAR</b>
                    </a>
                    <a class="btn btn-warning" href="{{route('projects.show', $project->id)}}">
                        <img src="https://cdn-icons-png.flaticon.com/512/4675/4675164.png" width="20" height="20" title="Inicio">
                    </a><br><br>
                    <form action="{{route('updateCU', array($project->id, $caso->id))}}" method="POST" >
                        @csrf
                        @method('put')
                        <table>
                            <tr>
                                <td class="label">
                                    <label for="">Clave:</label>
                                </td>
                                <td>
                                    <input name="clave" type="text" placeholder="Ejem: CU.01" value="{{old('clave', $caso->clave)}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="label">
                                    <label for="">Descripcion:</label>
                                </td>
                                <td>
                                    <textarea name="descripcion" id="" cols="30" rows="3" >{{old('descripcion', $caso->descripcion)}}</textarea>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary">
                            <img src="https://cdn-icons-png.flaticon.com/512/3489/3489659.png" width="20" height="20">
                            <b>ACTUALIZAR</b>
                        </button><br>
                    </form>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>