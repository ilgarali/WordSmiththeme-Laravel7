@extends('back.layouts.master')
@section('content')
    

<!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic form elements</h4>
          <p class="card-description">
            Basic form elements
          </p>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('admin.posts.store')}}">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
           
            <div class="form-group">
                <label for="exampleSelectGender">Select Category</label>
                  <select name="category" class="form-control" id="exampleSelectGender">
                      @foreach ($categories as $category)
                  <option  value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    
                  
                  </select>
                </div>

            <div class="form-group">
              <label for="exampleSelectGender">Select to use or Not use in slide</label>
                <select name="slide" class="form-control" id="exampleSelectGender">
                  <option selected value="1">Slide</option>
                  <option value="0">Not Slide</option>
                </select>
              </div>
            <div class="form-group">
              <label>Image upload</label>
              <input type="file" name="img" class="form-control">
              
            </div>
           
            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
              <textarea name="content" class="form-control" id="exampleTextarea1" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
           
          </form>
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