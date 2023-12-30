<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//use App\Http\Controllers\RedirectResponse;
use Illuminate\View\View;


class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Incident::all();
        return view("incidents.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view("incidents.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
           'incident' => 'required|min:5',
           'probability' => 'required',
           'risk_impact' => 'required',
           'incident_desc' => 'required|min:5'
        ]);

        $incident = new Incident();
        $incident->incident = $request->incident;
        $incident->probability = $request->probability;
        $incident->risk_impact = $request->risk_impact;
        $incident->priority = $request->priority;
        $incident->incident_desc = $request->incident_desc;
        $incident->service_id = 1;
        $incident->asset_id = 1;

        $probabilityMap = ['Low' => 1, 'Medium' => 2, 'High' => 3];
        $probability = $probabilityMap[$incident->probability] ?? 0;
        
        $impactMap = ['Low' => 1, 'Medium' => 2, 'High' => 3];
        $impact = $impactMap[$incident->risk_impact] ?? 0;

        $priority = $probability + $impact;
        if($priority >= 0 and $priority <= 2){
            $incident->priority = "Low";
        }elseif($priority >= 3 and $priority <= 4){
            $incident->priority = "Medium";
        }elseif($priority >= 5 and $priority <= 6){
            $incident->priority = "High";
        }

        $incident->save();
        
        return redirect()->route('incidents.index')
                        ->with('success', 'Incident created successfuly.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident):View
    {
        return view("incidents.edit");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("incidents.show");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'incident' => 'required|min:5',
            'probability' => 'required',
            'risk_impact' => 'required',
            'incident_desc' => 'required|min:5'
         ]);

         $incident->update($request->all());

         return redirect()->route('incidents.index')
                        ->with('success', 'Incident updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incident->delete();

        return redirect()->route('incidents.index')
                        ->with('success', 'Incident deleted successfuly.');
    }
}
