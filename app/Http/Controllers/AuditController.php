<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Enterprise;
use Auditoria\ItemAudit;

class AuditController extends Controller
{
    public function index(Enterprise $enterprise) {
    	$items = ItemAudit::all();
    	return view('audit/audit', ['enterprise' => $enterprise, 'items' => $items]);
    }
}
