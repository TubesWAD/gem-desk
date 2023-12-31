@extends('layouts.app')

@section('content')
    <div>
        <h2>Add Organization</h2>
        <div class="d-flex justify-content-start">
            <a class="btn btn-primary btn-sm" href="{{ route('organizations.index') }}" role="button">Back</a>
        </div>
    </div>
    <hr>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>
            <div>
                There were some problems with your input!
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br>
    @endif

    <form action="{{ route('organizations.store') }}" method="POST">
        @csrf

        <div>
            <h3><strong>Profile</strong></h3><br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Organization Name</div>
                <div class="col-8">
                    <input type="text" class="form-control form-control-sm" name="organization_name"><br>
                </div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Description</div>
                <div class="col-8">
                    <textarea class="form-control form-control-sm" name="description" rows="3"></textarea><br>
                </div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">Industry Category</div>
                <div class="col-8">
                    <select class="form-select form-select-sm" name="industry_category"
                            aria-label=".form-select-sm example">
                        <option selected>Select here...</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Consulting & Professional Services">Consulting & Professional Services</option>
                        <option value="Electrical Equipment">Electrical Equipment</option>
                        <option value="Food & Beverage">Food & Beverage</option>
                        <option value="Health">Health</option>
                        <option value="Information & Communication Technology">Information & Communication Technology
                        </option>
                        <option value="Fashion & Textiles">Fashion & Textiles</option>
                        <option value="Media & Entertainment">Media & Entertainment</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Transportation & Logistics">Transportation & Logistics</option>
                        <option value="Other">Others</option>
                    </select><br>
                </div>
            </div>
            <hr>

            <div>
                <h3><strong>Location</strong></h3><br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Address</div>
                    <div class="col-8">
                        <textarea class="form-control form-control-sm" name="address" rows="3"></textarea><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">City</div>
                    <div class="col-8">
                        <input type="text" class="form-control form-control-sm" name="city"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Postal Code</div>
                    <div class="col-8">
                        <input type="text" class="form-control form-control-sm" name="postal_code"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">State</div>
                    <div class="col-8">
                        <input type="text" class="form-control form-control-sm" name="state"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Country</div>
                    <div class="col-8">
                        <input type="text" class="form-control form-control-sm" name="country">
                    </div>
                </div>
            </div>
            <hr>

            <div>
                <h3><strong>Contact Information</strong></h3><br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Email</div>
                    <div class="col-8">
                        <input type="email" class="form-control form-control-sm" name="email"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Phone No.</div>
                    <div class="col-8">
                        <input type="tel" class="form-control form-control-sm" name="phone_no"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Fax No.</div>
                    <div class="col-8">
                        <input type="tel" class="form-control form-control-sm" name="fax_no"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">Web URL</div>
                    <div class="col-8">
                        <input type="url" class="form-control form-control-sm" name="web_url"><br>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                </div>
            </div>
        </div>

    </form>

@endsection
