@extends('layouts.admin')

@section('admin.product.edit')

<div class="content">
    <h3 class="text-center text-xl text-xsmooth-dark">Modifier le produit {{ $product->name }}</h3>
    <div class="row-deck">
        <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Détail du produit</h3>
        </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        @include('includes.errors')
                    <form class="text-center" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @include('includes.errors')
                        <div class="form-group">
                            <label for="category">Modifier la catégorie du produit</label>
                            <select name="category" id="category" class="custom-select custom-select-sm">
                                <option value="{{ $product->category->id }}"selected style="display: none">{{ $product->category->name }}</option>
                                @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-goup my-4">
                        <label for="name">Modifier le nom de votre produit</label>
                        <input type="text" class="js-maxlength form-control  js-maxlength-enabled" value="{{ $product->name }}" id="name" name="name"  maxlength="150" data-placement="bottom" placeholder="Nom du produit" data-always-show="true">
                        <small class="form-text text-xplay">
                            255 Character Max
                        </small>
                    </div>
                    <div class="form-group my-4">
                        <label for="desc">Description du produit détailler</label>
                        <textarea type="text" id="desc" name="desc" class=" tiny js-maxlength form-control"value="{{ $product->desc }}" placeholder="{{ $product->desc }}" rows="20" data-always-show="true"></textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="meta">Ajouter une meta description qui apparaitra sur le moteur de recherche Google (SEO)</label>
                          <input type="text" class="js-maxlength form-control js-maxlength-enabled" id="meta" name="meta"value="{{ $product->meta }}"  maxlength="100" data-always-show="true" data-placement="bottom" placeholder="métadescription du produit" data-always-show="true">              
                    </div>
                    <!-- prix et réduction -->
                    <div class="block block-rounded my-2">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Change le prix du produit</h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                        <div class="form-group mb-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-euro-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control text-center" id="price" name="price" placeholder="10" value="{{ $product->price }}"> 
                                            </div>
                                        </div>
                                        <div class="form-group mt-2 mb-2">
                                                 <label for="price_promos">montant de la remise (en chiffre) <br> <small class="text-danger"> ou laisse à zéro si tu ne fait pas de remise</small></label>
                                                <input type="number"  name="price_promos" id="price_promos" value="{{ $product->price_promos}}" class="form-control text-center" placeholder="20 €"> 
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END price -->
                    <!-- stock -->
                    <div class="block block-rounded my-2">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Change le stock de ton produit</h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-weight-hanging"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control text-center" id="stock" name="stock" placeholder="5" value="{{ $product->stock }}"> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END stock -->
                    <!-- Media -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Images</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6">
                                    <label>Modifie l'image principale de ton produit</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="main_image" name="main_image">
                                        <label class="custom-file-label" for="main_image">upload ton image ici</label>
                                        <div  id="filecontainer"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4" id="preview">
                                </div>
                                <div class="col-md-2">
                                    <span class="x-play">image actuelle</span>
                                    <img src="{{ asset($product->main_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Media -->
                            <button class="btn btn-hero-lg btn-rounded btn-hero-success mr-1 mb-3 mt-3" type="submit"><i class="si si-rocket mr-1"></i> Modifier le produit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function () {
        let image_container = $('#filecontainer');
        
        $("#main_image").change(function () {
            filePreview(this);
        });
    });
    function trasher()
    {
        $('#preview').html("");
        $('#main_image').val("");
        $('#filecontainer').html("");
    }
    function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main_image + img').remove();
            $('#filecontainer').append('<span class="btn fas fa-trash" id="trash" onclick="trasher()"></span>');
            $('#preview').append('<img src="'+e.target.result+'" width="450" height="300"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
