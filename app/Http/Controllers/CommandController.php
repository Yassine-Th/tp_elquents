<?php

namespace App\Http\Controllers;

use App\Models\commande;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = commande::all();
        return view("commands.index",compact("commands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("commands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $command = commande::find($id);
        return view("commands.show",compact("command"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $command = commande::find($id);
        return view("commands.edit",compact("command"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $command = commande::find($id);
        // dd($command);
        $data = $request->all();
        //    dd($data);
        $command->update($data);
       
        return redirect("/commands");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        commande::destroy($id);
        return redirect("/commands");
    }
}
