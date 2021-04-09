@extends('layouts.admin')

@section('admin.post.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}" >Revenir à la liste des articles</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
            <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="h4 mb-4">Écrire un nouvel article</p>
                    @include('includes.errors')
                    <label for="category">Sélectionner une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">Sélectionner une catégorie</option>
                        @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <hr class="hr-light my-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation()" required>
                            <label class="custom-file-label" for="image">Sélectionner une image</label>
                            <div id="alert"></div>
                        </div>
                      <label for="alt" class="label"> Ajouter une description pour l'image (ALT)</label>
                      <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="Description de l'image" required>

        
                    <div id="imagePreview" class="col-lg-2"></div> 

                    <hr class="hr-light">
                    <label for="title">Ajouter un titre</label>
                    <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="Titre de l'article" required>

                    <hr class="hr-light">
                    <label for="meta">Ajouter une meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('title')}}" class="form-control my-2" placeholder="Meta description" required>

                    <hr class="hr-light">
                    <label for="content">Écrivez votre article</label>
                    <textarea type="text" id="content" name="content" class="form-control my-5 tiny" placeholder="Écrivez votre article ici...">{{ old('content')}}</textarea>
                    <button class="btn btn-success my-3" type="submit"><span class="fas fa-plus pr-2"></span>Publier l'article</button>
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
