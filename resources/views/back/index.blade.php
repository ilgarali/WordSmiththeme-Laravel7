@extends('back.layouts.master')
@section('content')
    

<!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     
     <div class="row">
       <div class="col-md-12 grid-margin">
         <div class="d-flex justify-content-between flex-wrap">
           <div class="d-flex align-items-end flex-wrap">
             <div class="mr-md-3 mr-xl-5">
             <h2>Welcome back, {{Auth::user()->name}}</h2>
             <a href="{{route('admin.posts.create')}}" style="color:white" class="btn btn-info btn-rounded btn-fw">Add Post</a>
             <a href="{{route('admin.categories.index')}}" style="color:white" class="btn btn-primary btn-rounded btn-fw">Add Category</button>
             <a href="{{route('admin.contact')}}" style="color:white" class="btn btn-secondary btn-rounded btn-fw">Messages from Contact Page</button>
             <a href="#" class="btn btn-light btn-rounded btn-fw">Approve Comments</a>
             </div>
             
           </div>
        
         </div>
       </div>
     </div>
    
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