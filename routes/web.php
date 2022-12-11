<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ArtefactoController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ProcesoplantillaController;
use App\Http\Controllers\RfuncionalController;
use App\Http\Controllers\RNfuncionalController;
use App\Http\Controllers\CasoController;
use App\Models\Procesoplantilla;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('projects.projects');
    })->name('dashboard');

    Route::get('/projects', function () {
        return view('projects.projects  ');
    })->name('projects');

    Route::get('/actores', function(){
        return view('actores.actores');
    })->name('actores');
});

Route::controller(ActorController::class)->group(function(){
    Route::post('/actores/{project}','addAct')                          -> name('addAct');
    Route::get('projects/{project}/actores/{actor}', 'show')            -> name('actores.show');
    Route::get('projects/{project}/actores/{actor}/edit', 'edit')       -> name('actores.edit');
    Route::put('projects/{project}/actores/{actor}', 'update')          -> name('actores.update');
    Route::delete('actores/{actor}', 'destroy')                         -> name('actores.destroy');
    Route::get('project/{project}/actor/{actor}/pdf','generatepdf')     -> name('actores.pdf');
});

Route::controller(ProyectoController::class)->group(function(){
    Route::get('projects/{project}/actores', 'plantillaActor') -> name('actor');
    Route::get('projects/{project}/actoreslista', 'listarAct') -> name('listarAct');
    Route::post('/projects','addPro')                          -> name('addPro');
    Route::get('projects/lista','listarPro')                   -> name('listarPro');
    Route::get('projects/{project}', 'show')                   -> name('projects.show');
    Route::get('projects/{project}/edit', 'edit')              -> name('projects.edit');
    Route::put('projects/{project}', 'update')                 -> name('projects.update');
    Route::delete('projects/{project}', 'destroy')             -> name('projects.destroy');
});

Route::controller(ArtefactoController::class)->group(function(){
    Route::post('/artefactos/{project}','addArt')                               -> name('addArt');
    Route::get('projects/{project}/artefactos', 'plantillaArtefacto')           -> name('artefacto');
    Route::get('projects/{project}/artefactoslista', 'listarArt')               -> name('listarArt');
    Route::get('project/{project}/artefactos/{artefacto}', 'showArt')           -> name('showArt');
    Route::get('projects/{project}/artefactos/{artefacto}/edit', 'editArt')     -> name('editArt');
    Route::put('projects/{project}/artefactos/{artefacto}', 'updateArt')        -> name('updateArt');
    Route::delete('artefactos/{artefacto}', 'destroyArt')                       -> name('destroyArt');
    Route::get('project/{project}/pdfArtefactos','generatepdf')                 -> name('pdfListArt');
});

Route::controller(PlantillaController::class)->group(function(){
    Route::get('/project/{project}/artefactos/{artefacto}/plantilla', 'plantilla')  -> name('addPlantilla');
    Route::post('/project/{project}/artefactos/{artefacto}/agregar', 'addAtributo') -> name('agregarAtributo');
    Route::get('project/{project}/artefacto/{artefacto}/pdf','generatepdf')         -> name('pdfArt');
});

Route::controller(RfuncionalController::class)->group(function(){
    Route::post('/RFuncionales/{project}','addRF')                              -> name('addRF');
    Route::get('projects/{project}/RFuncionales', 'plantillaRFuncionales')      -> name('RFuncional');
    Route::get('projects/{project}/RFuncionaleslista', 'listarRF')              -> name('listarRF');
    Route::delete('RFuncionales/{RFuncional}', 'destroy')                       -> name('RFuncionales.destroy');
    Route::get('project/{project}/pdfRFuncionales','generatepdf')               -> name('pdfRF');
});

Route::controller(RNfuncionalController::class)->group(function(){
    Route::post('/RNFuncionales/{project}','addRNF')                         -> name('addRNF');
    Route::get('projects/{project}/RNFuncionales', 'plantillaRNFuncionales') -> name('RNFuncional');
    Route::get('projects/{project}/RNFuncionaleslista', 'listarRNF')         -> name('listarRNF');
    Route::delete('RNFuncionales/{RNFuncional}', 'destroy')                  -> name('RNFuncionales.destroy');
    Route::get('project/{project}/pdfRNFuncionales','generatepdf')           -> name('pdfRNF');
});

Route::controller(ProcesoController::class)->group(function(){
    Route::post('/procesos/{project}','addProc')                            -> name('addProc');
    Route::get('projects/{project}/procesos', 'plantillaProceso')           -> name('proceso');
    Route::get('projects/{project}/procesoslista', 'listarProc')            -> name('listarProc');
    Route::get('project/{project}/procesos/{proceso}', 'showProc')          -> name('showProc');
    Route::get('projects/{project}/procesos/{proceso}/edit', 'editProc')    -> name('editProc');
    Route::put('projects/{project}/procesos/{proceso}', 'updateProc')       -> name('updateProc');
    Route::delete('procesos/{proceso}', 'destroyProc')                      -> name('destroyProc');
    Route::get('project/{project}/pdfProcesos','generatepdf')               -> name('pdfListProc');
});

Route::controller(ProcesoplantillaController::class)->group(function(){
    Route::get('/project/{project}/procesos/{proceso}/plantillaProc', 'plantillaProc')  -> name('addPlantillaProc');
    Route::post('/project/{project}/procesos/{proceso}/agregarProc', 'addAtributoProc') -> name('agregarAtributoProc');
    Route::get('project/{project}/proceso/{proceso}/pdf','generatepdf')                 -> name('pdfProc');
});


Route::controller(CasoController::class)->group(function(){
    Route::post('/cosos/{project}','addCU')                         -> name('addCU');
    Route::get('projects/{project}/casos', 'plantillaCasos')        -> name('caso');
    Route::get('projects/{project}/casoslista', 'listarCU')         -> name('listarCU');
    Route::delete('casos/{caso}', 'destroy')                        -> name('casos.destroy');
    Route::get('project/{project}/cosos/{caso}', 'showCU')          -> name('showCU');
    Route::get('projects/{project}/casos/{caso}/edit', 'editCU')    -> name('editCU');
    Route::put('projects/{project}/casos/{caso}', 'updateCU')       -> name('updateCU');
    Route::get('project/{project}/pdfCasos','generatepdf')          -> name('pdfCU');
});