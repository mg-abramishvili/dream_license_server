<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class KeyApiController extends Controller
{

    public function edit($id)
    {
        $key = Key::find($id);
        return response()->json($key);
    }

    public function update($id, Request $request)
    {
        $key = Key::find($id);
        $key->update($request->all());
        return response()->json('The key successfully updated');
    }

    public function activate($key, Request $request)
    {
        $key = Key::where('key', '=', $key)->firstOrFail();
        $key->update($request->all());
        return response()->json('The key successfully updated');
    }

    public function view($key)
    {
        $key = Key::where('key', '=', $key)->with('programs')->with('parameters')->firstOrFail();
        return response()->json($key);
    }

}
