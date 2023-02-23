<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Services\LevelService;

class LevelController extends Controller
{
    private $service;

    public function __construct(LevelService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $levels = $this->service->getAll();
        return view('level.index', compact('levels'));
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(LevelRequest $request)
    {
        $level = $this->service->create($request->validated());
        return redirect()->route('levels.index')->with('success', 'Level created successfully.');
    }

    public function edit($id)
    {
        $level = $this->service->getById($id);
        return view('level.edit', compact('level'));
    }

    public function update(LevelRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('levels.index')->with('success', 'Level updated successfully.');
    }

    public function delete($id)
    {
        $level = $this->service->getById($id);
        return view('level.delete', compact('level'));
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('levels.index')->with('success', 'Level deleted successfully.');
    }
}
