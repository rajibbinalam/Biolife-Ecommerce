<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Subscriber;

class SubandMessageController extends Controller
{
    //


    public function messageCreate(){
        // it's from From Web Page
    }

    public function showmessages(){
        $pageTitle = "All Messages";
        $messages = Message::all();
        return view('admin.message', compact('messages','pageTitle'));
    }



    public function subscriberCreate(){
        // it's from From Web Page
    }


    public function showsubscribers(){
        $pageTitle = "All Subscribers";
        $subscribers = Subscriber::all();
        return view('admin.subscriber', compact('subscribers','pageTitle'));
    }











}
