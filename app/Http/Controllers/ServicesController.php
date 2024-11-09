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
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        if ($request->ajax()) {
            $data = Service::query()
                ->where('name', 'LIKE', '%' . $query . '%')
                ->limit(10)
                ->get();
    
            $output = '';
            if ($data->count() > 0) {
                foreach ($data as $service) {
                    $output .= '
                        <div class="col-md-4">
                            <div class="card mb-4" style="cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;" 
                                onmouseover="this.style.transform=\'translateY(-5px)\'; this.style.boxShadow=\'0 4px 15px rgba(0,0,0,0.1)\'" 
                                onmouseout="this.style.transform=\'translateY(0)\'; this.style.boxShadow=\'none\'">
                                <div onclick="window.location=\'' . route('services.show', $service->id) . '\'" style="cursor: pointer;">
                                    <img src="' . asset('storage/' . $service->files) . '" class="card-img-top" 
                                        alt="service" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h2 class="card-title">' . $service->name . '</h2>
                                        <p class="card-text">' . $service->description . '</p>
                                    </div>
                                </div>
                                <div class="card-body" style="display: flex; gap: 10px; justify-content: start;">
                                    <a href="' . route('services.edit', $service->id) . '" 
                                    class="btn" 
                                    style="background-color: #7380EC; color: white; border: none; display: inline-flex; align-items: center; gap: 5px;"
                                    onmouseover="this.style.backgroundColor=\'#8e98f5\';" 
                                    onmouseout="this.style.backgroundColor=\'#7380EC\'">
                                        <span class="material-symbols-outlined">stylus</span>
                                        Edit
                                    </a>
                                    <form action="' . route('services.destroy', $service->id) . '" method="POST" style="display: inline;">
                                        ' . csrf_field() . '
                                        ' . method_field('DELETE') . '
                                        <button type="submit" class="btn btn-danger" style="display: inline-flex; align-items: center; gap: 5px;">
                                            <span class="material-symbols-outlined">delete</span>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else {
                $output .= '<div class="alert alert-warning">No Record Found</div>';
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
            'cost' => 'required',
            'quantity' => 'required',
            'availability' => 'required',
            'hours' => 'required',
            'organization_id' => 'required|exists:organizations,id',
            'files' => 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500',
        ]);

        DB::beginTransaction();

        try {
            // utk cek apakah produk sudah ada
            $product = Product::where('name', $request->product_name)->first();

            $service = new Service;
            $service->name = $request->name;
            $service->service_categories = $request->service_categories;
            $service->description = $request->description;
            $service->cost = $request->cost;
            $service->quantity = $request->quantity;
            $service->availability = $request->availability;
            $service->hours = $request->hours;
            $service->id_product = $request->id ?? null; 
            $service->id_organization = $request->organization_id;


            if ($request->filled('product_name')) {
                // Buat produk baru jika detail produk baru diisi
                $product = Product::create([
                    'name' => $request->product_name,
                    'organization_name' => $request->product_org,
                    'product_type' => $request->product_type,
                    'manufacturer' => $request->product_manufacturer,
                    'cost' => $request->product_cost,
                    'description' => $request->product_description,
                ]);
        
                // Set foreign key id_product dari produk baru
                $service->id_product = $product->id;
            } else {
                // Jika tidak ada produk baru
                $service->id_product = $request->asset;
            }
    
            if ($request->hasFile('file')){
                $pathFile = $request->file('file')->store('files', 'public');
                $service->files = $pathFile;
            }else{
                $service->files = '';
            }
    
            $service->save();

            DB::commit(); // Komit transaksi
            return redirect()->route('services.index')
                                ->with('success', 'Service created successfully.');
        }catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
        
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
            'cost' => 'required',
            'quantity' => 'required',
            'availability' => 'required',
            'hours' => 'required',
            'files'=> 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500',

        ]);

        $service->name = $request-> name;
        $service->service_categories = $request-> service_categories;
        $service->description = $request-> description;
        $service->cost = $request-> cost;
        $service->quantity = $request-> quantity;
        $service->availability = $request-> availability;
        $service->hours = $request-> hours;


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
