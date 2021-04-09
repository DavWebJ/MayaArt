@extends('layouts.admin')

@section('admin.postcategory.create')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('postcategory.index') }}">Liste des catégories</a></li>
                        <li class="breadcrumb-item active">Créer une nouvelle catégorie</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('postcategory.store')}}" method="POST">
                    @csrf
                    @include('includes.errors')
                    <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Nom de la catégorie" autofocus>
                    <button class="btn btn-info" type="submit"><span class="fas fa-plus pr-2"></span>Ajouter la catégorie</button>
                </form>
            </div>
        </div>
    </div>
@endsection
