@extends('layouts.admin')

@section('admin.category.edit')

<!-- Page Content -->
<div class="content">
    <h3 class="text-center text-xl">créer une nouvelle categorie</h3>
    <!-- Quick Overview + Actions -->
    <div class="row-deck">
    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Info</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    @include('includes.errors')
                <form class="text-center" action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                    <div class="form-group">
                        <label for="name">modifier le nom de la catégorie </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="{{ $category->name }}">
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- END Info -->

<!-- Meta Data -->
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Meta Data</h3>
    </div>
    <div class="block-content">
        <h3 class="title">choisis une autre couleur pour ta catégorie </h3>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <label for="color">Modifie ta couleur</label>
                    <div id="element_color" class="js-colorpicker input-group js-colorpicker-enabled colorpicker-element" data-format="hex" data-colorpicker-id="4">
                        <input type="text" class="form-control" id="color" name="color" value="{{ $category->color }}">
                        <div class="input-group-append">
                            <span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0">
                                <i style="background: {{ $category->color }} none repeat scroll 0% 0%;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Meta Data -->

<!-- Media -->
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Images</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <label>Modifie l'image de ta catégorie</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="image" name="image" value="{{ asset($category->image) }}">
                    <label class="custom-file-label" for="image">choisis une autre image</label>
                    <div  id="filecontainer"></div>
                </div>
            </div>
            <div class="col-lg-4" id="preview">
            </div>
            <div class="col-md-2">
                <img src="{{ asset($category->image) }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- END Media -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Modifier cette catégorie</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 m-auto">
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Modifier la catégorie</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.3.0/css/bootstrap-colorpicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.3.0/js/bootstrap-colorpicker.min.js"></script>
<script>
$(function () {
    $('#element_color').colorpicker();
        let image_container = $('#filecontainer');
        
        $("#image").change(function () {
            filePreview(this);
        });
    });
    function trasher()
    {
        $('#preview').html("");
        $('#image').val("");
        $('#filecontainer').html("");
    }
    function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image + img').remove();
            $('#filecontainer').append('<span class="btn fa fa-trash" id="trash" onclick="trasher()"></span>');
            $('#preview').append('<img src="'+e.target.result+'" width="264" height="264"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
