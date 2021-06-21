@extends('layouts.admin')

@section('admin.promotion.edit')

 <!-- Page Content -->
                <div class="content">
                    <h3 class="text-center text-xl">Créer une promotion</h3>
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
                                    <form action="{{ route('promotion.update',$promotion->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label>Quel Produit ?</label>
                                            <select class="custom-select" id="product_id" name="product_id" >
                                                <option value="{{ $promotion->product->id }}" selected style="display: none;">{{ $promotion->product->name }}</option>
                                                @foreach ($product as $prod)
                                                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tiltle">Modifie ta phrase d'accroche pour ta promotion</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="titre de la promotion" value="{{ $promotion->title }}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Décrit ton produit pour donner envie de l'acheter</label>
                                            <textarea class="form-control tiny" id="desc" name="desc" rows="4" value="{{ $promotion->desc }}"  >{{ $promotion->desc }}</textarea>
                                        </div>
                                            <div class="form-group">
                                                <label for="end">Choisis la date à laquelle ta promos prendra fin</label>
                                                <input type="text" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active date" id="end" name="end" placeholder="{{ $promotion->end }}"  readonly="readonly">
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
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                        <div class="form-group">
                                            <!-- Bootstrap Maxlength (.js-maxlength class is initialized in Helpers.maxlength()) -->
                                            <!-- For more info and examples you can check out https://github.com/mimo84/bootstrap-maxlength -->
                                            <label for="dm-ecom-product-meta-title">Décrit en 2 mots ton image (ALT)</label>
                                            <input type="text" class="js-maxlength form-control" id="alt" name="alt"  maxlength="55" data-always-show="true" data-placement="top" placeholder="une belle image" value="{{ $promotion->alt }}">
                                            <small class="form-text text-muted">
                                                55 Character Max
                                            </small>
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
                                    <label>Choisi l'image pour ta promotion <i class="fas fa-exclamation text-xplay mx-2"></i> <small class="text-xplay">dimension conseiller L:1920px / H:750 px</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="banner" name="banner">
                                        <label class="custom-file-label" for="banner">choisis ton image</label>
                                        <div  id="filecontainer"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4" id="preview">
                                </div>
                                <div class="col-md-2">
                                    <span class="x-play">image actuelle</span>
                                    <img src="{{ asset($promotion->banner) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Media -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">étape finale</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-8 m-auto">
                                    <div class="form-group row justify-content-center">
                                        <button type="submit" class="btn btn-alt-primary">Modifier cette promotion</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- END Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/l10n/fr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css"  />
<script>
    $(function () {
        $(".date").flatpickr(
            {
                inline: true,
                "locale": "fr"
            }
        );
        let banner_container = $('#filecontainer');
        $('#banner').val("");
        $("#banner").change(function () {

            filePreview(this);
        });
    });

    function trash()
    {
        $('#banner').val("");
        $('#preview').html("");
       

    }
    function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {

            $('#preview').html("").append('<img id="img-prev" src="'+e.target.result+'" width="100%" height="auto"/>');
            let ImageOriginal = document.getElementById('img-prev');
            GetImgSize(ImageOriginal);
        };
        reader.readAsDataURL(input.files[0]);

    }
}
function GetImgSize(img)
{

   let sizeW = img.naturalWidth;
   let sizeH = img.naturalHeight;
    $('#preview').append('<p class="row justify-between px-8">'+sizeW+' X '+sizeH+'<button class="fa fa-trash-alt text-xplay" id="trash" onclick="trash();"></button></p>');
}


</script>

@endsection
