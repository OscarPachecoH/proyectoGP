<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artefacto;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class ArtefactoController extends Controller
{
    public function addArt(Request $request, Project $project){

        $request -> validate([
            'claveArt' => 'required|min:4',
            'nomArt' => 'required',
            'descArt' => 'required'
        ]);

        $artefacto = new Artefacto();

        $artefacto -> clave = $request -> claveArt;
        $artefacto -> nombre = $request -> nomArt;
        $artefacto -> descripcion = $request -> descArt;
        $artefacto -> idProyecto= $request -> idProyecto;
        
        $artefacto -> save();

        return redirect()->route('artefacto',compact('project'));
    }

    public function plantillaArtefacto(Project $project){
        return view('artefactos.artefactos', compact('project'));
    }

    public function listarArt(Project $project){
        $artefactos = Artefacto::orderBy('id', 'asc')->paginate();
        return view('artefactos.listarArtefacto',compact('artefactos'), compact('project'));
    }

    public function showArt(Project $project, Artefacto $artefacto){
        return view('artefactos.show', compact('artefacto', 'project'));
    }

    public function editArt(Project $project, Artefacto $artefacto){
        $artefactos = Artefacto::orderBy('id', 'asc')->paginate();
        return view('artefactos.edit', compact('artefacto', 'project'), compact('artefactos'));
    }

    public function updateArt(Request $request,Project $project,Artefacto $artefacto){
        $artefacto->update($request->all());
        return view('artefactos.show', compact('artefacto', 'project'));
    }

    public function destroyArt(Artefacto $artefacto){
        $artefacto->delete();
        return redirect()->route('listarArt');
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaArt = Artefacto::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('artefactos.pdfArtefactos',compact('listaArt'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('TablaArtefactos.pdf'); 
    }

}
