<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class ProcesoController extends Controller
{
    public function addProc(Request $request, Project $project){
        $proceso = new Proceso();

        $proceso -> clave = $request -> claveProc;
        $proceso -> nombre = $request -> nombreProc;
        $proceso -> idProyecto= $request -> idProyecto;
        
        $proceso -> save();

        return redirect()->route('proceso',compact('project'));
    }

    public function plantillaProceso(Project $project){
        return view('procesos.procesos', compact('project'));
    }

    public function listarProc(Project $project){
        $procesos = Proceso::orderBy('id', 'asc')->paginate();
        return view('procesos.listarProceso',compact('procesos'), compact('project'));
    }

    public function showProc(Project $project, Proceso $proceso){
        return view('procesos.show', compact('proceso', 'project'));
    }

    public function editProc(Project $project, Proceso $proceso){
        $procesos = Proceso::orderBy('id', 'asc')->paginate();
        return view('procesos.edit', compact('proceso', 'project'), compact('procesos'));
    }

    public function updateProc(Request $request,Project $project,Proceso $proceso){
        $proceso->update($request->all());
        return view('procesos.show', compact('proceso', 'project'));
    }

    public function destroyProc(Project $project, Proceso $proceso){
        $proceso->delete();
        return redirect()->route('listarProc', compact('project'));
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaPro = Proceso::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('procesos.pdfProcesos',compact('listaPro'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('TablaProcesos.pdf'); 
    }
}
