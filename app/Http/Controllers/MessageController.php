<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('message.index');
    }

    public function create()
    {
        return view('message.create');
    }

    public function store(Request $request)
    {
        Message::create($request->all());
        return redirect()->route('message.index');
    }

    public function edit($id)
    {
        $message = Message::find($id);
        return view('message.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update($request->all());
        return redirect()->route('message.index');
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('message.index');
    }
}
