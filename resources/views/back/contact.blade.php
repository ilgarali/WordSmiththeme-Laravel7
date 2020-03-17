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
                  <th>
                    Website
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
                @foreach ($contacts as $contact)
                    
                
                <tr>
                  <td>
                    {{$contact->name}}
                  </td>
                  <td>
                    {{$contact->email}}
                  </td>
                  <td>
                    {{$contact->website}}
                  </td>
                  <td>
                    {{$contact->content}}
                  </td>
                  <td>
                  <form action="{{route('admin.cdelete',$contact->id)}}" method="post">
                    @csrf
                  
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    {{ $contacts->links() }}
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