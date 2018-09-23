<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function show()
    {
      $user = \Auth::user();
      return view('user.show')->with('user', $user);
    }
}
