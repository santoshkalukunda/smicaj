<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::latest()->get();
        return view('backend.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Stock $stock)
    {
        if (!$stock) {
            $stock = new Stock();
        }
        return view('backend.stock.create',compact('stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->stock()->create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'stock created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('backend.stock.create',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->validated());
        return redirect()
            ->back()
            ->with('success', 'stock updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->back()->with('success','Stock Setting Deleted');
    }

    public function search(Request $request)
    {
       $stock = Stock::findOrFail($request->stock_id);
       $symbol= $request->symbol;
       $interval= $request->interval;
       return view('backend.stock.search',compact('stock','symbol','interval'));

    }

    public function chart()
    {
        $stocks = Stock::get();
       return view('backend.stock.chart',compact('stocks'));

    }

    

}
