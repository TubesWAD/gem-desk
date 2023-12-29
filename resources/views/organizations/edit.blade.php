@extends('layouts.app')

@section('content')
  <h2>Edit Organization Details</h2>
  <hr>
  <form method="post" action="">
    @csrf
    <div>
      <h3><strong>Profile</strong></h3><br>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Organization Name</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgName"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Description</div>
        <div class="col-8">
          <textarea class="form-control" id="orgDesc" rows="3"></textarea>
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
          <textarea class="form-control" id="orgAddress" rows="3"></textarea><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">City</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgCity"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Postal Code</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgPostcode"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">State</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgState"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Country</div>
        <div class="col-8">
          <input type="text" class="form-control form-control-sm" id="orgCountry">
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
          <input type="email" class="form-control form-control-sm" id="orgEmail"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Phone No.</div>
        <div class="col-8">
          <input type="tel" class="form-control form-control-sm" id="orgPhone"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Fax No.</div>
        <div class="col-8">
          <input type="tel" class="form-control form-control-sm" id="orgFax"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Web URL</div>
        <div class="col-8">
          <input type="url" class="form-control form-control-sm" id="orgWeb"><br>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-2">Company Logo</div>
        <div class="col-8">
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
      </div>
      <br>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2" type="submit">Save</button>
        <button class="btn btn-outline-secondary" type="reset">Reset</button>
      </div>
  </form>
@endsection