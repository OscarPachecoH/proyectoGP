<?php

namespace App\Http\Controllers;

use App\Models\Artefacto;
use App\Models\Plantilla;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;


class PlantillaController extends Controller
{
    public function plantilla(Project $project, Artefacto $artefacto){
        $listaPlantilla = Plantilla::orderBy('id', 'asc')->paginate();
        return view('artefactos.plantilla', compact('listaPlantilla'),compact('artefacto', 'project'));
    }

    public function addAtributo(Request $request, Project $project, Artefacto $artefacto){

        $request -> validate([
            'atributo' => 'required|min:3',
            'descripcion' => 'required',
            'tipo' => 'required',
            'rango' => 'required',
        ]);

        $excepciones = "";

        $excepciones .= $request -> exec1 .
                        $request -> exec2 . 
                        $request -> exec3;

        $plantilla = new Plantilla();

        $plantilla -> atributos = $request -> atributo;
        $plantilla -> descripcion = $request -> descripcion;
        $plantilla -> tipo = $request -> tipo;
        $plantilla -> rango = $request -> rango;
        $plantilla -> excepciones = $excepciones;
        $plantilla -> idArtefacto = $request -> idArtefacto;
        $plantilla -> idProyecto = $request -> idProyecto;
        
        $plantilla -> save();

        return redirect()->route('addPlantilla', compact('project', 'artefacto'));
    }

    public function destroy(Project $project, Artefacto $artefacto, Plantilla $plantilla){
        $plantilla->delete();
        return redirect()->route('addPlantilla',compact('project','artefacto'));
    }

    public function generatepdf($project,$artefacto){
        $pro = Project::find($project);
        $art = Artefacto::find($artefacto);
        $listaPlantilla = Plantilla::orderBy('id', 'asc')->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('artefactos.pdfArt',compact('listaPlantilla'),compact('art','pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaArtefacto-'.$art->clave.'.pdf'); 
    }
}
