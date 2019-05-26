@extends('layouts.main')
@section('title','Contact Us')

@push('css')
  <style>
      #contact{
        background-image: url(../../images/back.jpg);
        background-size:cover;
      }

    .contact-form{
      background:rgba(0,0,0, .6);
      color:white;
      margin-top: 100px;
      padding: 20px;
      box-shadow: 0px 0px 10px 3px grey;
    }
   </style>
@endpush

@section('content')
@can('isUser')
<br>
<div id="contact">
  <br>
  <div class="container contact-form" style="margin-top: 4%;">
  	<h1>Contact form</h1>
  	<hr style="background: white;">

  	<div class="row">
     
         <div class="col-md-6">
         	<address>W-343 Coseis Meits UT</address>
         	<p>Email:- test@email.com</p>
         	<p>Phone:- 34563463434</p>
         </div>

         <div class="col-md-6">
         	
           <div class="form-group">
           	<label>Name</label>
           	<input type="text" class="form-control">
           </div>

           <div class="form-group">
           	<label>Email</label>
           	<input type="text" class="form-control">
           </div>

           <div class="form-group">
           	<label>Massage</label>
           	<textarea  class="form-control" rows="7"></textarea>
           </div>

           <div class="form-group">
           	<button class="btn btn-primary btn-block">Send</button>
           </div>

         </div>

      </div>

  </div>
  <br><br><br>
</div>
<br><br><br>

@endcan
@endsection
 