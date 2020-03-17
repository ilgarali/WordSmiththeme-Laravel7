
<section class="s-extra">

    <div class="row">

        <div class="col-seven md-six tab-full popular">
            <h3>Popular Posts</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @foreach ($pposts as $ppost)
                    
          
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                    <img src="{{asset('images/'.$ppost->img)}}" class="img-fluid" alt="">
                    </a>
                <h5>{{$ppost->title}}</h5>
                    <section class="popular__meta">
                        <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                    <span class="popular__date"><span>on</span> <time datetime="2018-06-14">{{$ppost->created_at}}</time></span>
                    </section>
                </article>
                @endforeach
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full end">
            <div class="row">
                <div class="col-six md-six mob-full categories">
                    <h3>Categories</h3>
    
                    <ul class="linklist">
                        @foreach ($categories as $category)
                        <li><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                    </ul>
                </div> <!-- end categories -->
    
                <div class="col-six md-six mob-full sitelinks">
                    <h3>Site Links</h3>
    
                    <ul class="linklist">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">Styles</a></li>
                        <li><a href="#0">About</a></li>
                        <li><a href="#0">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>
                </div> <!-- end sitelinks -->
            </div>
        </div>
    </div> <!-- end row -->

</section> <!-- end s-extra -->


<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">
            
            <div class="col-six tab-full s-footer__about">
                    
                <h4>About Wordsmith</h4>

                <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at. 
                Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error 
                temporibus magnam est voluptatem.</p>

            </div> <!-- end s-footer__about -->

            <div class="col-six tab-full s-footer__subscribe">
                    
                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
            
                        <input type="submit" name="subscribe" value="Send">
            
                        <label for="mc-email" class="subscribe-message"></label>
            
                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">

            <div class="col-six">
                <ul class="footer-social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-six">
                <div class="s-footer__copyright">
                    <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                </div>
            </div>
            
        </div>
    </div> <!-- end s-footer__bottom -->

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

</footer> <!-- end s-footer -->


<!-- Java Script
================================================== -->

<script>

let sform = document.getElementById('sform');
sform.addEventListener('submit',(e) => {
    e.preventDefault();
    let search = document.getElementById('search').value;
    let url = "{{route('search')}}";
    
    
    let token = document.getElementById('token').childNodes[0].value;
    
    let data = new FormData();
    data.append('search',search);
    fetch(url,{
        headers: {
     "X-CSRF-TOKEN": token
    },
    method:'post',
    body:data

    }).then((res) => res.json())
    .then((res) => find(res))
    .catch((error) => console.log(error))

    function find(res) {
        let entries = document.querySelectorAll('.entries');
            for (let i = 0; i < entries.length; i++) {
                entries[i].innerHTML ="";
                
            }
            


        res.forEach(element => {
            let d=0;
            let title = element.title;
            let id = element.id;
            let img = element.img;
            let created_at= element.created_at;
             entries[d].innerHTML =`
            <article class="col-block">
        
        <div class="item-entry" data-aos="zoom-in">
            <div class="item-entry__thumb">
                <a href="single.php?single=${id}" class="item-entry__thumb-link">
                    <img src="back/img/${img}" 
                           alt="">
                </a>
            </div>
   
            <div class="item-entry__text">    
                <div class="item-entry__cat">
                    <a href="category.html"></a> 
                </div>
                <h1 class="item-entry__title"><a href="single.php?single=${id}">${title}</a></h1>
                    
                <div class="item-entry__date">
                    <a href="single.php?single=${id}">${created_at}</a>
                </div>
            </div>
        </div> <!-- item-entry -->
    </article> <!-- end article -->
            
            `
            d++;
        });
      }
    
    
});


</script>

<script src="{{asset('front/')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('front/')}}/js/plugins.js"></script>
<script src="{{asset('front/')}}/js/main.js"></script>

</body>

</html>