<?php

namespace App\Repositories;

use App\Models\ContactModel;
use App\Models\ProductsModel;

class ContactRepository
  {
      private $ContactModel;

    public function __construct()
    {
        $this->ContactModel = new ContactModel();
    }

    public function createNewContact($request)
    {
        $this->ContactModel->create([
        "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "description" => $request->get("description")
        ]);
    }


  }
