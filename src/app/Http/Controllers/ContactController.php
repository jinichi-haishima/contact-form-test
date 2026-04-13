<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view ('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $full_tel = $contacts['tel1']. $contacts['tel2']. $contacts['tel3'];
        $category = Category::Find($request->category_id);

        return view ('confirm', compact('contacts', 'full_tel', 'category'));
    }

    public function store (Request $request)
    {

        $contact = new Contact;
        $contact->last_name = $request->last_name;
        $contact->first_name = $request->first_name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->tel = $request->tel;
        $contact->address = $request->address;
        $contact->building = $request->building;
        $contact->category_id = $request->category_id;
        $contact->detail = $request->detail;
        $contact->save();
        return view ('thanks');
    }

}

