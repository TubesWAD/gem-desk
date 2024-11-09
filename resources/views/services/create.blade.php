@extends('layouts.app')

@section('content')

    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex align-items-center"
                 style="border-bottom: 2px solid #ccc; padding-bottom: 0px; margin-bottom: 20px;">
                 <a href="{{ route('services.index') }}" class="btn" style="color: black; margin-bottom: 15px; margin-right: 10px; display: flex; align-items: center;">
                    <span class="material-symbols-outlined" style="margin-right: 2px;">arrow_back</span>
                </a>
                <h2 style="padding-bottom: 10px; margin-bottom: 10px;">Add New Service</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="service-form" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select name="service_categories" class="form-control">
                                <option value="Business Category">Business Category</option>
                                <option value="IT Category">IT Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Product:</strong>
                            <select name="asset" class="form-control">
                                <option value="">-- Select a Product --</option> 
                                @forelse($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @empty
                                    <option value="" >There's no product</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

             
                    @if($products->isEmpty())
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <button type="button" class="btn btn-primary" id="add-product-btn">
                            Add New Product
                        </button>
                    </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                            <button type="button" class="btn" id="add-product-btn" style="color: #7380EC; border: 3px solid #7380EC; background: transparent; padding: 4px 16px;" onmouseover="this.style.backgroundColor='#7380EC'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#7380EC';">
                                Add Another Product
                            </button>
                        </div>
                    @endif

                    {{-- form input produk--}}
                    <div id="new-product-form" style="display: none; margin-top: 20px; margin-bottom: 20px;">
                        <div class="card" style="border: 1px solid #7380EC; padding: 20px; border-radius: 8px;">
                            <h5 style="margin-bottom: 20px;">Create Product (if not exists)</h5>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_name" style="margin-bottom: 8px;">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_org" class="form-label" style="margin-bottom: 8px;">Property of</label>
                                <select class="form-control" id="product_org" name="product_org" aria-label="Default select example">
                                    <option value="" disabled selected>Select Organization</option>
                                    @foreach($organizations as $org)
                                        <option value="{{ $org->organization_name }}">{{ $org->organization_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_type" class="form-label" style="margin-bottom: 8px;">Product Type</label>
                                <input type="text" class="form-control" id="product_type" name="product_type">
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_manufacturer" class="form-label" style="margin-bottom: 8px;">Manufacturer</label>
                                <input type="text" name="product_manufacturer" id="product_manufacturer" class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_cost" class="form-label" style="margin-bottom: 8px;">Cost</label>
                                <input type="number" name="product_cost" id="product_cost" class="form-control">
                            </div>
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="product_description" style="margin-bottom: 8px;">Product Description</label>
                                <textarea name="product_description" id="product_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                     </div>
                </div>

                <div class="col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Icon Upload:</strong>
                            <input type="file" name="file" class="form-control" placeholder="Icon Upload">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Owned By:</strong>
                            <select name="organization_id" class="form-control">
                                @forelse($organizations as $org)
                                    <option value="{{ $org->id }}">{{ $org->organization_name }}</option>
                                @empty
                                    <option value="" >There's no organization</option>
                                @endforelse
                            </select> 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Service Support Hours:</strong>
                            <input type="text" name="hours" class="form-control" placeholder="Service Support Hours">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <label for="availabilityTarget" class="form-label">Availability Target (%):</label>
                        <input type="number" class="form-control" id="availabilityTarget" name="availability"
                               placeholder="Availability Target">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 15px;">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:110px" name="description"
                                      placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                        <div style="flex: 1;">
                            <strong>Cost:</strong>
                            <input type="number" name="cost" id="cost" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" placeholder="Enter cost" oninput="calculateTotal()">
                        </div>
                        <div style="flex: 1;">
                            <strong>Quantity:</strong>
                            <input type="number" name="quantity" id="quantity" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;" placeholder="Enter quantity" oninput="calculateTotal()">
                        </div>
                    </div>
                    <div style="font-size: 1.1em; font-weight: bold; padding: 10px; background-color: rgba(115, 128, 236, 0.5); border-radius: 4px; margin-top: 10px;">
                        Total: <span id="total">Rp 0</span>
                    </div>
                
                    <script>
                        function calculateTotal() {
                            const cost = document.getElementById('cost').value || 0;
                            const quantity = document.getElementById('quantity').value || 0;
                            const total = parseFloat(cost) * parseFloat(quantity);
                            
                            const formattedTotal = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(total);
                            
                            document.getElementById('total').textContent = formattedTotal;
                        }
                    </script>
                    

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-end" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-lg" style="background-color: #7380EC; border-color: #7380EC; color: white;" onmouseover="this.style.backgroundColor='#8e98f5';" onmouseout="this.style.backgroundColor='#7380EC';">
                        Submit
                    </button>
                 </div>
            </div>


        </form>
    </div>


    <script>
        // button product form
        document.getElementById('add-product-btn').addEventListener('click', function() {
            var productForm = document.getElementById('new-product-form');
            if (productForm.style.display === 'none') {
                productForm.style.display = 'block'; 
            } else {
                productForm.style.display = 'none'; 
            }
        });
    </script>


@endsection
