<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $all_product = Product::all();
        $pageTitle = "Dashboard";
        return view('admin.index', compact('all_product','pageTitle'));
    }






}
