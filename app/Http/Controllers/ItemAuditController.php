<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\ItemAudit;
use Auditoria\Http\Requests\CreateItemAuditRequest;

class ItemAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemAudits = ItemAudit::all();
        return view('itemAudit/index', ['itemAudits' => $itemAudits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemAuditRequest $request)
    {
        $itemAudit = new ItemAudit;

        $itemAudit->name = $request->get('name');
        $itemAudit->description = $request->get('description');
        $itemAudit->save();

        session()->flash('message', 'Item creado');
        return redirect()->route('item_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Auditoria\ItemAudit  $itemAudit
     * @return \Illuminate\Http\Response
     */
    public function show(ItemAudit $itemAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Auditoria\ItemAudit  $itemAudit
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemAudit $itemAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Auditoria\ItemAudit  $itemAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemAudit $itemAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Auditoria\ItemAudit  $itemAudit
     * @return \Illuminate\Http\Response
     */
    public function delete(ItemAudit $itemAudit)
    {
        $itemAudit->delete();

        session()->flash('message', 'Item eliminado');
        return back();
    }
}
