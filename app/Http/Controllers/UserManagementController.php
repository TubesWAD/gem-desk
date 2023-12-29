<?php

namespace App\Http\Controllers;

use App\Models\UserManagement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;

class UserManagementController extends Controller
{
    public function create(): View
    {
        return view('userManagements.create');
    }
    
    public function index(): View
    {
        // dd($data);
        $data = UserManagement::all();
        return view('userManagements.index', compact('user_management'));
    }

    public function show(UserManagement $user_management): View
    {
        // $data = UserManagement::find();
        return view('userManagements.show', compact('user_management'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            // 'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'employee_id' => 'required',
            'department_name' => 'required',
            'roles' => 'required',
            'mobile' => 'required',
            'description' => 'required',
        ]);
        UserManagement::create($request->all());
        return redirect()->route('userManagements.index')->with('success','User added successfully!');
    }

    public function edit(UserManagement $user_management): View
    {
        // $data = UserManagement::find($id);
        // $data->update($request->all());
        // return redirect()->route('userManagements.index')->with('success','User updated successfully!');
        return view('userManagements.edit', compact('user_management'));
    }

    public function update(Request $request, UserManagement $user_management): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            // 'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'employee_id' => 'required',
            'department_name' => 'required',
            'roles' => 'required',
            'mobile' => 'required',
            'description' => 'required',
        ]);
        
        $data->update($request->all());
        
        return redirect()->route('userManagements.index')
                        ->with('success','User updated successfully!');
    }

    public function destroy(UserManagement $user_management): RedirectResponse
    {
        // $data = UserManagement::find($id);
        $data->delete();
        return redirect()->route('userManagements.index')->with('success','User deleted successfully!');
    }
}
