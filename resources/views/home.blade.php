@extends('layouts.app')
@section('title')
    L'atelier d'Efka
@endsection
@section('meta')
l' atelier d' Efka
@endsection
@section('home')
<section id="promotion">
    <div class="row first-container-home" >
    @if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    @endif
        <div class=" relative col-lg-8 col-md-12 col-sm-12 home-image" style="background: url('{{asset($promos->banner)}}'); background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;">
            <div class="absolute promotion-home-text"><p class="font-bold ">Livraison offerte à partir de 50 € d’achat </p></div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 title-promotion-content">
            <h1 class="home-h1 leading-tight font-bold  ">
            {{ $promos->title }}
            </h1>
            <div class="icon-home-container">
                <div class="icon-home">
                    <i class="header-social-icon text-4xl fab fa-facebook-square"></i>
                    <i class="header-social-icon text-4xl fab fa-instagram-square"></i>
                </div>
            </div>
            <div class="promo-description-home-container">
                <p class="promo-description-home">{{$promos->desc}}</p>
            </div>
            
        </div>
    </div>
    <!-- -------------------------------------------------------------mobile -->
    <p class="promo-description-home-mobile">{{$promos->desc}}</p>
    <!-- ------------------------------------------------------------- -->
</section>
<section id="cat" class="w-100">

    <div class="flex justify-center">
    @if ($products_cat )
        @foreach ($categories as $cat)
        @if ($cat->id == 1)
        <div class=" w-48 my-4 vert-background">
            <div class="card-title text-center">
                <span>{{$cat->name}}</span>
            </div>
            @foreach ($cat->products as $product)
            <div class="">
                <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
            </div>
            @endforeach
            <a href="{{ route('shop.show',['slug' => $product->slug]) }}"> En savoir + </a>
        </div>
        @elseif ($cat->id == 2)
        <div class=" w-48 my-4 rose-background">
            <div class="card-title text-center">
                <span>{{$cat->name}}</span>
            </div>
            @foreach ($cat->products as $product)
            <div class="">
                <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
            </div>
            @endforeach
        </div>
        @elseif ($cat->id == 3)
        <div class=" w-48 my-4 orange-background">
            <div class="card-title text-center">
                <span>{{$cat->name}}</span>
            </div>
            @foreach ($cat->products as $product)
            <div class="">
                <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
            </div>
            @endforeach
        </div>
        @elseif ($cat->id == 4)
        <div class=" w-48 my-4 jaune-background">
            <div class="card-title text-center">
                <span>{{$cat->name}}</span>
            </div>
            @foreach ($cat->products as $product)
            <div class="">
                <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
            </div>
            @endforeach
        </div>
        @endif
    @endforeach
    @else
    <span>pas de categories pour le moment</span>
    @endif
    </div>

