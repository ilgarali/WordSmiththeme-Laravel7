@extends('back.layouts.master')
@section('content')
    

<!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     
    <div class="card">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
              </div>
            @endif
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  
                  <th style="width:195px !important;">
                    Post Title
                  </th>
                  <th>
                    Comment
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $comment)
                    
                
                <tr>
                  <td>
                    {{$comment->name}}
                  </td>
                  <td>
                    {{$comment->email}}
                  </td>
                  
                  <td>
                    {{$comment->post->title}}
                  </td>
                  <td>
                    {{$comment->comment}}
                  </td>
                  <td>
                    @if (!$comment->approve)
                    <form class="my-2" action="{{route('admin.approve',$comment->id)}}" method="post">
                      @csrf
                      <input type="hidden" name="approve" value="1">
                          <button type="submit" class="btn btn-sm btn-success">Approve</button>
                      </form>

                      @else
                      <form class="my-2" action="{{route('admin.approve',$comment->id)}}" method="post">
                        @csrf
                            <input type="hidden" name="approve" value="0">
                            <button type="submit" class="btn btn-sm btn-warning text-white">Unapprove</button>
                        </form>
  
                    @endif
                   


                  <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                    @csrf
                  @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    {{ $comments->links() }}
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