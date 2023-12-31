<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = Department::all();
        $organization = Organization::all();

        return view('departments.index',compact('departments', 'organization'));
//                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required',
            'description' => 'required',
            'department_head' => 'nullable',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')
                        ->with('success','Department created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department): View
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        $request->validate([
            'department_name' => 'required',
            'description' => 'required',
            'department_head' => 'nullable',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                        ->with('success','Department deleted successfully!');
    }
}
