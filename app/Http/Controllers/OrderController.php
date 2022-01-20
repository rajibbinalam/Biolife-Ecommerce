<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function allOrder(){
        $pageTitle = "All Orders";
        $orders = Orders::orderBy('id','DESC')->get();
        return view('admin.orders.all_order',compact('pageTitle','orders'));
    }

    public function activeOrder(Request $request,$id){
        $status = Orders::find($id);
        $status->status=$request->status;
        $status->save();
        return back()->with('success','Order Updated');
    }

    public function viewOrder($id){
        $view = Orders::find($id);
        $pageTitle = "View Order Details";
        return view('admin.orders.order_details',compact('pageTitle','view'));
    }

    public function viewOrderInvoice($id){
        $invoice = Orders::find($id);
        $pageTitle = "Order Invoice";
        return view('admin.orders.invoice',compact('pageTitle','invoice'));
    }
    public function pendingOrder(){
        $pageTitle = "Pending Orders";
        $orders = Orders::where('status',0)->get();
        return view('admin.orders.pending_order',compact('pageTitle','orders'));

    }
    public function processingOrder(){
        $pageTitle = "Processing Orders";
        $orders = Orders::where('status',1)->get();
        return view('admin.orders.processing_order',compact('pageTitle','orders'));

    }
    public function completeOrder(){
        $pageTitle = "Complete Orders";
        $orders = Orders::where('status',2)->get();
        return view('admin.orders.complete_order',compact('pageTitle','orders'));

    }
    public function declinedOrder(){
        $pageTitle = "Complete Orders";
        $orders = Orders::where('status',3)->get();
        return view('admin.orders.declined_order',compact('pageTitle','orders'));

    }







}
