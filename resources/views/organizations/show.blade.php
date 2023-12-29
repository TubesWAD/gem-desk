@extends('layouts.app')

@section('content')
  <h2>PT Indofood Sukses Makmur</h2><br>
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="#"><b>Profile</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="true" href="http://127.0.0.1:8000/department">Department</a>
        </li>
      </ul>
    </div>
                  
    <div class="card-body">
      <h3 class="card-title">Description</h3>
      <p>
        PT Indofood Sukses Makmur atau lebih dikenal dengan nama Indofood merupakan produsen berbagai 
        jenis makanan dan minuman yang bermarkas di Jakarta, Indonesia. Perusahaan ini mengekspor bahan 
        makanannya hingga Australia, Asia, dan Eropa. Dalam beberapa dekade ini Indofood telah bertransformasi 
        menjadi sebuah perusahaan total food solutions dengan kegiatan operasional yang mencakup seluruh tahapan 
        proses produksi makanan, mulai dari produksi dan pengolahan bahan baku hingga menjadi produk akhir yang 
        tersedia di rak para pedagang eceran.
      </p><br>
      
      <h3 class="card-title">Address</h3>
      <p>Sudirman Plaza, Indofood Tower Lt. 23, Jl. Jend. Sudirman Kav. 76-78, Jakarta 12910</p><br>

      <h3 class="card-title">State</h3>
      <p>Jakarta</p><br>

      <h3 class="card-title">Country</h3>
      <p>Indonesia</p><br>
                    
      <h3 class="card-title">Contact Information</h3>
      <p>-</p><br>
      
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="#" class="btn btn-primary">Edit Detail</a>
      </div>
    </div>
  </div>
@endsection