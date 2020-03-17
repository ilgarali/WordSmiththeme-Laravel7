@extends('front.layouts.master')

@section('content')

<section class="s-content s-content--top-padding">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
        <h1 class="display-1 display-1--with-line-sep">{{$category->name}}</h1>
 </div>
    </div>
    
    <div class="row entries-wrap add-top-padding wide">
        <div class="entries">
            @if ($posts->count() < 1)
            <div style="margin:0 auto;">
                <h1 style="color:rebeccapurple">There Is No Post Avaibale</h1>
             </div>

            @endif
            @foreach ($posts as $post)
            <article class="col-block">
                
                <div class="item-entry" data-aos="zoom-in">
                    <div class="item-entry__thumb">
                        <a href="{{route('single',[$post->category->slug,$post->slug])}}" class="item-entry__thumb-link">
                        <img src="{{$post->img}}" 
                                    alt="">
                        </a>
                    </div>
    
                    <div class="item-entry__text">
                        <div class="item-entry__cat">
                        <a href="{{route('category',$post->category->slug)}}">{{$post->category->name}}</a> 
                        </div>

                        <h1 class="item-entry__title">
                            <a href="{{route('single',[$post->category->slug,$post->slug])}}">
                                {{$post->title}}</a></h1>
                            
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
               {{ $posts->links() }}
            </nav>
        </div>
    </div>

</section> <!-- end s-content -->



@endsection