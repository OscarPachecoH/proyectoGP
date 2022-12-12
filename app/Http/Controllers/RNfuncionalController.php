<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RNfuncional;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class RNfuncionalController extends Controller
{
    public function addRNF(Request $request, Project $project){

        $request -> validate([
            'claveRNF' => 'required',
            'descRNF' => 'required'
        ]);

        $RNFuncional = new RNfuncional();

        $RNFuncional -> clave = $request -> claveRNF;
        $RNFuncional -> descripcion = $request -> descRNF;
        $RNFuncional -> idProyecto= $request -> idProyecto;
        
        $RNFuncional -> save();

        return redirect()->route('RNFuncional',compact('project'));
    }

    public function plantillaRNFuncionales(Project $project){
        return view('RNFuncionales.RNFuncionales', compact('project'));
    }

    public function listarRNF(Project $project){
        $RNFuncionales = RNfuncional::orderBy('id', 'asc')->paginate();
        return view('RNFuncionales.listarRNFuncional',compact('RNFuncionales'), compact('project'));
    }

    public function destroy(Project $project, RNfuncional $RNFuncional){
        $RNFuncional->delete();
        return redirect()->route('listarRNF', compact('project'));
    }

    public function editRNF(Project $project, RNfuncional $RNFuncional){
        $RNFuncionales = RNfuncional::orderBy('id', 'asc')->paginate();
        return view('RNFuncionales.edit', compact('RNFuncional', 'project'), compact('RNFuncionales'));
    }

    public function updateRNF(Request $request,Project $project,RNfuncional $RNFuncional){
        $RNFuncional->update($request->all());
        return redirect()->route('listarRNF',compact('project'));
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaRNF = Rnfuncional::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('RNFuncionales.pdfRNF',compact('listaRNF'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaRNF.pdf'); 
    }
}
