 @extends('layouts.admin')
 @section('admin.header.create')
                <!-- Page Content -->
                <div class="content">
                    <h3 class="text-center text-xl">Créer un header</h3>
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
                                    <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="form-group">
                                            <label for="tiltle">Titres pour le header <small class="text-xplay"> max 15 caractères espace compris</small></label>
                                            <input type="text" class="js-maxlength form-control" maxlength="15" data-always-show="true" data-placement="top" id="title" name="title" placeholder="petite phrase d'accroche" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="subtitle">Sous titres <small class="text-xplay"> max 15 caractères espace compris</small></label>
                                            <input type="text" class="js-maxlength form-control" id="subtitle" name="subtitle"  maxlength="15" data-always-show="true" data-placement="top" placeholder="petit sous titres" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dm-ecom-product-meta-title">Image description (ALT)</label>
                                            <input type="text" class="js-maxlength form-control" id="alt" name="alt"  maxlength="55" data-always-show="true" data-placement="top" placeholder="une belle image" required>
                                            <small class="form-text text-muted">
                                                55 Character Max
                                            </small>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Info -->
                    <!-- Media -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Images</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6">
                                    <label>Choisi l'image de ton header <small class="text-xplay">dimension conseiller 1920 X 750 px</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="banner" name="banner">
                                        <label class="custom-file-label" for="banner">choisis ton image</label>
                                        <div  id="filecontainer"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4" id="preview">
                                </div>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary">Créer cet header</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Media -->
                    </div>
                </div>
            </div>
    <!-- END Page Content -->
<script>
    $(function () {
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