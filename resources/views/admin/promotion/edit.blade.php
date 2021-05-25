@extends('layouts.admin')

@section('admin.promotion.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('promotion.index') }}">Liste des promotions</a></li>
                        <li class="breadcrumb-item active">Modifier cette promotion</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('promotion.update',$promotion->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6 my-4">
                            <div class="custom-file" id="file">
                                <input type="file" class="custom-file-input" name="banner" id="banner" lang="fr"  onchange="return fileValidation() ">
                                <label class="custom-file-label" for="banner">Sélectionner une nouvelle image</label>
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div class="col-6 flex my-4">
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($promotion->banner) }}" class="img-fluid" alt="">
                            </div>
                            <div id="imagePreview" class="col-lg-2"></div> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end">Modifie la date à laquelle ta promos prendra fin</label>
                        <input type="text" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active date" id="end" name="end" placeholder="{{ $promotion->end }}" value="{{ $promotion->end }}" readonly="readonly">
                    </div> 

                    <label for="alt" class="label">Ajouter une description pour l'image (ALT)</label>
                    <input type="text" id="alt" name="alt" value="{{ $promotion->alt}}" class="form-control my-2" placeholder="description de l'image">
                    <div class="my-2"></div>

                    <label for="title">Modifiez la phrase d'accroche de ta promotion</label>
                    <input type="text" id="title" name="title" value="{{ $promotion->title }}" class="form-control my-2" placeholder="">

                    <hr class="hr-light">
                    <label for="content">Modifier la description du produit</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-2" placeholder="{{ $promotion->desc }}">{{ $promotion->desc }}</textarea>

                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Modifier la promotion</button>
                    </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
                $('#banner').val("");
                $('#alert').html("");
            });
         function fileValidation() { 
            var fileInput =  document.getElementById('banner'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">Ceci n"est pas une image valide, seul les images aux extensions (gif, png, jpeg et jpg) sont autorisées. Merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview').innerHTML ="";
                return false; 
            }  
            else  
            { 
               alert.innerHTML = "";
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 

                
        }
    </script>
@endsection
