<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Les deux sont equivalent

        $mailFromAddress = env('MAIL_FROM_ADDRESS');

        // $mailFromAddress = config('mail.from.address');

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'nullable|numeric|min:8',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = array(
            'name' => $request->name,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        // dd($data);

        Mail::to($mailFromAddress)->send(new SendMail($data));
        return redirect()->route('contact.vu')->with('sendMessage', 'Message envoyer avec success');
    }
}
