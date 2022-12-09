<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class ActorController extends Controller
{
    public function addAct(Request $request, Project $project){

        $request -> validate([
            'claveAct' => 'required',
            'nomAct' => 'required|min:4',
            'descAct' => 'required',
            'caractAct' => 'required',
            'resAct' => 'required'
        ]);
        $actor = new Actor();

        $actor -> clave = $request -> claveAct;
        $actor -> nombre = $request -> nomAct;
        $actor -> descripcion = $request -> descAct;
        $actor -> caracteristicas = $request -> caractAct;
        $actor -> responsabilidad = $request -> resAct;
        $actor -> referencias = $request -> refAct;
        $actor -> idProyecto= $request -> idProyecto;
        $actor -> save();

        return redirect()->route('actor', compact('project'));
    }

    public function plantillaActor(Project $project){
        return view('actores.actores', compact('project'));
    }

    public function show(Project $project, Actor $actor){
        return view('actores.show', compact('actor', 'project'));
    }

    public function edit(Project $project, Actor $actor){
        $actores = Actor::orderBy('id', 'asc')->paginate();
        return view('actores.edit', compact('actor', 'project'), compact('actores'));
    }

    public function update(Request $request,Project $project,Actor $actor){
        $actor->update($request->all());
        return view('actores.show', compact('actor', 'project'));
    }

    public function destroy(Actor $actor){
        $actor->delete();
        return redirect()->route('listarAct');
    }

    public function generatepdf($project, Actor $actor){
        $pro = Project::find($project);
        $pdf = App::make('dompdf.wrapper');
        $pdf=PDF::loadView('actores.pdfAct',compact('actor','pro'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->stream('PlantillaActor-'.$actor->clave.'.pdf'); 
    }
}
