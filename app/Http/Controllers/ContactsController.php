<?php

namespace App\Http\Controllers;


class ContactsController extends Controller
{
    public function contacts()
    {
        return view('pages.contacts',['contacts'=> \App\Contacts::all()]);
    }
}
