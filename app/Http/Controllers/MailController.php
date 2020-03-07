<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;

class MailController extends Controller
{
    public function index()
    {
        return view('mails.index');
    }

    public function mail()
    {
        $name = 'Krunal';
        Mail::to('krunal@appdividend.com')->send(new Mailtrap($name));

        $message = 'Email was sent successfully.';
        return redirect('/email')->with('message', $message);
    }
}
