@extends('front.layouts.master')

@section('content')

<section class="s-featured">
<div class="row">
<div class="col-full">

    <div class="featured-slider featured" data-aos="zoom-in">

        @foreach ($slides as $slide)
            
       
        <div class="featured__slide">
            <div class="entry">

            <div class="entry__background" style="background-image:url('{{asset('images/'.$slide->img)}}');"></div>
                
                <div class="entry__content">
                <span class="entry__category"><a href="{{route('category',$slide->category->slug)}}">Music</a></span>

                <h1><a href="{{route('single',[$slide->category->slug,$slide->slug])}}" title="">What Your Music Preference Says About You and Your Personality.</a></h1>

                    <div class="entry__info">
                        <a href="#0" class="entry__profile-pic">
                            <img class="avatar" src="images/avatars/user-05.jpg" alt="">
                        </a>
                        <ul class="entry__meta">
                            <li><a href="#0">Jonathan Smith</a></li>
                            <li>June 02, 2018</li>
                        </ul>
                    </div>
                </div> <!-- end entry__content -->
                
            </div> <!-- end entry -->
        </div> <!-- end featured__slide -->

        @endforeach
    </div> <!-- end featured -->

</div> <!-- end col-full -->
</div>
</section> <!-- end s-featured -->


<!-- s-content
================================================== -->
<section class="s-content">

<div class="row entries-wrap wide">
<div class="entries">

    @foreach ($posts as $post)
        
    
    <article class="col-block">
        
        <div class="item-entry" data-aos="zoom-in">
            <div class="item-entry__thumb">
                <a href="{{route('single',[$post->category->slug,$post->slug])}}" class="item-entry__thumb-link">
                <img src="{{asset('images/'.$post->img)}}" 
                            alt="">
                </a>
            </div>

            <div class="item-entry__text">    
                <div class="item-entry__cat">
                <a href="{{route('category',$post->category->slug)}}"> {{$post->category->name}} </a> 
                </div>

                <h1 class="item-entry__title"><a href="{{route('single',[$post->category->slug,$post->slug])}}">{{$post->title}}</a></h1>
                    
                <div class="item-entry__date">
                    <a href="{{route('single',[$post->category->slug,$post->slug])}}">{{$post->created_at}}</a>
                </div>
            </div>
        </div> <!-- item-entry -->

    </article> <!-- end article -->
    @endforeach
</div> <!-- end entries -->
</div> <!-- end entries-wrap -->

<div class="row pagination-wrap">
<div class="col-full">
    <nav class="pgn" data-aos="fade-up">
        <ul>
           {{ $posts->links() }}
        </ul>
    </nav>
</div>
</div>

</section> 
@endsection