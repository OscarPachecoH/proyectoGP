<?php

namespace App\Http\Controllers;
use App\Models\Caso;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class CasoController extends Controller
{
    public function addCU(Request $request, Project $project){

        $request -> validate([
            'claveCU' => 'required',
            'descCU' => 'required'
        ]);

        $caso = new Caso();

        $caso -> clave = $request -> claveCU;
        $caso -> descripcion = $request -> descCU;
        $caso -> idProyecto= $request -> idProyecto;
        
        $caso -> save();

        return redirect()->route('caso',compact('project'));
    }

    public function plantillaCasos(Project $project){
        return view('casos.casos', compact('project'));
    }

    public function listarCU(Project $project){
        $casos = Caso::orderBy('id', 'asc')->paginate();
        return view('casos.listarCaso',compact('casos'), compact('project'));
    }

    public function destroy(Project $project, Caso $caso){
        $caso->delete();
        return redirect()->route('listarCU', compact('project'));
    }

    public function editCU(Project $project, Caso $caso){
        $casos = Caso::orderBy('id', 'asc')->paginate();
        return view('casos.edit', compact('caso', 'project'), compact('casos'));
    }

    public function updateCU(Request $request,Project $project,Caso $caso){
        $caso->update($request->all());
        return redirect()->route('listarCU',compact('project'));
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaCU = Caso::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('casos.pdfCU',compact('listaCU'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaCU.pdf'); 
    }
}
