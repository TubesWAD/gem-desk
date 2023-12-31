<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        if ($request->ajax()) {
            $data = Service::query()->where('name', 'LIKE', $query . '%')
                ->limit(10)
                ->get();
            $output = '';
            $loop = 0;
            if (count($data) > 0) {
                foreach ($data as $service) {

                    echo '
                        <tr>
                            <td>' . ($loop + 1) . '</td>
                            <td>' . $service->name . '</td>
                            <td>' . $service->service_categories . '</td>
                            <td>' . $service->description . '</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-success me-1" href="' . route("services.show", $service->id) . '">Show</a>
                                <a class="btn btn-primary me-1" href="' . route("services.edit", $service->id) . '">Edit</a>
                                <form action="' . route("services.destroy", $service->id) . '" method="post">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="btn btn-danger me-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    ';
                    $loop += 1;
                }
            }else{
                $output .= '<td colspan="6">
                        <div class="d-flex justify-content-center">
                            No Record Found
                        </div>
                    </td>
                    ';
            }
            return $output;
        }

        $services = Service::query()->where('name', 'LIKE', '%' . $query . '%')
            ->simplePaginate(8);
        return view('services.index',compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $organizations = Organization::all();
        $products = Product::all();
        return response(view('services.create', compact('organizations','products')) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_categories' => 'required',
            'asset' => 'required',
            'cost' => 'required',
            'availability' => 'required',
            'hours' => 'required',
            'owned' => 'required',
            'files' => 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500',
        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->service_categories = $request->service_categories;
        $service->asset = $request->asset;
        $service->description = $request->description;
        $service->cost = $request->cost;
        $service->availability = $request->availability;
        $service->hours = $request->hours;
        $service->owned = $request->owned;

        if ($request->hasFile('file')){
            $pathFile = $request->file('file')->store('files', 'public');
            $service->files = $pathFile;
        }else{
            $service->files = '';
        }

        $service->save();

        return redirect()->route('services.index')
                        ->with('success','Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        $organizations = Organization::all();
        $products = Product::all();
        return view('services.edit', compact('service', 'organizations', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_categories' => 'required',
            'asset' => 'required',
            'cost' => 'required',
            'availability' => 'required',
            'hours' => 'required',
            'owned' => 'required',
            'files'=> 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500',
        ]);

        $service->name = $request-> name;
        $service->service_categories = $request-> service_categories;
        $service->description = $request-> description;
        $service->asset = $request-> asset;
        $service->cost = $request-> cost;
        $service->availability = $request-> availability;
        $service->hours = $request-> hours;
        $service->owned = $request-> owned;

        if ($request->hasFile('files')) {
            $oldFile = $service->files;

            if ($oldFile) {
                $fullOldFilePath = 'public/files/' . $oldFile;
                if (Storage::exists($fullOldFilePath)) {
                    Storage::delete($fullOldFilePath);
                }
            }

            $pathFile = $request->file('files')->store('files', 'public');
            $service->files = $pathFile;
         }

        $service->update();

        return redirect()->route('services.index')
                        ->with('success','Service updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $oldFile = $service->files;
        unlink(storage_path('app/public/') . $oldFile);
        $service->delete();

        return redirect()->route('services.index')
                        ->with('success','Service deleted successfully');
    }
}
