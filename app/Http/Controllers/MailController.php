<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;
use App\Email;

class MailController extends Controller
{
    public function index()
    {
        return view('mails.index');
    }

    public function mail(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'detail' => 'required'
        ]);

        $email = new Email([
            'name' => $request->get('first_name').' '.$request->get('last_name'),
            'detail' => $request->get('detail')
        ]);

        Mail::to('to@example.com')->send(new Mailtrap($email));

        $message = 'Email was sent successfully.';
        return redirect('/email')->with('message', $message);
    }
}
