<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Add your logic to process the form data here
        // For example, you can save the user to the database
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'employee_id' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'roles' => 'required|string|in:admin,user',
            'mobile' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|string|max:255',
        ]);

        // Create a new user in the database
        $user = User::create($validatedData);
        
        // Redirect back to the form or any other route
        return redirect()->route('view');
    }
}
