<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $all_users = $this->user->latest()->get();
        $c_admin = $this->user->where('role_id', 1)->count();
        $c_users = $this->user->where('role_id', 2)->count();
        return view('admin.users.index')->with('all_users', $all_users)->with('c_admin', $c_admin)->with('c_users', $c_users);
    }

    // public function countUser(){
    //     $c_users = $this->user->where('role_id', 1)->count();
    //     return view('admin.users.index')->with('c_users', $c_users);
    // }
}
