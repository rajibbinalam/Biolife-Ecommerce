<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\PrivacyAndPolicy;
use App\Models\SocialLink;
use App\Models\TermsAndCondition;

class ContactSocialController extends Controller
{
    //

    public function conactCreate()
    {
        $pageTitle = "Contact";
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('admin.contact', compact('contacts','pageTitle'));
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
                'add_by'=> $request->input('add_by'),
            ]);
            return back()->with('success','Contact Added Success!');
        }
        return back()->with('error','Your is Contact Added!');
        
    }


    public function contactEdit($id)
        {
            $pageTitle = "Edit Contact";
            $edits = Contact::find($id);
            return view('admin.contact-edit', compact('edits','pageTitle'));
        }

    public function contactUpdate(Request $request, $id){
        $contacts = Contact::find($id);

        $contacts->address = $request->input('address');
        $contacts->phone = $request->input('phone');
        $contacts->email = $request->input('email');
        $contacts->map_link = $request->input('map_link');
        $contacts->store_open = $request->input('store_open');
        $contacts->add_by = $request->input('add_by');

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
        $pageTitle = "Social Links";
        $socials = SocialLink::orderBy('id','DESC')->get();
        return view('admin.social-links', compact('socials','pageTitle'));
    }

    public function addSocial(Request $request)
    {
        $contacts = SocialLink::all();
        if ($contacts->count()<5) {
            SocialLink::insert([
                'name'=> $request->input('name'),
                'link'=> $request->input('link'),
                'icon_class'=> $request->input('icon_class'),
                'add_by'=> $request->input('add_by'),
            ]);
            return back()->with('success','Link Added Success!');
        }
        return back()->with('error','Your Links full!');
        
    }


    public function SocialEdit($id)
        {
            $edits = SocialLink::find($id);
            $pageTitle = "Edit Social Links > ".$edits->name;
            return view('admin.social-link-edit', compact('edits','pageTitle'));
        }

    public function socialUpdate(Request $request, $id){
        $social = SocialLink::find($id);

        $social->name = $request->input('name');
        $social->link = $request->input('link');
        $social->icon_class = $request->input('icon_class');
        $social->add_by = $request->input('add_by');

        $social->save();

        return redirect('/admin/social')->with('success','Link Update Success!');
        
    }

    public function socialDelete($id){
        $delete = SocialLink::find($id);
        $delete->delete();
        return back()->with('success','Link Deleted!');
    }



    // ============== FAQ Page
    
    public function fqa(){
        $pageTitle = "Frequently Asked Question";
        $questions = FAQ::all();
        return view('admin.manu_page_settings.FAQ_page',compact('pageTitle','questions'));
    }
    public function fqaInsert(Request $request){
        $fqa = new FAQ();
        $fqa->title = $request->title;
        $fqa->answer = $request->answer;
        $fqa->add_by = $request->add_by;
        $fqa->save();
        return back()->with('success','FAQ Added Success');
    }

    public function fqaDelete($id){
        $delete = FAQ::find($id);
        $delete->delete();
        return back()->with('success','FAQ Deleted Success');
    }

    //============== Terms And Conditions
    public function termsAndConditions(){
        $pageTitle = "Terms And Conditions";
        $terms = TermsAndCondition::first();
        return view('admin.manu_page_settings.terms_and_conditions',compact('pageTitle','terms'));
    }

    public function termsAndConditionsUpdate(Request $request,$id){
        $termsCondition = TermsAndCondition::find($id);
        $termsCondition->title = $request->title;
        $termsCondition->slug = $request->slug;
        $termsCondition->descripton = $request->descripton;
        $termsCondition->add_by = $request->add_by;
        $termsCondition->position = $request->position;
        $termsCondition->save();
        return back()->with('success','Terms And Conditions Updated');
    }


    // ==================== Privacy And Policy
    public function PrivacyAndPolicy(){
        $pageTitle = "Privacy And policy";
        $privacy = PrivacyAndPolicy::first();
        return view('admin.manu_page_settings.privacy_and_policy',compact('pageTitle','privacy'));
    }
    public function PrivacyAndPolicyUpdate(Request $request,$id){
        $privacy_and_policy = PrivacyAndPolicy::find($id);
        $privacy_and_policy->title = $request->title;
        $privacy_and_policy->slug = $request->slug;
        $privacy_and_policy->descripton = $request->descripton;
        $privacy_and_policy->add_by = $request->add_by;
        $privacy_and_policy->position = $request->position;
        $privacy_and_policy->save();
        return back()->with('success','Privacy And Policy Updated');
    }

















}
