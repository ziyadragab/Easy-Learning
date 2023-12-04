<?php

namespace App\Http\Repositories\EndUser;

use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Interfaces\EndUser\ContactInterface;

class ContactRepository implements ContactInterface
{

    public function index($dataTable)
    {
        Contact::where('is_read', false)->update(['is_read' => true]);
        return  $dataTable->render('admin.pages.contact.index');
    }
    public function create()
    {
        return view('user.pages.contact.create');
    }
    public function store($request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'budget' => $request->budget,
            'message' => $request->message,
        ]);
        toast('Your Message Send Successfully','success');
        return back();
    }
    public function delete($contact)
    {
        $contact->delete();
         toast('Contact Deleted Successfully','success');
         return redirect(route('admin.contact.index'));
    }
}
