<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ScheduleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = ScheduleDetail::whereHas('schedule', function ($q) {
            $q->whereHas('period', function ($j) {
                $j->where('end_date', null);
            });
        })->get();

        $feeds = $details->filter(function ($value, $key) {
            return $value->rule->type === 'pakan';
        });
        $drugs = $details->filter(function ($value, $key) {
            return $value->rule->type === 'obat';
        });;
        return view('schedule.index', compact(['feeds', 'drugs']));
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
    { }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDetail)
    {
        DB::beginTransaction();
        if ($request->type === 'checked') {

            $scheduleDetail = ScheduleDetail::find($idDetail);
            $scheduleDetail->update([
                "status" => '1'
            ]);
            // return response()->json([
            //     'test' => $scheduleDetail
            // ]);
            $periodRule = $scheduleDetail->rule;
            $periodRule->product()->decrement('stock', $periodRule->qty);
        }
        if ($request->type === 'unchecked') {

            $scheduleDetail = ScheduleDetail::find($idDetail);
            $scheduleDetail->update([
                "status" => '0'
            ]);
            $periodRule = $scheduleDetail->rule;
            $periodRule->product()->increment('stock', $periodRule->qty);
        }
        DB::commit();

        DB::rollback();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
