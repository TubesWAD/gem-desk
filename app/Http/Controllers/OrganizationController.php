<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreOrganization;
//use App\Http\Requests\StoreOrganizationRequest;
//use App\Http\Requests\UpdateOrganizationRequest;

use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

//use Illuminate\Support\Facades\Session;
// use PhpParser\Builder;
// use function PHPUnit\TestFixture\func;


class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $organizations = Organization::latest()->paginate(5);
        
        //$organizations = \App\Models\Organization::all();
        return view('organizations.index',compact('organizations'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'organization_name' => 'required',
            'description' => 'required',
            'industry_category' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'fax_no' => 'required',
            'web_url' => 'required',
        ]);

        Organization::create($request->all());

        //$organization = new Organization;
        // $organization->organization_name = $request->organization_name;
        // $organization->description = $request->description;
        // $organization->industry_category = $request->industry_category;
        // $organization->address = $request->address;
        // $organization->city = $request->city;
        // $organization->postal_code = $request->postalcode;
        // $organization->state = $request->state;
        // $organization->country = $request->country;
        // $organization->email = $request->email;
        // $organization->phone_no = $request->phone_no;
        // $organization->fax_no = $request->phone_no;
        // $organization->web_url = $request->web_url;
        // if ($request->hasFile('file')){
        //     $pathFile = $request->file('file')->store('logo', 'public');
        //     $organization->files = $pathFile;
        // }else{
        //     $organization->files = '';
        // }

        // $organization->save($request->validated());
        return redirect()->route('organizations.index')
                        ->with('success','Organization created successfully!');
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
    public function edit(Organization $organization): view
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization): RedirectResponse
    {
        $request->validate([
            'organization_name' => 'required',
            'description' => 'required',
            'industry_category' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'fax_no' => 'required',
            'web_url' => 'required',
        ]);

        $organization->update($request->all());
        
        // $organization->organization_name = $request->organization_name;
        // $organization->description = $request->description;
        // $organization->industry_category = $request->industry_category;
        // $organization->address = $request->address;
        // $organization->city = $request->city;
        // $organization->postal_code = $request->postalcode;
        // $organization->state = $request->state;
        // $organization->country = $request->country;
        // $organization->email = $request->email;
        // $organization->phone_no = $request->phone_no;
        // $organization->fax_no = $request->phone_no;
        // $organization->web_url = $request->web_url;
        // if ($request->hasFile('file')){
        //     $pathFile = $request->file('file')->store('logo', 'public');
        //     $organization->files = $pathFile;
        // }else{
        //     $organization->files = '';
        // }
        
        // $organization->update($request->validated());
        return redirect()->route('organizations.index')
                        ->with('success','Organization updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        // $oldFile = $organization->files;
        // unlink(storage_path('app/public/') . $oldFile);
        $organization->delete();

        return redirect()->route('organizations.index')
                        ->with('success','Organization deleted successfully!');
    }
}