<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all(['id', 'name', 'email']);
        return response()->json($developers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $developer = Developer::create($request->post());
        return response()->json([
            'developer'=>$developer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        return response()->json($developer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $developer->fill($request->post())->save();
        return response()->json([
            'developer'=>$developer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
        return response()->json([
            'message'=> 'Desenvolvedor Removido'
        ]);
    }
}
