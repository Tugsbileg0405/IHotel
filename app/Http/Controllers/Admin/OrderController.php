<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \App\Order::orderBy('created_at', 'desc')
            ->paginate(30);

        return view('admin.order.table', [
            'orders' => $orders,
        ]);
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
        //
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
        $order = \App\Order::findOrFail($id);

        return view('admin.order.update', [
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = \App\Order::findOrFail($id);
        
        if ($order->status == 3) {
            $status = 'Цуцлагдсан';
        } 
        else {
            if ($request->get('active') == 'on')
            {
                $order->status = 2;
                $status = 'Баталгаажсан';
            }
            else
            {
                $order->status = 1;
                $status = 'Баталгаажаагүй';
            }
            $order->save();
        }

        return response()->json([
            'success' => true,
            'status' => $status,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = \App\Order::findOrFail($id);
        if ($order->status == 1) {
            $order->status = 3;
            $order->save();

            $order->closes()->delete();
        }

        return back();
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $orders = \App\Order::where('number', 'LIKE', '%' . $search . '%')
            ->orwherehas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orwherehas('user', function ($query) use ($search) {
                $query->where('email', 'LIKE', '%' . $search . '%');
            })
            ->orwherehas('hotel', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.order.search', [
            'orders' => $orders,
        ], 200);
    }
}
