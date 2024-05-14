<?php

namespace App\Http\Controllers;

// require_once "Illuminate\Http\Request;"
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all(); // SELECT * FROM contacts
        return view("allContacts", compact('allContacts'));
    }

    public function delete($contact)
    {
        $singleContact = ContactModel::where(['id' => $contact]) ->first();

        if ($singleContact == null)
        {
            die("Contact don't exist");
        }
        $singleContact->delete();

        return redirect()->back();
    }

    public function sendContact(Request $request )
    {
        $request->validate([
            "email" => "required|string", // if (isset($_POST['email'])) && is_string($_POST['email'])
            "subject" => "required|string",
            "description" => "required|string|min:5"
         ]);


        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")
         ]);

        return redirect("/shop");

    }
}
