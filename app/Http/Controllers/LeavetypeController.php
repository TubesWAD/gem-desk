<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LeaveType::all();
        return view('leavesTypes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leavesTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nameLeavetype' => 'required',
            'description' => 'required',
            'maxDuration' => 'required',
            'status' => 'required'
        ]);
        
        LeaveType::create($request->all());
         
        return redirect()->route('leavesTypes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = LeaveType::find($id);
        //dd($data);
        return view('leavesTypes.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = LeaveType::find($id);
        return view('leavesTypes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = LeaveType::find($id);
        $data->update($request->all());
        return redirect()->route('leavesTypes.index');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leave_types): RedirectResponse
    {
        $leave_types->delete();
        return redirect(route('leavesTypes.index'));
    }
}
