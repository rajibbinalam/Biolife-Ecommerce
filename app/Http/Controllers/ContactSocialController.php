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
            $edits = Contact::find($id);
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
        $delete = Contact::find($id);
        $delete->delete();
        return back()->with('success','Contact Details Deleted!');
    }

//=============Social Link

public function socialCreate()
    {
        $socials = SocialLink::all();
        return view('admin.social-links', compact('socials'));
    }

    public function addSocial(Request $request)
    {
        $contacts = SocialLink::all();
        if ($contacts->count()<5) {
            SocialLink::insert([
                'name'=> $request->input('name'),
                'link'=> $request->input('link'),
                'icon_class'=> $request->input('icon_class'),
            ]);
            return back()->with('success','Link Added Success!');
        }
        return back()->with('error','Your Links full!');
        
    }


    public function SocialEdit($id)
        {
            $edits = SocialLink::find($id);
            return view('admin.social-link-edit', compact('edits'));
        }

    public function socialUpdate(Request $request, $id){
        $social = SocialLink::find($id);

        $social->name = $request->input('name');
        $social->link = $request->input('link');
        $social->icon_class = $request->input('icon_class');

        $social->save();

        return redirect('/admin/social')->with('success','Link Update Success!');
        
    }

    public function socialDelete($id){
        $delete = SocialLink::find($id);
        $delete->delete();
        return back()->with('success','Link Deleted!');
    }


















}
