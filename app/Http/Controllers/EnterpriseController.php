<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Enterprise;
use Auditoria\Http\Requests\CreateEnterpriseRequest;
use Auditoria\Http\Requests\EditEnterpriseRequest;

class EnterpriseController extends Controller
{
    public function index() {
    	$enterprises = Enterprise::orderBy('nombre', 'asc')->paginate(10);

    	return view('enterprise/index')->with(['enterprises' =>  $enterprises]);
    }

    public function show(Enterprise $enterprise) {
        //$enterprise_ = Enterprise::find($enterprise->id);
        return view('enterprise/show')->with(['enterprise' => $enterprise]);
        //return dd($enterprise);
    }

    public function create() {
        $enterprise = new Enterprise;
        return view('enterprise/create')->with(['enterprise' => $enterprise]);
    }

    public function store(CreateEnterpriseRequest $request) {
        $enterprise = new Enterprise;
        $enterprise->nit = $request->get('nit');
        $enterprise->nombre = $request->get('nombre');
        $enterprise->direccion = $request->get('direccion');
        $enterprise->descripcion = $request->get('descripcion');
        $enterprise->user_id = auth()->user()->id;
        $enterprise->save();

        session()->flash('message', 'Empresa creada');

        return redirect()->route('entps_path');
    }

    public function edit(Enterprise $enterprise) {
        // Valida si el usuario tiene permiso para eliminar
        if ($enterprise->user_id != \Auth::user()->id) {
            session()->flash('message', 'No tiene autorizacion para editar esta empresa');
            return redirect()->route('entps_path');
        }

        return view('enterprise/edit')->with(['enterprise' => $enterprise]);
    }

    public function update(Enterprise $enterprise, EditEnterpriseRequest $request) {
        $enterprise->nit = $request->get('nit');
        $enterprise->nombre = $request->get('nombre');
        $enterprise->direccion = $request->get('direccion');
        $enterprise->descripcion = $request->get('descripcion');
        $enterprise->save();

        session()->flash('message', 'Empresa actualizada');

        return redirect()->route('entp_path', ['enterprise' => $enterprise->id]); 

        // Otra opcion
        /*$post->update(
            $request->only('nit', 'nombre', 'direccion', 'descripcion');
        );*/
    }

    public function delete(Enterprise $enterprise) {
        // Valida si el usuario tiene permiso para eliminar
        if ($enterprise->user_id != \Auth::user()->id) {
            session()->flash('message', 'No tiene autorizacion para eliminar esta empresa');
            return redirect()->route('entps_path');
        }

        $enterprise->delete();
        session()->flash('message', 'Empresa eliminada');
        return redirect()->route('entps_path');
    }

    public function find(Request $request) {
        $search = $request->get('search');
        $enterprises = Enterprise::where('nombre', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('enterprise/index')->with(['enterprises' => $enterprises]);
    }
}
