<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperRequest;
use App\Services\DeveloperService;

class DeveloperController extends Controller
{
    private $service;

    public function __construct(DeveloperService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $developers = $this->service->getAll();
        return view('developer.index', compact('developers'));
    }

    public function create()
    {
        return view('developer.create');
    }

    public function store(DeveloperRequest $request)
    {
        $developer = $this->service->create($request->validated());
        return redirect()->route('developers.index')->with('success', 'Developer created successfully.');
    }

    public function edit($id)
    {
        $developer = $this->service->getById($id);
        return view('developer.edit', compact('developer'));
    }

    public function update(DeveloperRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('developers.index')->with('success', 'Developer updated successfully.');
    }

    public function delete($id)
    {
        $developer = $this->service->getById($id);
        return view('developer.delete', compact('developer'));
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully.');
    }
}
