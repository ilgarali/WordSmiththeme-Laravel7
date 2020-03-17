@extends('front.layouts.master')

@section('content')

<section class="s-content s-content--top-padding s-content--narrow">


    @if (session('success'))
    <div class="alert alert-success text-center">
       <h1 style="color:royalblue;" > {{session('success')}}</h1>
    </div>
@endif
<article class="row entry format-standard">

<div class="entry__media col-full">
<div class="entry__post-thumb">
<img src="{{asset('images/'.$post->img)}}" >
</div>
</div>

<div class="entry__header col-full">
<h1 class="entry__header-title display-1">
    {{($post->title)}}
</h1>
<ul class="entry__header-meta">
    <li class="date">{{$post->created_at}}</li>
    <li class="byline">
        By
        <a href="#0">Jonathan Doe</a>
    </li>
</ul>
</div>

<div class="col-full entry__main">

<p>{{$post->content}}</p>
</div> <!-- s-entry__main -->

</article> <!-- end entry/article -->


<div class="s-content__entry-nav">
<div class="row s-content__nav">
<div class="col-six s-content__prev">
    @if ($previouspost != null)
<a href="{{route('single',[$previouspost->category->slug,$previouspost->slug])}}" rel="prev">
        <span>Previous Post</span>
        {{$previouspost->title}}
    </a>
    @endif
</div>
<div class="col-six s-content__next">
    @if ($nextpost != null)
    <a href="{{route('single',[$nextpost->category->slug,$nextpost->slug])}}" rel="next">
        <span>Next Post</span>
        {{$nextpost->title}}
    </a>
    @endif
   
</div>
</div>
</div> <!-- end s-content__pagenav -->

<div class="comments-wrap">

<div id="comments" class="row">
<div class="col-full">

    <h3 class="h2">{{$comments->count()}} Comments</h3>

    <!-- START commentlist -->
    <ol class="commentlist">

   

        <li class="thread-alt depth-1 comment">
            @foreach ($comments as $comment)
                
       
            
          
            <div class="comment__content">

                <div class="comment__info">
                <div class="comment__author">{{$comment->name}}</div>

                    <div class="comment__meta">
                        <div class="comment__time">{{$comment->created_at}}</div>
                        <div class="comment__reply">
                        <a class="comment-reply-link reply">Reply
                        <input type="hidden" value="{{$comment->id}}">
                        </a>
                        </div>
                    </div>
                </div>

                <div class="comment__text">
                <p>{{$comment->comment}}</p>
                </div>

                <div class="replyform" style="display:none;">

<form name="contactForm" id="contactForm" class="form">
    
        <fieldset>
      
            <div class="form-field">
                <input name="cName" id="cName" class="full-width cName" placeholder="Your Name*"  type="text">
            </div>
            
            <div class="form-field">
                <input name="cEmail" id="cEmail" class="full-width cEmail" placeholder="Your Email*" type="text">
            </div>

           
            <div class="form-field">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            </div>

            <div class="message form-field">
                <textarea name="cMessage" id="cMessage" class="full-width cMessage" placeholder="Your Message*"></textarea>
            </div>

            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

        </fieldset>
    </form> <!-- end form -->
  
                </div>

            </div>

            @foreach ($comment->aprrovedreplyies as $reply)
                
         
            <ul class="children">

                <li class="depth-2 comment">

                    <div class="comment__avatar">
                        <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                    </div>
              
                    <div class="comment__content">

                        <div class="comment__info">
                        <div class="comment__author">{{$reply->name}}</div>

                            
                    
                        </div>

                        <div class="comment__text">
                            <p>{{$reply->reply}}</p>
                        </div>

                    </div>

                  

                </li>

            </ul>
            @endforeach


            @endforeach
         

        </li> <!-- end comment level 1 -->

      

    </ol>
    <!-- END commentlist -->           

</div> <!-- end col-full -->
</div> <!-- end comments -->

<div class="row comment-respond">

<!-- START respond -->
<div id="respond" class="col-full">

    <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

    

<form name="contactForm" id="contactForm" method="post" action="{{route('comment')}}" >
    @csrf
        <fieldset>
            
            <div class="form-field">
                <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text">
            </div>
            
            <div class="form-field">
                <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text">
            </div>

           
            <div class="form-field">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            </div>

            <div class="message form-field">
                <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*"></textarea>
            </div>

            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

        </fieldset>
    </form> <!-- end form -->
  
</div>
<!-- END respond-->

</div> <!-- end comment-respond -->

</div> <!-- end comments-wrap -->

</section> <!-- end s-content -->

<div id="csrf">
    @csrf
</div>

<script>

    let reply = document.getElementsByClassName('reply');
    let replyform = document.getElementsByClassName('replyform');
    let token = document.getElementById('csrf').childNodes[1].value;
    
    
    for (let i = 0; i < reply.length; i++) {
       
       
        
        reply[i].addEventListener('click',(e) => {
            e.preventDefault();
            let getid = reply[i].childNodes[1].value;
            replyform[i].style.display = 'block';
            let form = replyform[i].childNodes[1];
          
            console.log(form);
            
            form.addEventListener('submit',(e) => {
                e.preventDefault();
                let name = document.getElementsByClassName('cName')[i].value;
                let message = document.getElementsByClassName('cMessage')[i].value;
                let email = document.getElementsByClassName('cEmail')[i].value;
               console.log(name,message,email);
               
                
                let url = "{{route('cfetch')}}";
                let data = new FormData;
                data.append('name',name);
                data.append('email',email);
                data.append('message',message);
                data.append('id',getid);

                fetch(url,{
                    headers: {

                     "X-CSRF-Token": token
                    },
                    method:'post',
                    body:data

                }).then((res) => res.json())
                .then((res) => {if (res) {
                    alert('We Have received your comment');
                    location.reload();
                }})
                .catch((error) => console.log(error))
                
            });
            
           
        
            
        });
        
        
    }

</script>

@endsection