<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OrdersController extends ApiController
{
    public function Buy(Request $request)
    {
        $order = new Orders;
        return $order->stores($request);
    }
    public function index()
    {
        $order = Orders::all();
        return $this->showAll($order);
    }
    public function changeStatus($id)
    {
        $order = Orders::find($id);
        $order->state = 1;
        $order->save();
    }
    public function showOrder($id)
    {
        $order = Orders::find($id);
        return $this->showAll($order->details);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Orders $orders)
    {
        //
    }
    public function edit(Orders $orders)
    {
        //
    }
    public function update(Request $request, Orders $orders)
    {
        //
    }
    public function destroy(Orders $orders)
    {
        //
    }
}