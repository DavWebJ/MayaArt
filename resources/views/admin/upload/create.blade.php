@extends('layouts.admin')

@section('admin.post')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('upload.index') }}">Liste des images</a></li>
                        <li class="breadcrumb-item active">Uploader une nouvelle image</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation()" required>
                      <label class="custom-file-label" for="image">Sélectionner votre image à uploader</label>
                      <div id="alert"></div>
                    </div>
                    <div id="imagePreview" class="col-lg-4"></div> 
                    <div class="my-4">
                      <label for="alt" class="label"> ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required>
                    </div>
                    <div class="my-4">
                      <label for="img_name">renomer votre image<small class="text-danger"> (éviter-les-espaces-entre-les-mots)</small></label>
                      <input type="text" name="img_name" id="img_name"value="{{ old('img_name')}}" class="form-control my-2" placeholder="renomer votre image" required>
                    </div>
                    <button class="btn btn-success" type="submit"><span class="fas fa-plus pr-2"></span>uploader votre image</button>
                </form>
            </div>
        </div>
    </div>

        <script>
        function fileValidation() { 
            var fileInput =  document.getElementById('image'); 
            
            var filePath = fileInput.value; 
        var alert = document.getElementById('alert');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
            
            if (!allowedExtensions.exec(filePath)) { 
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
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
