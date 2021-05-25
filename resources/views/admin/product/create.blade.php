@extends('layouts.admin')

@section('admin.product.create')

<div class="content">
    <h3 class="text-center text-xl text-xsmooth-dark">Créer un produit</h3>
    <div class="row-deck">
        <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Détail du produit</h3>
        </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        @include('includes.errors')
                    <form class="text-center" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('includes.errors')
                        <div class="form-group">
                            <label for="category">Sélectionner la catégorie du produit</label>
                            <select name="category" id="category" class="custom-select custom-select-sm" required>
                                <option value=""selected style="display: none">Catégorie du produit</option>
                                @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-goup my-4">
                        <label for="name">Donner un nom à votre produit</label>
                        <input type="text" class="js-maxlength form-control  js-maxlength-enabled" id="name" name="name"  maxlength="100" data-placement="bottom" placeholder="Nom du produit" data-always-show="true" required>
                        <small class="form-text text-xplay">
                            255 Character Max
                        </small>
                    </div>
                    <div class="form-group my-4">
                        <label for="desc">Description du produit détailler</label>
                        <textarea type="text" id="desc" name="desc" class=" tiny js-maxlength form-control" placeholder="Décrit ton produit ici..." rows="20" data-always-show="true"></textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="meta">Ajouter une meta description qui apparaitra sur le moteur de recherche Google (SEO)</label>
                          <input type="text" class="js-maxlength form-control js-maxlength-enabled" id="meta" name="meta"  maxlength="150" data-always-show="true" data-placement="bottom" placeholder="métadescription du produit" data-always-show="true" required>              
                    </div>
                    <!-- prix et réduction -->
                    <div class="block block-rounded my-2">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Prix du produit</h3>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-euro-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control text-center" id="price" name="price" placeholder="10" required> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text">chiffres uniquement</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END price -->
                    <!-- stock -->
                    <div class="block block-rounded my-2">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Stock de départ du produit</h3>
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
                                                <input type="number" class="form-control text-center" id="stock" name="stock" placeholder="5" required> 
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
                                    <label>Choisi l'image principale de ton produit</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="main_image" name="main_image">
                                        <label class="custom-file-label" for="main_image">upload ton image ici</label>
                                        <div  id="filecontainer"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4" id="preview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Media -->
                            <button class="btn btn-hero-lg btn-rounded btn-hero-success mr-1 mb-3 mt-3" type="submit"><i class="si si-rocket mr-1"></i> Mettre en vente le produit</button>
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
