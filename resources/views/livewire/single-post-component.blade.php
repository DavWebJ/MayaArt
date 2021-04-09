@section('title')
    {{$post->slug}}
@endsection
@section('meta')
{{$post->meta}}
@endsection

<div class="blog-container">

    <div class="col-lg-12 relative">
        @if ($post ?? '')
            <img class="img-fluid image-article" src="{{asset($post->image)}}" alt="{{$post->alt}}" style="" width="1920">
                <div class="row article-information-container">
                    <div class=" col-sm-6 card-footer article-information-footer">
                            <div class="article-information">
                                <span class="px-2 text-muted">Écrit par {{$author->prenom}} </span>
                                <small class="px-2 text-muted">{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</small>
                            </div>
                    </div>
                    @if ($post->post_category_id === 1)
                    <div class=" col-sm-6 absolute last-aticle-title-content px-2 article-solo-title-container jaune-background">
                        
                        <h2 class=" uppercase last-aticle-title article-solo-title">{{$post->title}}</h2>
                    </div>
                    @elseif ($post->post_category_id === 2)
                    <div class=" col-sm-6 absolute last-aticle-title-content article-solo-title-container rose-background">
                        
                        <h2 class=" col-sm-6 uppercase last-aticle-title article-solo-title">{{$post->title}}</h2>
                    </div>
                    @elseif ($post->post_category_id === 3)
                    <div class=" col-sm-6 absolute last-aticle-title-content article-solo-title-container orange-background">
                        
                        <h2 class=" uppercase last-aticle-title article-solo-title">{{$post->title}}</h2>
                    </div>
                    @elseif ($post->post_category_id === 4)
                    <div class=" col-sm-6 absolute last-aticle-title-content article-solo-title-container vert-background">
                        
                        <h2 class=" col-sm-6 uppercase last-aticle-title article-solo-title">{{$post->title}}</h2>
                    </div>
                    @endif
                </div>
                <div class=" col-sm-6 card-footer article-information-footer-mobile">
                            <div class="article-information">
                                <span class="px-2 text-muted">Écrit par {{$author->prenom}} </span>
                                <small class="px-2 text-muted">{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</small>
                            </div>
                            
                    </div>
    </div>

    
    <div class="row articles-blog-content relative">
        <div class="col-lg-9 w-full">
            <section id="post-content">
                <div class="article-container"> 
                    {!! $post->content !!}
                </div>
            </section>
        @else
        <h4>Cet article n'est plus disponible</h4>
        @endif
        </div>
        <div class="col-lg-3 ">
            <div class="">
                <section class="newsletter-blog">
                <h3 class="newsletter-blog-title">Newsletter</h3>
                    <form class="grid" action="{{route('subscribe')}}" method="post">
                        @csrf
                        @method('post')
                        
                        <input class=" newsletter-blog-input" type="email" name="email" id="email" placeholder="EMAIL">
                        
                        <input class=" newsletter-blog-input" type="nom" name="nom" id="nom" placeholder="PRENOM NOM">
                        <button class="button-newsletter-blog" type="submit" class="btn bg-gray-700 text-white"> S'inscrire</button>
                    </form>
                </section>

                <div class="flex  my-8 justify-around">
                    <i class="header-social-icon-blog text-4xl fab fa-facebook-square"></i>
                    <i class="header-social-icon-blog text-4xl fab fa-instagram-square"></i>
                </div>

                <section id="post-cat">
                        <div class="jaune-background w-full"><h3 class="newsletter-catergory-title">Catégories</h3></div>
                        <ul class=" categories-list">
                        @if ($category ?? '')
                            <li class="px-3 py-3 categorie-li-all"><a href="{{route('blog')}}">Toutes les catégories</a> <span class="badge ">{{$postsCount}}</span></li>
                            @foreach ($category as $cat)
                                @if ($cat->id === 1)
                                <li class="px-3 py-3 categorie-li-1"><a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}">{{$cat->name}}</a> <span class="badge jaune-background">{{$cat->posts->count()}}</span></li>
                                @elseif ($cat->id === 2)
                                <li class="px-3 py-3 categorie-li-2"><a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}">{{$cat->name}}</a> <span class="badge rose-background">{{$cat->posts->count()}}</span></li>
                                @elseif ($cat->id === 3)
                                <li class="px-3 py-3 categorie-li-3"><a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}">{{$cat->name}}</a> <span class="badge orange-background">{{$cat->posts->count()}}</span></li>
                                @elseif ($cat->id === 4)
                                <li class="px-3 py-3 categorie-li-4"><a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}">{{$cat->name}}</a> <span class="badge vert-background">{{$cat->posts->count()}}</span></li>
                                @endif
                            @endforeach
                        @endif
                        </ul>
                </section>

                <div class="orange-background w-full my-3 blog-return"><a href="{{route('blog')}}" class="newsletter-catergory-title"> Retour au blog</a></div>

            </div>       
        </div>

    </div>

</div>

<section id="otherposts" class="">
    <h3 class="otherposts-titles">Autres Articles :</h3>
        <div class="row ">
            <div class="col-lg-12 col-sm-12 ">
                <div class="row justify-between">
                @if ($otherposts ?? '')
                @foreach ($otherposts as $otherpost)
                        
                    @if ($otherpost->post_category_id === 1)
                    <div class="col-lg-2 col-sm-5 article-card other-post-jaune-container">
                        <a href="{{ route('blog.show', ['slug'=> $otherpost->slug]) }}">
                            <div class="other-post-miniature">
                                <div class="other-post-miniature-img" style="background: url('{{asset($post->image)}}')">
                                </div>
                                <div class="other-post-jaune">
                                    {{$otherpost->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @elseif ($otherpost->post_category_id === 2)
                    <div class="col-lg-2 col-sm-5 article-card other-post-rose-container">
                        <a href="{{ route('blog.show', ['slug'=> $otherpost->slug]) }}">
                            <div class="other-post-miniature">
                                <div class="other-post-miniature-img" style="background: url('{{asset($post->image)}}')">
                                </div>                  
                                <div class="other-post-rose">
                                    {{$otherpost->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @elseif ($otherpost->post_category_id === 3)
                    <div class="col-lg-2 col-sm-5 article-card other-post-orange-container">
                        <a href="{{ route('blog.show', ['slug'=> $otherpost->slug]) }}">
                            <div class="other-post-miniature">
                                <div class="other-post-miniature-img" style="background: url('{{asset($post->image)}}')">
                                </div>                           
                                <div class="other-post-orange">
                                    {{$otherpost->title}}
                                </div>                                                      
                            </div>
                        </a>
                    </div>
                    @elseif ($otherpost->post_category_id === 4)
                    <div class="col-lg-2 col-sm-5 article-card other-post-vert-container">
                        <a href="{{ route('blog.show', ['slug'=> $otherpost->slug]) }}">
                            <div class="other-post-miniature">
                                <div class="other-post-miniature-img" style="background: url('{{asset($post->image)}}')">
                                </div> 
                                <div class="other-post-vert">
                                    {{$otherpost->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif 
                @endforeach
                @else
                <p>Pas d'autres articles </p>
                @endif

                </div>
            </div>
                

        </div>
</section>
