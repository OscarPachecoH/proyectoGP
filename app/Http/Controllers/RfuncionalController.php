<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfuncional;
use App\Models\Project; 
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class RfuncionalController extends Controller
{
    public function addRF(Request $request, Project $project){

        $request -> validate([
            'claveRF' => 'required',
            'descRF' => 'required'
        ]);

        $RFuncional = new Rfuncional();

        $RFuncional -> clave = $request -> claveRF;
        $RFuncional -> descripcion = $request -> descRF;
        $RFuncional -> idProyecto= $request -> idProyecto;
        
        $RFuncional -> save();

        return redirect()->route('RFuncional',compact('project'));
    }

    public function plantillaRFuncionales(Project $project){
        return view('RFuncionales.RFuncionales', compact('project'));
    }

    public function listarRF(Project $project){
        $RFuncionales = Rfuncional::orderBy('id', 'asc')->paginate();
        return view('RFuncionales.listarRFuncional',compact('RFuncionales'), compact('project'));
    }

    public function destroy(Project $project, Rfuncional $RFuncional){
        $RFuncional->delete();
        return redirect()->route('listarRF', compact('project'));
    }

    public function editRF(Project $project, Rfuncional $RFuncional){
        $RFuncionales = Rfuncional::orderBy('id', 'asc')->paginate();
        return view('RFuncionales.edit', compact('RFuncional', 'project'), compact('RFuncionales'));
    }

    public function updateRF(Request $request,Project $project,Rfuncional $RFuncional){
        $RFuncional->update($request->all());
        return redirect()->route('listarRF',compact('project'));
    }

    public function generatepdf($project){
        $pro = Project::find($project);
        $listaRF = Rfuncional::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('RFuncionales.pdfRF',compact('listaRF'), compact('pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaRF.pdf'); 
    }
}
