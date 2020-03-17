@extends('back.layouts.master')
@section('content')
    

<!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">{{$posts->count()}} Posts found</h4>
        
          @if (session('success'))
          <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
        
          <p class="card-description">
          <a href="{{route('admin.posts.create')}}" style="color:white" class="btn btn-info btn-rounded btn-fw">Add Post</a>
          </p>
          
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                   Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Content
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $say = 1
                  @endphp

                  @foreach ($posts as $post)
                      
                 
                <tr>
                  <td>
                    {{$say++}}
                  </td>
                  <td>
                   <img src="{{asset('images/'.$post->img)}}" class="img-fluid" alt="">
                  </td>
                  <td>
                    {{$post->title}}
                  </td>
                  <td>
                    {{$post->category->name}}
                  </td>
                  <td>
                    {{$post->content}}
                  </td>
                  <td>
                  <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-sm mx-y btn-info btn-rounded btn-fw">Edit</a>
                  <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mx-y btn-danger btn-rounded btn-fw">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    {{ $posts->links() }}
   </div>
   <!-- content-wrapper ends -->
   <!-- partial:partials/_footer.html -->
   <footer class="footer">
     <div class="d-sm-flex justify-content-center justify-content-sm-between">
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
       <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
     </div>
   </footer>
   <!-- partial -->
 </div>

 @endsection