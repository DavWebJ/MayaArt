@extends('layouts.admin')

@section('admin.post.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Liste des articles</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
       <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h4 mb-4">Modifier l'article<span class="text-danger font-perso font-italic">{{ $post->title }}</span></p>
                    <p>
                        <a href="{{ route('post.index') }}" class="btn btn-info btn-md">Annuler et revenir à la liste des articles</a></li>
                    </p>
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <label for="category">selectionez une catégorie</label>
                    <select name="category" id="category" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">selectionez une catégorie</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @if($post->post_categories_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <hr class="hr-light">
                    <div class="d-flex justify-content-around align-content-center">
                        <div class="col-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input my-2" name="image" id="image" lang="fr" onchange="return fileValidation()" required>
                            <label class="custom-file-label" for="image">Sélectionner une nouvelle image si besoin</label>
                            <div id="alert"></div>
                        </div>
                    </div>
                    <div id="imagePreview" class="col-lg-2"></div> 
                        <div class="col-6">
                            <div style="max-width: 150px;max-height:150px;overflow:hidden">
                                <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                        <label for="alt" class="label">Ajouter une description pour l'image (ALT)</label>
                        <input type="text" id="alt" name="alt" value="{{ old('alt')}}" class="form-control my-2" placeholder="description de l'image" required>
                    <hr class="hr-light">
                    <label for="title">Modifier le titre</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control my-2" placeholder="Modifier le titre">

                    <label for="meta">Modifier la meta description <small class="text-danger">(max 255 caractères)</small></label>
                    <input type="text" id="meta" name="meta" value="{{ $post->meta }}" class="form-control my-2" placeholder="" required>


                    <hr class="hr-light">
                    <label for="content">Modifier l'article</label>
                    <textarea type="text" id="content" name="content" class="form-control my-2 tiny" placeholder="">{{ $post->content }}</textarea>

                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Modifier l'article</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
