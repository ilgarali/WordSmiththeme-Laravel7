@extends('back.layouts.master')
@section('content')
    

<!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     
     <div class="row">
         @if (session('success'))
         <div class="col-md-12">
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        </div>
         @endif
        
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                
            <form class="forms-sample" method="POST" action="{{route('admin.categories.store')}}">
                @csrf
                  <div class="form-group">
                    <label for="exampleInputUsername1">Add Category</label>
                    <input name="category" type="text" class="form-control" id="exampleInputUsername1" placeholder="Category">
                  </div>
                  
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
               
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            
                       
                      <tr>
                      <td id="{{$category->id}}" >{{$category->name}}</td>
                      <td><button value="{{$category->id}}" class="btn btn-sm mx-y btn-info btn-rounded btn-fw edit">Edit</button>
                           
                    </td>
                           <td> 
                               <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm mx-y btn-danger btn-rounded btn-fw">Delete</button>
                          </form></td>
                       
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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

 <div style="hidden" id="csrf">
    @csrf

</div>

 <script>
      let myvalue,getTd ;
     let edit = document.querySelectorAll('.edit');
     for (let i = 0; i < edit.length; i++) {
         edit[i].addEventListener('click',(e) => {
             e.preventDefault();
              myvalue = edit[i].value;

             getTd = document.getElementById(myvalue);
            
            
             edit[i].parentNode.innerHTML = `<button type="button" class="btn btn-sm btn-dark btn-rounded btn-fw confirm">Confirm</button>`;
             getTd.innerHTML = ` <input type="text" class="${myvalue}" placeholder="${getTd.innerText}" >  `;

             confirm();
             
             
         });
         
     }
     let token = document.getElementById('csrf').childNodes[1].value;
     
  
     
    function confirm() {
        let confirmed = document.querySelectorAll('.confirm');
             for (let j = 0; j < confirmed.length; j++) {
                 confirmed[j].addEventListener('click',(e) => {
                     e.preventDefault();
                     
                     
                     let newval = document.getElementsByClassName(myvalue)[0].value;
                     let url = "{{route('admin.fetch')}}";
                     let data = new FormData();
                     data.append('newval',newval);
                     data.append('id',myvalue);
                     fetch(url,{
                        headers: {
                        "X-CSRF-TOKEN": token
                        },
                        method:"post",
                        body:data
                     }).then((res) => res.json())
                     .then((res) => { if (res) {
                    location.reload();
                 }})
                     .catch((error) => console.log(error))
                 });
                 
                
                 
             }
    }

    



 </script>

 @endsection