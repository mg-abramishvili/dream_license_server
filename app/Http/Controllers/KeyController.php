<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Program;
use App\Models\Parameter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class KeyController extends Controller
{
    public function index()
    {
        $keys = Key::where('fortest', 'prod')->latest()->get();
        return view('keys.index', compact('keys'));
    }

    public function create()
    {
        $programs = Program::all();
        return view('keys.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $generate1 = \Str::random(4);
        $generate2 = \Str::random(4);
        $generate3 = \Str::random(4);
        $generate4 = \Str::random(4);

        $data = request()->all();
        $key = new Key();
        $key->key = \Str::upper($generate1."-".$generate2."-".$generate3."-".$generate4);
        $key->status = 'waiting';
        $key->comment = $data['comment'];
        $key->fortest = $data['fortest'];
        $key->save();
        $key->programs()->attach($request->programs, ['key_id' => $key->id]);
        $parameters = new Parameter([
            'dreambox_theme' => $data['dreambox_theme'],
            'dreambox_orientation' => $data['dreambox_orientation'],
            'dreambox_title' => $data['dreambox_title'],
            'dreambox_module_photoalbums' => $data['dreambox_module_photoalbums'],
            'dreambox_module_videoalbums' => $data['dreambox_module_videoalbums'],
            'dreambox_module_news' => $data['dreambox_module_news'],
            'dreambox_module_routes' => $data['dreambox_module_routes'],
            'dreambox_module_reviews' => $data['dreambox_module_reviews'],
        ]);
        $key->parameters()->save($parameters);
        return redirect('/keys');
    }

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
        $key = Key::where('key', '=', $key)->firstOrFail();
        return response()->json($key);
    }

    public function delete($id)
    {
        $key = Key::find($id);
        $key->delete();
        return redirect('/keys');
    }
}
