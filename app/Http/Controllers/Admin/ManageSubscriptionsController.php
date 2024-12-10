<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ManageSubscriptionsController extends Controller
{
    public function index(){
        // Fetch all subscriptions from the database
        $orders = Order::all();

        // Pass the subscriptions to the view
        return view('admin.manage-subscriptions', compact('orders'));
    }
}
