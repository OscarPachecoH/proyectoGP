<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;
use App\Models\Procesoplantilla;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class ProcesoplantillaController extends Controller
{
    public function plantillaProc(Project $project, Proceso $proceso){
        $listaPlantilla = Procesoplantilla::orderBy('id', 'asc')->paginate();
        return view('procesos.plantilla', compact('listaPlantilla'),compact('proceso', 'project'));
    }

    public function addAtributoProc(Request $request, Project $project, Proceso $proceso){

        $request -> validate([
            'descripcion' => 'required',
            'actividades' => 'required',
            'actores' => 'required'
        ]);

        $plantilla = new Procesoplantilla();
        
        $plantilla -> descripcion = $request -> descripcion;
        $plantilla -> actividades = $request -> actividades;
        $plantilla -> actores = $request -> actores;
        $plantilla -> idProceso = $request -> idProceso;
        $plantilla -> idProyecto = $request -> idProyecto;
        
        $plantilla -> save();

        return redirect()->route('addPlantillaProc', compact('project', 'proceso'));
    }

    public function destroy(Project $project, Proceso $proceso, Procesoplantilla $plantilla){
        $plantilla->delete();
        return redirect()->route('addPlantillaProc',compact('project','proceso'));
    }

    public function generatepdf($project,$proceso){
        $pro = Project::find($project);
        $proc = Proceso::find($proceso);
        $listaPro = Procesoplantilla::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('procesos.pdfPro',compact('listaPro'),compact('proc','pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaProceso-'.$proc->clave.'.pdf'); 
    }
}
