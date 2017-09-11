<?php

namespace Auditoria\Http\Controllers;

use Illuminate\Http\Request;

use Auditoria\Enterprise;

class EnterpriseApiController extends Controller
{
    public function index() {
    	$enterprise = Enterprise::All();

    	return json_decode($enterprise);
    }
}
