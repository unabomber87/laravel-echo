<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
    	$event = new PostCreatedEvent(['name' => 'post titre']);
    	broadcast($event)->toOthers();
    }
}
