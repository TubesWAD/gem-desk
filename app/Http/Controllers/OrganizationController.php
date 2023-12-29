<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_org = \App\Models\Organization::all();
        return view('organizations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response(view('organizations.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $organization = new Organization;
        $organization->organization_name = $request->organization_name;
        $organization->description = $request->description;
        $organization->industry_category = $request->industry_category;
        $organization->address = $request->address;
        $organization->city = $request->city;
        $organization->postal_code = $request->postalcode;
        $organization->state = $request->state;
        $organization->country = $request->country;
        $organization->email = $request->email;
        $organization->phone_no = $request->phone_no;
        $organization->fax_no = $request->phone_no;
        $organization->web_url = $request->web_url;
        $organization->industry_category = $request->industry_category;
        if ($request->hasFile('file')){
            $pathFile = $request->file('file')->store('logo', 'public');
            $organization->files = $pathFile;
        }else{
            $organization->files = '';
        }

        $ticket->save($request->validated());
        return redirect(route('organizations.index'))->with('success', 'Organization created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization): View
    {
        return view('organizations.show', compact('organization'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $organization->organization_name = $request->organization_name;
        $organization->description = $request->description;
        $organization->industry_category = $request->industry_category;
        $organization->address = $request->address;
        $organization->city = $request->city;
        $organization->postal_code = $request->postalcode;
        $organization->state = $request->state;
        $organization->country = $request->country;
        $organization->email = $request->email;
        $organization->phone_no = $request->phone_no;
        $organization->fax_no = $request->phone_no;
        $organization->web_url = $request->web_url;
        $organization->industry_category = $request->industry_category;
        if ($request->hasFile('file')){
            $pathFile = $request->file('file')->store('logo', 'public');
            $organization->files = $pathFile;
        }else{
            $organization->files = '';
        }
        
        $organization->update($organization->validated());
        return redirect(route('organizations.index'))->with('success', 'Organization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization): RedirectRespons
    {
        $oldFile = $organization->files;
        unlink(storage_path('app/public/') . $oldFile);
        $organization->delete();

        return redirect(route('organizations.index'))->with('error', 'Sorry, unable to delete this!');
    }
}
