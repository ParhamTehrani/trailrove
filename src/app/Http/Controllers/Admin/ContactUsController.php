<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\ContactUsServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactUsController extends Controller
{
    private $contact;
    public function __construct(ContactUsServiceInterface $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        if (Gate::allows('call_center_index'))
        {
            $contactUs = $this->contact->getAll();
            return view('Admin.contactUs.contactUs-info',compact('contactUs'));
        }else
        {
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }


    public function edit($id)
    {
        if (Gate::allows('call_center_index'))
        {
            $contactUs = $this->contact->show($id);
            return view('Admin.contactUs.contactUs-edit',compact('contactUs'));
        }else
        {
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

}
