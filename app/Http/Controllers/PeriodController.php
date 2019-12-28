<?php

namespace App\Http\Controllers;

use App\Events\ScheduleReminder;
use App\Notifications\ScheduleNotification;
use App\Period;
use App\PeriodRule;
use App\Product;
use App\PeriodTransaction;
use App\User;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        $user = User::find(1)->notify(new ScheduleNotification);
        event(new ScheduleReminder("test coyy"));
        return view('period.index', compact('periods'));
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
    public function store(Request $request)
    {
        $lastPeriod = Period::where('end_date', null)->count();
        $product = Product::count();
        if ($product === 0)
            return response()->json('please add product first', 400);
        if ($lastPeriod > 0)
            return response()->json('last period not harvest yet, cant create new period', 400);
        $period = Period::create($request->all());

        return route('periods.show', $period->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $transactions = PeriodTransaction::where('period_id', $id)->get();
        $rules = PeriodRule::where('period_id', $id)->get();
        $products = Product::all();
        return view('period.detail', compact('transactions', 'products', 'rules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
    }
}
