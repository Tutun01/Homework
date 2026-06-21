<?php

namespace App\Http\Controllers;

// require_once "Illuminate\Http\Request;"
use App\Http\Requests\SaveContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

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

    public function sendContact(SaveContactRequest $request )
    {
        $this->contactRepo->createNewContact($request);

        return redirect("/shop");
    }
}
