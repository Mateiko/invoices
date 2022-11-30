<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceItemRequest;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
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
    public function store(InvoiceItemRequest $request)
    {
        $data = $request->validated();
        $data['total_price'] = $data['quantity'] * ($data['price']-($data['price'] * $data['discount']/100));
        InvoiceItem::create($data);

        return redirect()
            ->back()
            ->withSuccess("Item is added to Invoice!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceItem $item)
    {
        $totalPrice = $request['quantity'] * ($request['price']-($request['price'] * $request['discount']/100));
        $item->update([
            'quantity'=>$request->quantity,
            'unit_of_measure_id'=>$request->unit_of_measure_id,
            'title'=>$request->title,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'total_price'=>$totalPrice
            ]);

        return redirect()
            ->back()
            ->withSuccess("Item is edited!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InvoiceItem::findOrFail($id)->delete();

        return redirect()
            ->back();
    }
}
