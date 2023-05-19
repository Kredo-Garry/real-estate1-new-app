<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broker;

class BrokerController extends Controller
{
    private $p_broker;

    public function __construct(Broker $p_broker){
        $this->p_broker = $p_broker;
    }

    public function index(){
        //list all name of broker here
    }

    public function create(){
        return view('brokers.create');
    }
    public function store(Request $request){
        $request->validate([
            'broker_name' => 'required|min:1|max:50',
            'contact_no' => 'required|min:1|max:15',
            'email_address' => 'required|min:1|max:15'
        ]);

        $this->p_broker->name = $request->broker_name;
        $this->p_broker->contact_no = $request->contact_no;
        $this->p_broker->email = $request->email_address;
        $this->p_broker->save();

        return redirect()->back()->with('broker-added', 'Broker Addedd Successfully');
    }
}
