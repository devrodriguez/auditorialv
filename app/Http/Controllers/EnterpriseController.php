<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Enterprise;
use Auditoria\Http\Requests\CreateEnterpriseRequest;
use Auditoria\Http\Requests\EditEnterpriseRequest;

class EnterpriseController extends Controller
{
    public function index() {
    	$enterprises = Enterprise::orderBy('name', 'asc')->paginate(10);

    	return view('enterprise/index')->with(['enterprises' =>  $enterprises]);
    }

    public function show(Enterprise $enterprise) {
        return view('enterprise/show')->with(['enterprise' => $enterprise]);
    }

    public function create() {
        $enterprise = new Enterprise;
        return view('enterprise/create')->with(['enterprise' => $enterprise]);
    }

    public function store(CreateEnterpriseRequest $request) {
        $enterprise = new Enterprise;
        $enterprise->identification = $request->get('nit');
        $enterprise->name = $request->get('nombre');
        $enterprise->address = $request->get('direccion');        
        $enterprise->phone_number = $request->get('telefono');
        $enterprise->user_id = auth()->user()->id;
        
        $enterprise->save();

        session()->flash('message', 'Empresa creada');

        return redirect()->route('index_enterprise');
    }

    public function edit(Enterprise $enterprise) {
        // Valida si el usuario tiene permiso para eliminar
        if ($enterprise->user_id != \Auth::user()->id) {
            session()->flash('message', 'No tiene autorizacion para editar esta empresa');
            return redirect()->route('index_enterprise');
        }

        return view('enterprise/edit')->with(['enterprise' => $enterprise]);
    }

    public function update(Enterprise $enterprise, EditEnterpriseRequest $request) {
        $enterprise->identification = $request->get('nit');
        $enterprise->name = $request->get('nombre');
        $enterprise->address = $request->get('direccion');
        $enterprise->phone_number = $request->get('telefono');

        $enterprise->save();

        session()->flash('message', 'Empresa actualizada');

        return redirect()->route('show_enterprise', ['enterprise' => $enterprise->id]); 

        // Otra opcion
        /*$post->update(
            $request->only('nit', 'nombre', 'direccion', 'descripcion');
        );*/
    }

    public function delete(Enterprise $enterprise) {
        // Valida si el usuario tiene permiso para eliminar
        if ($enterprise->user_id != \Auth::user()->id) {
            session()->flash('message', 'No tiene autorizacion para eliminar esta empresa');
            return redirect()->route('index_enterprise');
        }

        $enterprise->delete();
        session()->flash('message', 'Empresa eliminada');
        return redirect()->route('index_enterprise');
    }

    public function find(Request $request) {
        $search = $request->get('search');
        $enterprises = Enterprise::where('name', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('enterprise/index')->with(['enterprises' => $enterprises]);
    }
}
