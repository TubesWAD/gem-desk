@extends('layouts.app')

@section('content')
 <div class="container-fluid">
   <div class="row">
       <div class="col-lg-12 margin-tb d-flex align-items-center" style="border-bottom: 2px solid #ccc; padding-bottom: 0px; margin-bottom: 20px;">
           <a class="btn btn-primary" href="{{ route('services.index') }}" style=" margin-bottom: 15px; margin-right: 30px;">Back</a>
           <h2 style="padding-bottom: 10px; margin-bottom: 10px;">Show {{ $service->name }} Service</h2>
       </div>
   </div>

   <div class="row">
       <div class="col-md-4">
           <div class="card" style="width: 100%;">
             <div class="card-body">
               <div class="form-group">
                  <strong></strong>
                  <img src="{{ asset('storage/' . $service->files) }}" alt="service" width="100px">
               </div>
             </div>
           </div>
       </div>

       <div class="col-md-8">
           <div class="row">
               <div class="col-md-12">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             <span style="font-size: 25px; font-weight: bold;">{{ $service->name }} Service</span>
                         </div>
                     </div>
                 </div>
               </div>
           </div>

           <div class="row">
               <div class="col-md-12">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             {{ $service->description }}
                         </div>
                     </div>
                 </div>
               </div>

           </div>

           <div class="row">
               <div class="col-md-6">
                   <div class="card" style="width: 100%;">
                       <div class="card-body">
                           <div class="form-group">
                               <strong>Asset</strong><br>
                               {{ $service->asset }}
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             <strong>Owned By</strong><br>
                             {{ $service->owned }}
                         </div>
                     </div>
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             <strong>Service Support Hours</strong><br>
                             {{ $service->hours }}
                         </div>
                     </div>
                 </div>
               </div>
           </div>

           <div class="row">
               <div class="col-md-6">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             <strong>Availability</strong><br>
                             {{ $service->availability }}
                         </div>
                     </div>
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="card" style="width: 100%;">
                     <div class="card-body">
                         <div class="form-group">
                             <strong>Cost</strong><br>
                             {{ $service->cost }}
                         </div>
                     </div>
                 </div>
                </div>
           </div>
       </div>
   </div>
 </div>
 <style>
   .card {
       box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
       transition: 0.3s;
       margin: 20px auto;
   }

   .card:hover {
       box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
   }
 </style>
@endsection
