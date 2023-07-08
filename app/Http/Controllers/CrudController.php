<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Http\Requests\StoreCrudRequest;
use App\Http\Requests\UpdateCrudRequest;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $search = Crud::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phoneNumber', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->paginate();
            return view('crud.search', compact('search'));
        } else {
            $users = Crud::paginate(5);
        }

        return view('crud.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrudRequest $request)
    {

        Crud::create($request->post());

        return redirect()->route('index')->with(['succes', 'user has been added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        return view('crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrudRequest $request, Crud $crud)
    {
        $crud->update($request->post());
        return redirect()->route('index')->with(['succes', 'user has been updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        return to_route('index')->with(['succes', 'user has been deleted successfully!']);
    }
}
