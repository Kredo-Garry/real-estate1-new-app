<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\RealEstateInquiry;


class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail from RealEstate Properties',
            'body' => 'Thank you for sending your inquiries. One of our agent will reach out to you shortly and attend to your inquiry.'
        ];

        Mail::to('kredoteacher.grodriguez@gmail.com')->send(new RealEstateInquiry($mailData));
        // dd() --> dump variables content to the browser and prevent further
        // execution of the script
        // dd("Email sent successfully!");

        return redirect()->route('index');
    }
    public function create(){
        return view('inquiries.emails.index');
    }
}
