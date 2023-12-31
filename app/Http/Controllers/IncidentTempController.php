<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncidentTempRequest;
use App\Models\IncidentTemp;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class IncidentTempController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        $incidentTemps = IncidentTemp::all();
        return response(view('incidentTemps.index', compact('incidentTemps')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
//        $service = Service::all();
//        return view('incidentTemps.create', compact('service'));

        return view('incidentTemps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncidentTempRequest $request) : RedirectResponse
    {
        $incidentTemp = new IncidentTemp();
//        $incidentTemps->service_id = $request->service_id;
        $incidentTemp->service_id = 1;
        $incidentTemp->incident = $request->incident;
        $incidentTemp-> probability = $request->probability;
        $incidentTemp->risk_quadrant = $request->risk_quadrant;

        $probabilityMap = ['Low' => 1, 'Medium' => 2, 'High' => 3];
        $probability = $probabilityMap[$incidentTemp->probability] ?? 0;

        $risk_level = $probability + $request->risk_quadrant;
        if($risk_level >= 0 and $risk_level <= 2){
            $incidentTemp->risk_level = "Low";
        }elseif ($risk_level >= 3 and $risk_level <= 4){
            $incidentTemp->risk_level = "Medium";
        }elseif ($risk_level >= 5 and $risk_level <= 6){
            $incidentTemp->risk_level = "High";
        }

        $incidentTemp->save($request->validated());
        return redirect()->route('incidentTemps.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentTemp $incidentTemp) : RedirectResponse
    {
        $incidentTemp->delete();
        return redirect(route('incidentTemps.index'))
            ->with('success', 'Deleted successfully')
            ->withErrors('error', 'Sorry, unable to delete this!');
    }
}
