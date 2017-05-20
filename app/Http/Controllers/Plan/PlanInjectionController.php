<?php

namespace App\Http\Controllers\Plan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanInjectionController extends Controller {

    public function create() {
        return view('injections.plan');
    }

}
