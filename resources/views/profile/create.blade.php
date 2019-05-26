@extends ('layouts.main')
@section('title','Your Profile')
@section('content')

@can('isUser')
<div class="container-fluid" style="margin-top: -0.9%;">

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <br>
      <div class="container-fluid row">
    <div class="col-md-9 card text-white bg-primary" style="color: black;">
        <img src="{{ asset('images/ImgPartner/profile_header.png') }}" height="240px;">
        <br>
        <div class="well">
            
            <form action="{{route('profileUpdate', Auth::user()->id)}}" method="post">
                <h3 class="card-header text-dark text-center">Edit Profile</h3>
                {{csrf_field()}}
                {{method_field('POST')}}
                    <br>
                <div class="form-group">
                    <label for="name" class="text-dark">User Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="input name" value="{{Auth::user()->name}}">
                </div>

                <div class="form-group">
                    <label for="image" class="text-dark">Image Profile: </label>
                    <input type="file" name="image" class="form-control" style="padding-left: 10px;">
                </div>
 
                <div class="form-group">
                    <label for="profesi" class="text-dark">Profesi: </label>
                    <input type="text" name="profesi" class="form-control" style="padding-left: 10px;">
                </div>

                <div class="form-group">
                    <label for="instagram" class="text-dark">Instagram: </label>
                    <input type="url" name="instagram" class="form-control" style="padding-left: 10px;">
                </div>

                <div class="form-group">
                    <label for="facebook" class="text-dark">Facebook: </label>
                    <input type="url" name="facebook" class="form-control" style="padding-left: 10px;">
                </div>

                <div class="form-group">
                    <label for="twitter" class="text-dark">Profesi: </label>
                    <input type="url" name="twitter" class="form-control" style="padding-left: 10px;">
                </div>

                <div class="form-group">
                    <label for="about" class="text-dark info" data-toggle="collapse" data-target="#collapse1info" style="cursor: pointer;"><i class="fa fa-plus"></i> Ceritakan tentang dirimu: </label>
                    <div id="collapse1info" class="collapse">
                        <div class="card-body text-dark" style="margin-top: -2%;">
                            <ul>
                                <li>Silahkan ceritakan tentang diri anda, di bawah ini</li>
                            </ul>
                              <textarea type="" name="about" class="form-control" placeholder="input content"></textarea>
                        </div> 
                    </div>
                </div>
                

                <button type="submit" class="btn btn-success btn-block">Simpan</button>

            </form>

        </div>
        
    </div>
    <div class="col-md-3" style="margin-top: 2.5%; margin-left: -1%;">
        <div class="text-center" style=" background: #11998e;
            background: -webkit-linear-gradient(to right, #428aff, #11998e);
            background: linear-gradient(to right, #428aff, #11998e); padding: 5px; width: 350px;">
            @if(empty($user->image))
            <div class="">
                <span class="pull-left">*No Profile Picture</span><br><br>
                <img src="{{asset('images/ImgPartner/profile.jpg')}}" height="275px" width="100%" style="border-radius: 50%; border: 1px solid white;"><br>
            </div>
            @else
            <div class="">
                <img src="{{asset('images/'. Auth::user()->image)}}" height="275px" width="100%" style="border-radius: 50%; border: 1px solid white;"><br>
            </div>
            @endif
        </div><hr><br>
        <div>
            <div style=" padding-left: 10px;">
                <h2 class="pull-left">Yuor Email : </h2>
                <h2 class="pull-right">{{$user->email}}</h2>
            </div><br>
            <div style="background-color: skyblue; padding-left: 10px;">
                <h2 class="pull-left">Yuor Name : </h2>
                <h2 class="pull-right">{{$user->name}}</h2>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
        <br><br>
@endcan
@endsection

<!-- <style type="text/css">
    .link_a{
        margin-top: -1.5%; 
        margin-bottom: 4px; 
        padding-left: 15px; 
        text-decoration: none; 
    }
    .info span{
        cursor: pointer;
    }
    .info span:hover{
        text-decoration: none;
        color: blue;
    }
</style> -->

@section('ck_editor')
      <script>
          CKEDITOR.replace( 'about' );
      </script>
@endsection