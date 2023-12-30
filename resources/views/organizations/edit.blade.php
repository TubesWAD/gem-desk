@extends('layouts.app')

@section('content')
<div>
  <h2>Edit Organization Details</h2>
  <div class="d-grid gap-2 d-md-block">
    <a class="btn btn-primary" href="{{ route('organizations.index') }}" role="button">Back</a>
  </div>
</div>
<hr>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

@if ($errors->any())
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      There were some problems with your input!
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

<form method="POST" action="{{ route('organizations.update',$organization->id) }}">
  @csrf
  @method('PUT')

    <div>
      <h3><strong>Profile</strong></h3><br>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Organization Name</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgName" value="{{ $organization->organization_name }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Description</div>
        <div class="col-8">
          <textarea class="form-control" id="orgDesc" rows="3">{{ $organization->description }}</textarea>
        </div>
      </div>
    </div>
    <hr>

    <div>
      <h3><strong>Location</strong></h3><br>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Address</div>
        <div class="col-8">
          <textarea class="form-control" id="orgAddress" rows="3">{{ $organization->address }}</textarea><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">City</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgCity" value="{{ $organization->city }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Postal Code</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgPostcode" value="{{ $organization->postal_code }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">State</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgState" value="{{ $organization->state }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Country</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgCountry" value="{{ $organization->country }}">
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
          <input type="email" class="form-control form-control-sm" id="orgEmail" value="{{ $organization->email }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Phone No.</div>
        <div class="col-8">
          <input type="tel" class="form-control form-control-sm" id="orgPhone" value="{{ $organization->phone_no }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Fax No.</div>
        <div class="col-8">
          <input type="tel" class="form-control form-control-sm" id="orgFax" value="{{ $organization->fax_no }}"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Web URL</div>
        <div class="col-8">
          <input type="url" class="form-control form-control-sm" id="orgWeb" value="{{ $organization->web_url }}">
        </div>
      </div>

      <!-- div class="row">
        <div class="col-1"></div>
        <div class="col-2">Company Logo</div>
        <div class="col-8">
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*" value="{{ $organization->logo }}">
        </div>
      </div -->
      <br>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2" type="submit">Save</button>
        <!--button class="btn btn-outline-secondary" type="reset">Reset</button -->
      </div>
    </div>
</form>
@endsection