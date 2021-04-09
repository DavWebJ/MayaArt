@extends('layouts.admin')

@section('admin.postcategory.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('postcategory.index') }}">Liste des catégories</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6">

                <p class="h4 mb-4">Modifier la catégorie - <span class="text-danger font-perso font-italic">{{ $postcategory->name }}</span></p>

                    @include('includes.errors')
                    <form class="text-center" action="{{ route('postcategory.update',$postcategory->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="text" id="name" name="name" value="{{ $postcategory->name }}" class="form-control mb-4" placeholder="Nom de la catégorie">
                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Confirmer la nouvelle catégorie</button>
                    </form>
            </div>
        </div>
    </div>



@endsection
