<?php

namespace App\Http\Controllers;

use App\Models\tb_customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.index');
    }

    // Customer

    public function indexCustomer()
    {
        $data = tb_customer::get();
        // dd($data);
        return view('admin.customer.index', compact(['data']));
    }
    // End Customer
}
