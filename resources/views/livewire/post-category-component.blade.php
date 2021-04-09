@section('title')
    le blog d' Efka
@endsection
@section('meta')
    {{$lastpost->meta}}
@endsection

<div class="blog-container">

    <section id="lastpost">
        
    
        <div class="col-lg-12 relative">
            <a class="last-post" href="{{ route('blog.show', ['slug'=> $lastpost->slug]) }}">

                <h1 class="blog-h1 uppercase category-post-{{$postcategories_id}}">{{$postcategories_name}}</h1>

                <img class="img-fluid" src="{{asset($lastpost->image)}}" alt="{{$lastpost->alt}}" style="height: 800px" width="1920">
                @if ($lastpost->post_category_id === 1)
                <div class=" absolute last-aticle-title-content jaune-background">
                    <p class="last-article-announce">Dernier article</p>
                    <h2 class=" uppercase last-aticle-title">{{$lastpost->title}}</h2>
                </div>
                @elseif ($lastpost->post_category_id === 2)
                <div class=" absolute last-aticle-title-content rose-background">
                    <p class="last-article-announce">Dernier article</p>
                    <h2 class=" uppercase last-aticle-title">{{$lastpost->title}}</h2>
                </div>
                @elseif ($lastpost->post_category_id === 3)
                <div class=" absolute last-aticle-title-content orange-background">
                    <p class="last-article-announce">Dernier article</p>
                    <h2 class=" uppercase last-aticle-title">{{$lastpost->title}}</h2>
                </div>
                @elseif ($lastpost->post_category_id === 4)
                <div class=" absolute last-aticle-title-content vert-background">
                    <p class="last-article-announce">Dernier article</p>
                    <h2 class=" uppercase last-aticle-title">{{$lastpost->title}}</h2>
                </div>
                @endif
            </a>
        </div>
    </section>

    <div class="row articles-blog-content relative">
        <div class="col-lg-9 w-full">
            
            <section id="all-post">
                <div class="container">
                    <div class="col-lg-12">

                        
                        @if($category ?? '')
                            @if ($category->id === 1)
                            
                                <h3 class="jaune-background">{{$postcategories_name}}</h3>
                            @endif
                        @endif
                        <div class="row ">
                            @if ($posts ?? '')
                            @foreach ($posts as $post)
                            
                            <div class="col-lg-6 my-3">
                                @if ($post->post_category_id === 1)
                                <div class=" w-4/5 article-card card-jaune">
                                    <a href="{{ route('blog.show', ['slug'=> $post->slug]) }}">
                                        
                                        <div class="img-article-miniature" style="background: url('{{asset($post->image)}}')">
                                            <div class="hover-article-jaune">
                                                <p class="description-article-miniature">{{ Str::limit($post->content, 120, '') }}
                                                    @if (strlen($post->content) > 180)
                                                    <span id="dots-{{ $post->slug }}">[...]</span>
                                                    <span id="more-{{ $post->slug }}"style="display: none;">{{ substr($post->content, 180) }}</span>
                                                @endif</p>
                                            </div>
                                        </div>
                                        <!-- <img class="card-img-top" src="{{asset($post->image)}}" alt=""> -->
                                        <h4 class="article-title-miniature article-jaune">{{$post->title}}</h4>
                                    </a>            
                                </div>
                                @elseif ($post->post_category_id === 2)
                                <div class=" w-4/5 article-card card-rose">
                                    <a href="{{ route('blog.show', ['slug'=> $post->slug]) }}">
                                    <div class="img-article-miniature" style="background: url('{{asset($post->image)}}')">
                                            <div class="hover-article-rose">
                                            <p class="description-article-miniature">{{ Str::limit($post->content, 120, '') }}
                                                    @if (strlen($post->content) > 180)
                                                    <span id="dots-{{ $post->slug }}">[...]</span>
                                                    <span id="more-{{ $post->slug }}"style="display: none;">{{ substr($post->content, 180) }}</span>
                                                @endif</p>
                                            </div>
                                        </div>
                                        <h4 class="article-title-miniature article-rose">{{$post->title}}</h4>
                                    </a>            
                                </div>
                                @elseif ($post->post_category_id === 3)
                                <div class=" w-4/5 article-card card-orange">
                                    <a href="{{ route('blog.show', ['slug'=> $post->slug]) }}">
                                    <div class="img-article-miniature" style="background: url('{{asset($post->image)}}')">
                                            <div class="hover-article-orange">
                                            <p class="description-article-miniature">{{ Str::limit($post->content, 120, '') }}
                                                    @if (strlen($post->content) > 180)
                                                    <span id="dots-{{ $post->slug }}">[...]</span>
                                                    <span id="more-{{ $post->slug }}"style="display: none;">{{ substr($post->content, 180) }}</span>
                                                @endif</p>
                                            </div>
                                        </div>
                                        <h4 class="article-title-miniature article-orange">{{$post->title}}</h4>
                                    </a>            
                                </div>
                                @elseif ($post->post_category_id === 4)
                                <div class=" w-4/5 article-card card-vert">
                                    <a href="{{ route('blog.show', ['slug'=> $post->slug]) }}">
                                    <div class="img-article-miniature" style="background: url('{{asset($post->image)}}')">
                                            <div class="hover-article-vert">
                                            <p class="description-article-miniature">{{ Str::limit($post->content, 120, '') }}
                                                    @if (strlen($post->content) > 180)
                                                    <span id="dots-{{ $post->slug }}">[...]</span>
                                                    <span id="more-{{ $post->slug }}"style="display: none;">{{ substr($post->content, 180) }}</span>
                                                @endif</p>
                                            </div>
                                        </div>
                                        <h4 class="article-title-miniature article-vert">{{$post->title}}</h4>
                                    </a>            
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                </div>
                <div id="pagination" class="paginate">
                    {{ $posts->appends(request()->input())->links() }}
                </div>
                
                </div>
            </section>
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
                        @if ($postcategory ?? '')
                            <a href="{{route('blog')}}"><li class="px-3 py-3 categorie-li-all">Toutes les catégories <span class="badge ">{{$postsCount}}</span></li></a>
                            @foreach ($postcategory as $cat)
                                @if ($cat->id === 1)
                                <a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}"><li class="px-3 py-3 categorie-li-1">{{$cat->name}}<span class="badge jaune-background">{{$cat->posts->count()}}</span></li></a> 
                                @elseif ($cat->id === 2)
                                <a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}"><li class="px-3 py-3 categorie-li-2">{{$cat->name}} <span class="badge rose-background">{{$cat->posts->count()}}</span></li></a>
                                @elseif ($cat->id === 3)
                                <a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}"><li class="px-3 py-3 categorie-li-3">{{$cat->name}} <span class="badge orange-background">{{$cat->posts->count()}}</span></li></a>
                                @elseif ($cat->id === 4)
                                <a href="{{route('blog.category',['postcategory_slug'=>$cat->slug])}}"><li class="px-3 py-3 categorie-li-4">{{$cat->name}}<span class="badge vert-background">{{$cat->posts->count()}}</span></li></a> 
                                @endif
                            @endforeach
                        @endif
                        </ul>
                </section>
            </div>       
        </div>

    </div>

</div>

<script>
    $(function () {

        let current = $("span").attr("aria-current", "page")
            current.addClass("current-page-pagination")

    });

</script>