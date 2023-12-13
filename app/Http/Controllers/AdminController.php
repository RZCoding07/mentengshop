<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
    }

    public function index()
    {
        $notif = Order::with('product')
                   ->where('status', 0)
                   ->get();

        $waiting = count(Order::with('product')
        ->where('status', 0)
        ->get());

        $confirmed = count(Order::with('product')
        ->where('status', 1)
        ->get());

        $canceled = count(Order::with('product')
        ->where('status', 2)
        ->get());

        return view('admin.dashboard', ['notif' => $notif, 'waiting' => $waiting, 'confirmed' => $confirmed, 'canceled' => $canceled]);
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', [ 'users' => $users ]);
    }

}
