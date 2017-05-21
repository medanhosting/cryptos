<?php

namespace App\Http\Controllers\Plan;

use App\Http\Requests\StorePlanRequest;
use App\Models\Difficulty;
use App\Models\HashRate;
use App\Models\Plan;
use App\Models\Reinvest;
use App\Models\ReinvestPeriod;
use App\Models\Row;
use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanInjectionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('injections.plan');
    }

    public function store(StorePlanRequest $request) {

        $term_input = $request->term;
        $stop_term_input = $request->stop_term;
        $starting_quantity = $request->starting_quantity;
        $starting_hashrate = $request->starting_hashrate;
        $reinvest = $request->reinvest;
        $reinvest_period_input = $request->reinvest_period;
        $reinvestments = $request->reinvestments;

        $difficulty = Difficulty::where('is_current_difficulty', 1)->first();
        $hashrates = HashRate::get()->keyBy('name');
        $reinvest_period = ReinvestPeriod::where('name', $reinvest_period_input)->first();
        $term = Term::where('name', $term_input)->first();
        $stop_term = Term::where('name', $stop_term_input)->first();

        // plan
        $plan = new Plan;
        $plan->user_id = $request->user()->id;
        $plan->currency_id = 1; // 1 = btc
        $plan->plan_date = time();
        $plan->reinvest  = $reinvest;
        $plan->reinvest_period_id  = $reinvest_period->id;
        $plan->term_id  = $term->id;
        $plan->stop_reinvesting_term_id  = $stop_term->id;

        $plan->save();

        // starting row
        $starting_row = new Row;
        $starting_row->plan_id = $plan->id;
        $starting_row->hashrate_id = $hashrates[$starting_hashrate]->id;
        $starting_row->quantity = $starting_quantity;
        $starting_row->date_invested = $plan->plan_date;
        $starting_row->month_invested = date('m', $plan->plan_date);
        $starting_row->year_invested = date('Y', $plan->plan_date);
//        $starting_row->reinvest_id = ;
        $starting_row->expected_difficulty_id = $difficulty->id;
//        $starting_row->actual_difficulty_id = ;

        $starting_row->save();

        $plan->starting_row_id = $starting_row->id;
        $plan->save();

        foreach($reinvestments as $index => $reinvestment) {

            // create new row
            $row = new Row;
            $row->plan_id = $plan->id;
            $row->quantity = $reinvestment['quantity'];
            $row->date_invested = $reinvestment['date_selected'];
            $row->month_invested = $reinvestment['month'];
            $row->year_invested = $reinvestment['year'];
            $row->hashrate_id = $hashrates[$reinvestment['hashrate']]->id;
            $row->expected_difficulty_id = $difficulty->id;

            $row->save();

        }

        return response(null, 200);

    }

}
