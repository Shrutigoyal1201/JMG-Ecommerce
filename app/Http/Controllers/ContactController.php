<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function display()
    {
        $con=Contact::all();

        return view('admin.contact.display',compact('con'));
    }

    public function delete($id)
    {
        $con=Contact::find($id);

        $con->delete();

        if($con)
        {
            return redirect('contact/display')->with('message','Contact Deleted');
        }
    }
}
