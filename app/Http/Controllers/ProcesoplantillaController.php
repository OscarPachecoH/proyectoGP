<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;
use App\Models\Procesoplantilla;
use App\Models\Project;

class ProcesoplantillaController extends Controller
{
    public function plantillaProc(Project $project, Proceso $proceso){
        $listaPlantilla = Procesoplantilla::orderBy('id', 'asc')->paginate();
        return view('procesos.plantilla', compact('listaPlantilla'),compact('proceso', 'project'));
    }

    public function addAtributoProc(Request $request, Project $project, Proceso $proceso){
        $plantilla = new Procesoplantilla();
        $plantilla -> descripcion = $request -> descripcion;
        $plantilla -> actividades = $request -> actividades;
        $plantilla -> actores = $request -> actores;
        $plantilla -> idProceso = $request -> idProceso;
        $plantilla -> idProyecto = $request -> idProyecto;
        
        $plantilla -> save();

        return redirect()->route('addPlantillaProc', compact('project', 'proceso'));
    }
}
