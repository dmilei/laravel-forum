<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications()
    {
      if(!auth()->user()) return redirect()->route('discussions.index');
      auth()->user()->unreadNotifications->markAsRead();

      return view('users.notifications', [
        'notifications' =>   auth()->user()->notifications()->paginate(5)
      ]);
    }
}
