@extends('layouts.main')
@section('title', 'About Us')

@push('css')
	<style type="text/css">
		.header_about{
  position:relative;
  overflow:hidden;
  display:flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  align-content: flex-start;
  height:50vw;
  min-height:434px;
  max-height:399px;
  min-width:300px;
  color:#eee;
}

.header_about:after{
  content:"";
  width:100%;
  height:30%;
  position:absolute;
  bottom:0;
  left:0;
  z-index:-1;
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(5, 6, 11, 0.37) 100%);
}

.header_about:before{
  content:"";
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0) scale(1.0, 1.0);
    transform: translateZ(0);
    /*background-color: #444;*/
  background:#1B2030 url('../../images/ImgPartner/about.jpg') top center no-repeat;
  background-size:cover;
  background-attachment:fixed;
  animation: grow 60s  linear 10ms infinite;
  transition:all 0.2s ease-in-out;
  z-index:-2
}


.header_about a{
  color:#eee
}
 
	</style>
@endpush

@section('content')
	
	
  <div class="header_about">
  <div class="info" style="margin-bottom: 20px;">
     <div class="container">
         <div class="row">
            <div class="col-md-9" style="margin-top: -6%;">
                 <div class="header_info">
                    <div class="descrip">
                        
                        <h1 style="color:grey; font-weight: bold;     margin-top: 0;">About Informatics.id</h1>
                         <p style="font-size: 20px;">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           </p><br>
                        <h3>What we deserve????</h3>
                        <p style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div><br><br>
</div>
 
        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="row text-center">
                        <p class="h1">Informatics.id</p>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque </p>
                    </div>
                </div>
            </article>
        </section>
          <br><br>

@endsection