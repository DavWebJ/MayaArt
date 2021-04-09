@extends('layouts.admin')

@section('admin.product.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Liste des produits</a></li>
                        <li class="breadcrumb-item active">Modifier le produit <span class="text-danger font-perso font-italic">{{ $product->name }}</span></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                      @include('includes.errors')
                    <label for="category">Changer la catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2" required>
                        <option value="{{$product->category_id}}"selected style="display: none">{{$product->category->name}}</option>
                        @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <hr class="hr-light my-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="vignette1" id="vignette1" lang="fr" onchange="return fileValidation1()">
                      <label class="custom-file-label" for="vignette1">Modifier l' image 1</label>
                    </div>
                      <label for="alt1" class="label"> ajouter une description pour l' image 1</label>
                      <input type="text" id="alt1" name="alt1" value="{{ $product->alt1}}" class="form-control my-2" placeholder="Description de l'image 1" required>
                       
                      <div class="col-12">
                            <p>image principal actuelle</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($product->vignette1) }}" class="img-fluid" alt="">
                            </div>
                             <p>nouvelle image</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden" id="imagePreview1"></div>
                        </div>
                        <div id="alert1"></div>


                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="vignette2" id="vignette2" lang="fr" onchange="return fileValidation2()">
                      <label class="custom-file-label" for="vignette2">Modifier l' image 2</label>
                    </div>
                      <label for="alt2" class="label"> ajouter une description pour l'image 2</label>
                      <input type="text" id="alt2" name="alt2" value="{{ $product->alt2}}" class="form-control my-2" placeholder="Description de l'image" required>
                        
                      <div class="col-12">
                        <p>image actuelle 2</p>
                        <img src="{{ asset($product->vignette2) }}" class="img-fluid" alt="">
                         <p>nouvelle image</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden" id="imagePreview2"></div>
                        <div id="alert2"></div>

                        <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="vignette3" id="vignette3" lang="fr" onchange="return fileValidation3()">
                      <label class="custom-file-label" for="vignette3">Modifier l' image 3</label>
                    </div>
                      <label for="alt3" class="label"> ajouter une description pour l'image 3</label>
                      <input type="text" id="alt3" name="alt3" value="{{ $product->alt3}}" class="form-control my-2" placeholder="Description de l'image" required>
                        <div class="col-12">
                            <p>image actuelle 3</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden" id="imagePreview">
                                <img src="{{ asset($product->vignette3) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <p>nouvelle image</p>
                        <div style="max-width: 150px;max-height:150px;overflow:hidden" id="imagePreview3"></div>
                        </div>
                        <div id="alert3"></div>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input my-2" name="vignette4" id="vignette4" lang="fr" onchange="return fileValidation4()">
                      <label class="custom-file-label" for="vignette4">Modifier l' image 4</label>
                    </div>
                      <label for="alt4" class="label"> ajouter une description pour l'image 4</label>
                      <input type="text" id="alt4" name="alt4" value="{{ $product->alt4}}" class="form-control my-2" placeholder="Description de l'image" required>
                        <div class="col-12">
                            <p>image actuelle 4</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($product->vignette4) }}" class="img-fluid" alt="">
                            </div>
                            <p>nouvelle image</p>
                            <div style="max-width: 150px;max-height:150px;overflow:hidden" id="imagePreview4"></div>
                        </div>
                        <div id="alert4"></div>

                    <hr class="hr-light">
                    <label for="name">Donner un nom à votre produit</label>
                    <input type="text" id="name" name="name" value="{{ $product->name}}" class="form-control my-2" placeholder="Nom du produit" required>

                    <hr class="hr-light">
                    <label for="meta">Ajouter une metadescription qui apparaitra sur le moteur de recherche Google<small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $product->meta}}" class="form-control my-2" placeholder="Metadescription" required>
                    <hr class="hr-light">
                    <label for="detail">Petite description du produit  <small class="text-danger">(max 255 caractères)</small></label>
                    <textarea type="text" id="detail" name="detail" class="form-control my-5 tiny">{{$product->detail}}</textarea>
                    <hr class="hr-light">
                    <label for="desc">Grande description du produit</label>
                    <textarea type="text" id="desc" name="desc" class="form-control my-5 tiny">{{$product->desc}}</textarea>
                    <div class="my-2"></div>
                    <div class="flex">
                        <div class="col-lg-4">
                            <label for="price">Prix du produit (en chiffre) <br> <small class="text-danger"> Exemple: pour 20 € écrire 20</small></label>
                            <input type="number" name="price" id="price" value="{{ $product->price}}" class="form-controll" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="price_promos">montant de la remise (en chiffre) <br> <small class="text-danger"> Exemple : pour 20 € écrire 20</small></label>
                            <input type="number" name="price_promos" id="price_promos" value="{{ $product->price_promos}}" class="form-controll" placeholder="{{ $product->price_promos}}">
                        </div>
                        <div class="col-lg-4">
                            <label for="stock">Stock du produit pour l'inventaire <br><small class="text-danger">Important pour la mise à jour des stocks</small></label>
                            <input type="number" name="stock" id="stock" class="form-controll" value="{{ $product->stock}}" required>
                        </div>
                    </div>
                    <div class="my-4">
                    </div>
                    <button class="btn btn-success my-3" type="submit"><span class="pr-2"></span>Modifier le produit</button>
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
                $('#image').val("");
                $('#alert').html("");
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
            { 
               alert.innerHTML = "";
               document.getElementById( 'imagePreview').innerHTML ="";
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
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
