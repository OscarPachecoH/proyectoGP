<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rnfuncional;
use App\Models\Project;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class RNfuncionalController extends Controller
{
    public function addRNF(Request $request, Project $project){

        $request -> validate([
            'claveRF' => 'required',
            'descRF' => 'required'
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

    public function destroy(RNfuncional $RNfuncional){
        $RNfuncional->delete();
        return redirect()->route('listarRNF');
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaRNF = RNfuncional::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('RNFuncionales.pdfRNF',compact('listaRNF'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaRNF.pdf'); 
    }
}
