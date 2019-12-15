<?php

namespace App\Http\Controllers;

use App\PeriodRule;
use App\Schedule;
use App\Product;
use App\ScheduleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->age_start >= 36 || $request->age_start >= 36)
            return redirect()->back()->withErrors(['rule' => 'maksimal 36 hari']);

        if ($request->age_start >= $request->age_end)
            return redirect()->back()->withErrors(['rule' => 'Tanggal Akhir harus lebih besar dari tanggal awal']);

        $exists = PeriodRule::where('period_id', $request->period_id)->where('age_end', '>=', $request->age_start)->where('type', $request->type)->first();
        if ($exists)
            return redirect()->back()->withErrors(['rule' => 'Input Tanggal tidak bisa diterima']);
        DB::beginTransaction();
        $rule = PeriodRule::create($request->all());
        $schedules = Schedule::where('period_id', $request->period_id)->where('age', '>=', $request->age_start)->where('age', '<=', $request->age_end)->get();
        $schedules->map(function ($schedule) use ($rule) {
            ScheduleDetail::create([
                'schedule_id' => $schedule->id,
                'period_rule_id' => $rule->id
            ]);
        });
        DB::commit();
        return redirect()->route('periods.show', $rule->period->id);
        DB::rollback();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
