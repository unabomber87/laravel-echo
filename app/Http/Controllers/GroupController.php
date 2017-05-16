<?php

namespace App\Http\Controllers;

use App\Events\GroupWithEvent;
use App\Group;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    //
    //
    public function index(){
    	$groups = Group::all();
    	return view('group.index', compact('groups'));
    }

    public function notify($id){
    	$group = Group::find($id);
        $user = Auth::user();
        $user->notify(new EmailNotification($group));
    	broadcast(new GroupWithEvent($group));
    	return redirect('/');
    }
}
