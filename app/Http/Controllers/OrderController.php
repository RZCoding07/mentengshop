<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {

    }

    public function index()
    {
        $orders_menunggu = Order::with('product')->where('status', '0')->get();
        $orders = Order::with('product')->where('status', '1')->get();
        $orders_canceled = Order::with('product')->where('status', '2')->get();

        return view('admin.orders', [ 'orders' => $orders, 'menunggu' => $orders_menunggu, 'order_canceled' => $orders_canceled]);
    }

    public function add_orders()
    {
        $product = Product::all();
        return view('admin.add_orders', [ 'product' => $product ]);
    }

    // public function detail_products($id)
    // {
    //     $product = Product::with('images')->findOrFail($id);

    //     return view('admin.detail_products', [ 'product' => $product ]);
    // }   

    public function confirmOrder($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->status = 1;
        $order->save();

        return response()->json(['message' => 'Order confirmed successfully']);
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->status = 2;
        $order->save();

        return response()->json(['message' => 'Order canceled successfully']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'model_payet' => 'required|integer',
            'warna' => 'required|string',
            'banyak_payet' => 'required',
            'tanggal_pengambilan' => 'required|date',
        ]);

        Order::create($validatedData);

        if(Auth::user() && Auth::user()->role == 1) {
            return redirect()->route('dashboard-orders')->with('success', 'Order created successfully');
        }
        else{
            return redirect()->route('home')->with('success', 'Order created successfully');
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);

            $order->delete();

            return response()->json(['message' => 'order deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete the order'], 500);
        }
    }

}