<!-- <div class="grille-categorie categorie-content">
    @if ($products_cat )
        @foreach ($categories as $cat)
            @if ($cat->category_id === 1)
                <div class="grid-item-categorie categorie-card ">
                    <div class="classWithPad vert-background">
                        <h3 class="categorie-card-title text-center uppercase playfair">>{{$cat->name}}</h3>
                        <ul class="categorie-card-list">
                        @foreach ($cat->products as $product)
                            <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
                        @endforeach
                        </ul>
                    </div> 
                </div>
            @elseif ($cat->category_id === 2)
                <div class="grid-item-categorie categorie-card ">
                    <div class="classWithPad rose-background">
                        <h3 class="categorie-card-title text-center uppercase playfair">>{{$cat->name}}</h3>
                        <ul class="categorie-card-list">
                        @foreach ($cat->products as $product)
                            <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>    
                </div>
            @elseif ($cat->category_id === 3)
                <div class=" grid-item-categorie categorie-card ">
                    <div class="classWithPad orange-background">
                        <h3 class="categorie-card-title text-center uppercase playfair">>{{$cat->name}}</h3>
                        <ul class="categorie-card-list">
                        @foreach ($cat->products as $product)
                            <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @elseif ($cat->category_id === 4)
                <div class="grid-item-categorie categorie-card ">
                    <div class="classWithPad jaune-background">
                        <h3 class="categorie-card-title text-center uppercase playfair">>{{$cat->name}}</h3>
                        <ul class="categorie-card-list">
                        @foreach ($cat->products as $product)
                                <li><a href="{{ route('shop.show',['slug' => $product->slug]) }}">{{$product->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    @else
    <span>pas de categories pour le moment</span>
    @endif
</div> -->

</section>
<section id="valeur">
    <div class="">
        <h2 class="text-center font-bold uppercase valeur-titre">Mes valeurs</h3>
        <div class=" valeur-grille" >

            <div class="">
                <div class="">
                    <img class="valeur-img" src="{{asset('img/valeur1.svg')}}" alt="">
                    <h3 class="text-center valeur uppercase">Eco-responsable</h3>
                    <p class="text-center w-4/5 valeur-description my-2">L'entreprise est pensée pour limiter son impact environnemental (produits, site internet...) </p>
                </div>
            </div>
            
            <div class="">
                <div class="">
                    <img class="valeur-img" src="{{asset('img/valeur2.svg')}}" alt="">
                    <h3 class="text-center valeur uppercase">Artisanat local</h3>
                    <p class="text-center w-4/5 valeur-description my-2">Tout est fabriqué par mes petites mains dans mon atelier, dans les Ardennes.</p>
                </div>
            </div>

            <div class="">
                <div class="">
                    <img class="valeur-img" src="{{asset('img/valeur3.svg')}}" alt="">
                    <h3 class="text-center valeur uppercase">Entraide</h3>
                    <p class="text-center w-4/5 valeur-description my-2">Pour que mes compétences en couture puissent servir à d'autres !</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="posts">
    <h2 class="text-center valeur-titre uppercase font-bold">Blog</h2>
    <div class="">
        
            <div class=" justify-center row my-6">
            @if ($posts->count() > 1)
                    @foreach ($posts as $post)
                    <div class="col-lg-5 col-md-4 col-sm-12 blog-card hover:shadow-xl">
                        <a href="{{ route('blog.show',['slug' => $post->slug]) }}">
                                <div>
                                    @if ($post->post_category_id === 1)
                                        <img class=" blog-img-jaune w-full h-45 object-cover" src="{{asset($post->image)}}" alt="{{$post->alt}}">
                                    @elseif ($post->post_category_id === 2)
                                        <img class=" blog-img-rose w-full h-45 object-cover" src="{{asset($post->image)}}" alt="{{$post->alt}}">
                                    @elseif ($post->post_category_id === 3)
                                        <img class=" blog-img-orange w-full h-45 object-cover" src="{{asset($post->image)}}" alt="{{$post->alt}}">
                                    @elseif ($post->post_category_id === 4)
                                        <img class=" blog-img-vert w-full h-45 object-cover" src="{{asset($post->image)}}" alt="{{$post->alt}}">
                                    @endif
                                </div>
                                
                                <div class="px-3">
                                    <div class="">
                                        <h3 class=" mt-3 blog-article-title font-bold">{{$post->title}}</h3>
                                    </div>
                                    <div class="mb-1">
                                        <small class=" date-article text-muted">{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </a>
                    </div>
                    @endforeach
                @else
                <p>Pas d'article pour le moment</p>
                @endif
            </div>   
    </div>
    
</section>
<section id="newsletter-home">
    <div class="">
        <h2 class=" pt-4 valeur-titre uppercase font-bold">newsletter</h2>
        <form class=" py-2 text-center" action="{{route('subscribe')}}" method="post">
            @csrf
            @method('post')
            <input class="newsletter-input" type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required>
            <input class="newsletter-input" type="text" name="name" id="name" placeholder="Votre Nom" required>
            <input class="newsletter-input" type="email" name="email" id="email" placeholder="Email" required>
            
            <button type="submit" class=" submit-newsletter text-black"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</section>
@endsection        


