<?php

namespace App\Http\Controllers\Plan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanInjectionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('injections.plan');
    }

}
