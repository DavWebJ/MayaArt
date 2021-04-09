@extends('layouts.admin')

@section('admin.product.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Revenir à la liste des produits</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

      <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')
                    <label for="category">Sélectionner une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">Sélectionner une catégorie pour ce produit</option>
                        @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <hr class="hr-light my-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="vignette1" id="vignette1" lang="fr" onchange="return fileValidation1()" required>
                            <label class="custom-file-label" for="vignette1">Sélectionner l'image principale</label>
                            <div id="alert1"></div>
                            <label for="alt1" class="label"> Ajouter une description pour l'image principale </label>
                      <input type="text" id="alt1" name="alt1" value="{{ old('alt1')}}" class="form-control my-2" placeholder="description de l'image" required>
                    <div id="imagePreview1" class="col-lg-2"></div> 

                    <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="vignette2" id="vignette2" lang="fr" onchange="return fileValidation2()" required>
                            <label class="custom-file-label" for="vignette2">Sélectionner l' image 2</label>
                            <div id="alert2"></div>
                        </div>
                      <label for="alt2" class="label"> Ajouter une description pour l' image 2 </label>
                      <input type="text" id="alt2" name="alt2" value="{{ old('alt2')}}" class="form-control my-2" placeholder="description de l'image" required>
                    <div id="imagePreview2" class="col-lg-2"></div> 

                    <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="vignette3" id="vignette3" lang="fr" onchange="return fileValidation3()" required>
                            <label class="custom-file-label" for="vignette3">Sélectionner l' image 3</label>
                            <div id="alert3"></div>
                        </div>
                      <label for="alt3" class="label"> Ajouter une description pour l'image 3</label>
                      <input type="text" id="alt3" name="alt3" value="{{ old('alt3')}}" class="form-control my-2" placeholder="description de l'image" required>
                    <div id="imagePreview3" class="col-lg-2"></div> 


                    <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="vignette4" id="vignette4" lang="fr" onchange="return fileValidation4()" required>
                            <label class="custom-file-label" for="vignette4">Sélectionner l' image 4</label>
                            <div id="alert4"></div>
                        </div>
                      <label for="alt4" class="label"> Ajouter une description pour l'image 4</label>
                      <input type="text" id="alt4" name="alt4" value="{{ old('alt4')}}" class="form-control my-2" placeholder="description de l'image" required>
                    <div id="imagePreview4" class="col-lg-2"></div> 

                    <hr class="hr-light">
                    <label for="name">Donner un nom à votre produit</label>
                    <input type="text" id="name" name="name" value="{{ old('name')}}" class="form-control my-2" placeholder="Nom du produit" required>

                    <hr class="hr-light">
                    <label for="meta">Ajouter une meta description qui apparaitra sur le moteur de recherche Google<small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ old('meta')}}" class="form-control my-2" placeholder="Meta description" required>
                    <hr class="hr-light">
                    <label for="detail">Petite description du produit<small class="text-danger">(max 255 caractères)</small></label>
                    <textarea type="text" id="detail" name="detail" class="form-control my-5  tiny" value="{{ old('detail')}}" placeholder="Détailler votre produit... ">{{ old('detail')}}</textarea>
                    <hr class="hr-light">
                    <label for="desc">Grande description du produit</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-5 tiny" placeholder="Décrire votre produit ici...">{{ old('desc')}}</textarea>
                    <div class="my-2"></div>
                    <div class="flex">
                        <div class="col-lg-6">
                            <label for="price">Prix du produit (en chiffre) <br> <small class="text-danger"> Exemple : pour 20 € écrire 20</small></label>
                            <input type="number" name="price" id="price" class="form-controll" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="stock">Stock du produit pour l'inventaire<br><small class="text-danger">Important pour la mise à jour des stocks</small></label>
                            <input type="number" name="stock" id="stock" class="form-controll" required>
                        </div>
                    </div>
                    <div class="my-4">
                    </div>
                    <button class="btn btn-success my-3" type="submit"><span class="pr-2"></span>Mettre en vente le produit</button>
                </form>
            </div>
        </div>
    </div>
<script>

        $(document).ready(function () {

            $('#vignette1').val("");
            $('#alert1').html("");
            $('#vignette2').val("");
            $('#alert2').html("");
            $('#vignette3').val("");
            $('#alert3').html("");
            $('#vignette4').val("");
            $('#alert4').html("");

        });
        

                
        function fileValidation1() { 
            var fileInput =  document.getElementById('vignette1'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert1');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview1').innerHTML ="";
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
                            'imagePreview1').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
                
        

        function fileValidation2() { 
            var fileInput =  document.getElementById('vignette2'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert2');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview2').innerHTML ="";
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
                            'imagePreview2').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        }

        function fileValidation3() { 
            var fileInput =  document.getElementById('vignette3'); 
         function fileValidation() { 
            var fileInput =  document.getElementById('image'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert3');
          var alert = document.getElementById('alert');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
                alert.innerHTML = '<span class="text-danger font-bold">Ceci n"est pas une image valide, seul les images aux extensions (gif, png, jpeg et jpg) sont autorisées. Merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview3').innerHTML ="";
                 document.getElementById( 'imagePreview').innerHTML ="";
                return false; 
            }  
            else  

                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview3').innerHTML =  
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        }
        

        function fileValidation4() { 
            var fileInput =  document.getElementById('vignette4'); 
              
            var filePath = fileInput.value; 
          var alert = document.getElementById('alert4');
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                
                alert.innerHTML = "";
                alert.innerHTML = '<span class="text-danger font-bold">ceci n"est pas une image valide seul les images extensions (gif, png, jpeg et jpg) sont autoriser merci !</span>';
                fileInput.value = ''; 
                 document.getElementById( 'imagePreview4').innerHTML ="";
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
                            'imagePreview4').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        }

</script>
@endsection
