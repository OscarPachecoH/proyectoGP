<?php

namespace App\Http\Controllers;
use App\Models\Caso;
use App\Models\Project;

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

    public function destroy(Caso $caso){
        $caso->delete();
        return redirect()->route('casos.listarCaso');
    }

    public function showCU(Project $project, Caso $caso){
        return view('casos.show', compact('caso', 'project'));
    }

    public function editCU(Project $project, Caso $caso){
        $casos = Caso::orderBy('id', 'asc')->paginate();
        return view('casos.edit', compact('caso', 'project'), compact('casos'));
    }

    public function updateCU(Request $request,Project $project,Caso $caso){
        $caso->update($request->all());
        return redirect()->route('listarCU',compact('project'));
    }
}
