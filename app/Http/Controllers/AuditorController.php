<?php

namespace Auditoria\Http\Controllers;

use Auditoria\Auditor;
use Auditoria\Http\Requests\CreateAuditorRequest;
use Illuminate\Http\Request;

class AuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditors = Auditor::all();
        return view('auditor.auditor')->with(['auditors' => $auditors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuditorRequest $request)
    {
        $auditor = new Auditor;
        $auditor->name = $request->get('name');
        $auditor->role = $request->get('role');
        $auditor->save();

        session()->flash('message', 'Auditor creado');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Auditoria\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function show(Auditor $auditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Auditoria\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditor $auditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Auditoria\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditor $auditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Auditoria\Auditor  $auditor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditor $auditor)
    {
        $auditor->delete();

        session()->flash('message', 'Auditor eliminado');
        return back();
    }
}
