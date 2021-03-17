<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Key;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'title_code' => 'required',
        ]);

        $data = request()->all();
        $program = new Program();
        $program->title = $data['title'];
        $program->title_code = $data['title_code'];
        $program->save();
        return redirect('/programs');
    }

    public function show(Program $program)
    {
        //
    }

    public function edit(Program $program)
    {
        //
    }

    public function update(Request $request, Program $program)
    {
        //
    }

    public function delete($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect('/programs');
    }
}
