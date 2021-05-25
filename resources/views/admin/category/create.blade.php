@extends('layouts.admin')

@section('admin.category.create')

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
                <form class="text-center" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">choisis le nom de ta catégorie </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="titre de la catégorie" required>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- END Info -->

<!-- Meta Data -->
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Meta data</h3>
    </div>
    <div class="block-content">
        <h3 class="title">Couleur de catégorie </h3>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
            <label for="color">Choisis une couleur pour ta catégorie</label>
            <div id="element_color" class="js-colorpicker input-group js-colorpicker-enabled colorpicker-element" data-format="hex" data-colorpicker-id="4">
                <input type="text" class="form-control" id="color" name="color" value="" placeholder="clique sur le petit carré de couleur">
                <div class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0">
                        <i style="background: rgb(6, 101, 208) none repeat scroll 0% 0%;"></i>
                    </span>
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
            <div class="col-md-8 col-lg-8">
                <label>Choisis l'image qui reprèsentera ta catégorie <i class="fas fa-exclamation text-xplay mx-2"></i><span class="text-xplay">dimension conseiller  (taille 264px X 264px)</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">choisis ton image</label>
                    <div  id="filecontainer"></div>
                </div>
            </div>
            <div class="col-lg-4" id="preview">
            </div>
        </div>
    </div>
</div>
<!-- END Media -->
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 m-auto">
                        <div class="form-group row">
                            <button type="submit" class="btn btn-alt-primary m-auto">Créer cette catégorie</button>
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
            $('#filecontainer').append('<span class="btn fa fa-trash-alt" id="trash" onclick="trasher()"></span>');
            $('#preview').append('<img src="'+e.target.result+'" width="264" height="264"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
