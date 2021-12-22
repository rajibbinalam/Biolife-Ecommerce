<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\SocialLink;

class ContactSocialController extends Controller
{
    //

    public function conactCreate()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }

    public function addContact(Request $request)
    {
        $contacts = Contact::all();
        if ($contacts->count()<1) {
            Contact::insert([
                'address'=> $request->input('address'),
                'phone'=> $request->input('phone'),
                'email'=> $request->input('email'),
                'map_link'=> $request->input('map_link'),
                'store_open'=> $request->input('store_open'),
            ]);
            return back()->with('success','Contact Added Success!');
        }
        return back()->with('error','Your is Contact Added!');
        
    }


    public function contactEdit($id)
        {
            $edits = Contact::find($id)->first();
            return view('admin.contact-edit', compact('edits'));
        }

    public function contactUpdate(Request $request, $id){
        $contacts = Contact::find($id);

        $contacts->address = $request->input('address');
        $contacts->phone = $request->input('phone');
        $contacts->email = $request->input('email');
        $contacts->map_link = $request->input('map_link');
        $contacts->store_open = $request->input('store_open');

        $contacts->save();

        return redirect('/admin/contact')->with('success','Contact Added Success!');
        
    }

    public function contactDelete($id){
        $delete = Contact::find($id)->first();
        $delete->delete();
        return back()->with('success','Contact Details Deleted!');
    }



}
