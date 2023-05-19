<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emailInquiry;

class EmailInquiryController extends Controller
{
    private $mailInquiry;

    public function __construct(emailInquiry $mailInquiry){
        $this->mailInquiry = $mailInquiry;
    }

    public function index(){

    }

    public function show(){
        return view('inquiries.emails.index');
    }

    public function create(Request $request){
        $request->validate([
            'email_inquire' => 'required|email'
        ]);

        $this->mailInquiry->email = $request->email_inquire;
        $this->mailInquiry->save();
        return redirect()->back();
    }
}
