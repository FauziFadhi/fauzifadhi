<?php

namespace App\Http\Controllers;

use App\PeriodTransaction;
use App\Product;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodTransactionController extends Controller
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
        DB::beginTransaction();
        $request->validate([
            'qty' => 'required',
            'total_cost' => 'required'
        ]);
        $request['input_date'] = date('Y-m-d');

        $exists = PeriodTransaction::where('period_id', $request->period_id)->whereHas('product', function ($q) use ($request) {
            return $q->where('name', 'Ayam');
        })->first();
        $transaction = PeriodTransaction::create($request->all());
        $product = Product::where('id', $transaction->product_id)->first();
        if ($exists && $product->name === 'Ayam') return redirect()->back()->withErrors(['message' => 'Tidak bisa tambah ayam untuk periode ini']);


        $product->increment('stock', $transaction->qty);

        if ($product->name === 'Ayam') {

            if ($transaction->qty % 5000 != 0)
                return redirect()->back()->withErrors(['message' => 'Ayam harus kelipatan 5000']);
            for ($i = 1; $i <= $product->stock / 5000; $i++) {
                for ($j = 1; $j <= 36; $j++) {
                    if ($j == 1) {
                        Schedule::create([
                            "period_id" => $transaction->period->id,
                            'cage_no' => $i,
                            'age' => $j,
                            'chicken_qty' => 5000,
                            'action_date' => Carbon::now()->addDays($j)
                        ]);
                        continue;
                    }

                    Schedule::create([
                        "period_id" => $transaction->period->id,
                        'cage_no' => $i,
                        'age' => $j,
                        'action_date' => Carbon::now()->addDays($j)
                    ]);
                }
            }
        }
        DB::commit();
        return redirect()->route('periods.show', $transaction->period->id);
        DB::rollback();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PeriodTransaction  $periodTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodTransaction $periodTransaction)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PeriodTransaction  $periodTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodTransaction $periodTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PeriodTransaction  $periodTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriodTransaction $periodTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PeriodTransaction  $periodTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodTransaction $periodTransaction)
    {
        //
    }
}
