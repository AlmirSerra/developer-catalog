<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return response()->json($levels);
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
        $level = Level::create($request->all());
        return response()->json([
            'level' => $level,
            'message' => 'Nivel criado com sucesso'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return response()->json($level);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $level->update($request->all());
        return response()->json([
            'level' => $level,
            'message' => 'Nivel atualizado com sucesso'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return response()->json([
            'message' => 'Nivel removido com sucesso'
        ]);
    }
}
