<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Program;
use App\Models\Parameter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class KeyTestController extends Controller
{
    public function index()
    {
        $keys = Key::where('fortest', 'test')->latest()->get();
        return view('test-keys.index', compact('keys'));
    }
}
