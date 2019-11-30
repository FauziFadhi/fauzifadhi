<?php

namespace App\Http\Controllers;

use App\PeriodTransaction;
use App\Product;
use Illuminate\Http\Request;

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
        $request['input_date'] = date('Y-m-d');
        $transaction = PeriodTransaction::create($request->all());
        $product = Product::where('id', $transaction->product_id)->increment('stock', $transaction->qty);
        return redirect()->route('periods.show', $transaction->period->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PeriodTransaction  $periodTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodTransaction $periodTransaction)
    {
        //
    }

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
