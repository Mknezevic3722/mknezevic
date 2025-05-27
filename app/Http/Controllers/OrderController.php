<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests;
    public function store(Request $request)
    {
        if (auth()->user()->role === 'admin') {
        abort(403, 'Admin nema pristup narudžbinama.');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('orders.index')->with('success', 'Uspešno ste naručili proizvod.');
    }

    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function update(Request $request, Order $order)
        {
            $this->authorize('update', $order); // koristi policy

            $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);

            $order->update([
                'quantity' => $request->quantity
            ]);

            return redirect()->route('orders.index')->with('success', 'Količina izmenjena.');
        }

        public function destroy(Order $order)
        {
            $this->authorize('delete', $order); // koristi policy

            $order->delete();

            return redirect()->route('orders.index')->with('success', 'Narudžbina obrisana.');
        }

}
