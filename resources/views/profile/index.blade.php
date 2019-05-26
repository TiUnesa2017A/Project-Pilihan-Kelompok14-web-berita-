@extends('layouts.main')
@section('title',"user: $user->name")
@section('content')

@can('isUser')
<div class="container">
    <div class="jumbotron" id="tc_jumbotron_profile">
        <div class="card-body">
            <div class="text-center">
                <div class="profile_img"> 
                  <img src="{{asset('images/'. Auth::user()->image)}}" style="background: #fff;">
                </div>
                <div id="user_name">
                  <h3>{{$user->name}}</h3> 
                    <br>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card" style="border: none; text-align: center;">
                    <div class="card-header" style="background: #f5f8fa; padding: 0;">
                        <div class="footer_sosial_profile">
                            <a href="{{route('editProfile', Auth::user()->id)}}"><i class="fa fa-user"></i></a>
                            <a href="{{route('PopularThread')}}"><i class="fa fa-list"></i></a> 
                            <a href="{{route('thread.create')}}"><i class="fa fa-edit"></i></a> 
                            <a href="{{Auth::user()->facebook}}" target="blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{Auth::user()->twitter}}" target="blank"><i class="fa fa-twitter"></i></a> 
                            <a href="{{Auth::user()->instagram}}" target="blank"><i class="fa fa-instagram" style="padding-right: 9px;"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault">
                <div class="card-body" id="tc_panelbody"  style="background: #f9f9f9;"> 
                    <div class="card">
                        <div class="card-header" style="background-color: #2175ff;">
                            <div class="menu_a" style="float: left;">
                              <a href="#">{{$user->name}} || Threads</a> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered"> 
                              <tbody>
                              @forelse($threads as $thread)   
                                <tr> 
                                  <td>{!! str_limit($thread->title,40) !!}.., <i style="font-size: 10px; color: #999;"> {{$thread->created_at->diffForHumans()}}, {{$thread->thread_comments->count()}} Comments, {{views($thread)->count()}} Views</i>
                                  </td>
                                  @if(auth()->user()->id == $thread->user_id)
                                  <td width="10"><a href="{{route('thread.edit', $thread->slug)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                  </td>
                                  <td width="10"> 
                                      <form action="{{route('thread.destroy', $thread->slug)}}" method="post" style="margin: 0;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                      </form> 
                                  </td>  
                                  <td width="10"><a href="{{route('threadSlug', $thread->slug)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a></td>
                                  @endif
                                </tr>
                              @empty
                                <div class="text center">
                                    <h2>History Thread Anda Kosong</h2>
                                    <h5>*Anda Belum Memposting Satu Thread Pun</h5>
                                </div>
                              @endforelse 
                              </tbody>
                            </table>
                        </div> 
                    </div> 
                    <div class="card" style="border: none;">
                        <div class="card-header"></div> 
                        <div class="card-body" style="background: rgb(90, 90, 90)"></div>
                        <div class="card-header"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
@endcan
@endsection