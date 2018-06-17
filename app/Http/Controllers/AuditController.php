<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;
use Auditoria\Enterprise;
use Auditoria\ItemAudit;
use Storage;

class AuditController extends Controller
{
    public function index(Enterprise $enterprise) {
        $items = ItemAudit::all();

        return view('audit/audit', compact('enterprise', 'items'));
    }

    public function valid(Request $request, Enterprise $enterprise) {
        $items = ItemAudit::all();
        $comment = $request->comment;

        if(!empty($request->comment) && $request->hasFile('archivo')){
            // Save file
            $path = Storage::putfile('public/contact', $request->file('archivo'));
            
            /*
            Mail::raw('Message', compact('correo', 'path'), function($message) use ($correo, $path) {
                $message->from('john.rodriguez.25@hotmail.com', 'John');
                $message->to($correo);
                $message->attach($path);
            });
            */
        }

        return view('audit/audit', compact('enterprise', 'items'));
    }
}
