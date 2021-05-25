@extends('layouts.admin')

@section('admin.header.edit')

<!-- Page Content -->
<div class="content">
    <h3 class="text-center text-xl">Modifier ce header</h3>
    <!-- Quick Overview + Actions -->
    <div class="row-deck">
    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">détail</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    @include('includes.errors')
                <form class="text-center" action="{{ route('header.update',$header->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                <div class="form-group">
                    <label for="tiltle">Titres actuel du  header <small class="text-xplay"> max 15 caractères espace compris</small></label>
                    <input type="text" class="js-maxlength form-control" maxlength="15" data-always-show="true" data-placement="top" id="title" name="title" placeholder="titre" value="{{ $header->title }}">
                </div>
                <div class="form-group">
                    <label for="subtitle">Sous titre actuel <small class="text-xplay"> max 15 caractères espace compris</small></label>
                    <input type="text" class="js-maxlength form-control" id="subtitle" name="subtitle"  maxlength="15" data-always-show="true" data-placement="top" placeholder="sous titre" value="{{ $header->subtitle }}" >
                </div>
                <div class="form-group">
                <label for="dm-ecom-product-meta-title">Image description (ALT)</label>
                <input type="text" class="js-maxlength form-control" id="alt" name="alt"  maxlength="55" data-always-show="true" data-placement="top" placeholder="decrire l'image" value="{{ $header->alt }}">
                <small class="form-text text-xplay">
                    55 Character Max
                </small>
                </div>
                <div class="form-group">
                    <label>Modifie l'image de ton header <small class="text-xplay">dimension conseiller 1920 X 750 px</small></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="banner" name="banner">
                        <label class="custom-file-label" for="banner">modifie ton image</label>
                        <div  id="filecontainer"></div>
                    </div>
                </div>
                 <div class="row row-deck">
                            <!-- Story #15 -->
                        <div class="col-lg-6">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <img class="img-fluid" id="current_img" src="{{ asset($header->banner) }}" alt="">
                                <div class="block-content">
                                    <h4 class="mb-1">image actuel</h4>
                                    <p class="font-size-sm">
                                        <span class="text-primary" id="current-txt">Barbara Scott</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6" id="preview">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
         
                                <div class="block-content">
                                    <h4 class="mb-1">nouvelle image</h4>
                                    <p class="font-size-sm">
                                        <span class="text-primary" id="current-txt">nouvelle image</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-auto text-center mt-5">
                        <button class="btn btn-outline-success" type="submit"><span class="fas fa-pen pr-2"></span>Modifier le header</button>
                    </div>
                </form>
                 </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
        $(function () {
        let banner_container = $('#filecontainer');
        let current_txt = $('#current-txt');
        let current_img = document.getElementById('current_img');

        setTimeout(() => {
            let currsizeW = current_img.naturalWidth;
            let currsizeH = current_img.naturalHeight;
            displaysize(currsizeW,currsizeH);
        }, 1000);

        $('#banner').val("");
        $("#banner").change(function () {

            filePreview(this);
        });


    });
        function displaysize(largeur,hauteur)
        {
            $("#current-txt").text("").text(largeur+' X '+hauteur);
        }
    function trash()
    {
        $('#banner').val("");
        $('#preview').html("");
       

    }
    function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {

            $('#preview').html("").append('<a class="block block-rounded block-link-pop" href="javascript:void(0)"><img class="img-fluid" id="img-prev" src="'+e.target.result+'"/><div class="block-content"><p class="font-size-sm">nouvelle image</p><span class="fa fa-trash-alt text-xplay" id="trash" onclick="trash();"></span></div></a>');
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
    $('#trash').append('<p class="title">'+sizeW+' X '+sizeH);
}

</script>
@endsection
