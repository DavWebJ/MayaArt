@extends('layouts.admin')

@section('admin.option.create')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('option.index') }}">Liste des options de produit</a></li>
                        <li class="breadcrumb-item active">Créer une nouvelle option pour un produit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('option.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('includes.errors')
                    <label for="product">Sélectionner le produit de base</label>
                    <select name="product_id" id="product_id" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">Sélectionner le produit de base</option>
                        @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="option" name="option" class="form-control mb-4" placeholder="Nom de l'option : couleur,motif,tissu..." autofocus>
                    <div class="my-4"></div>
                    <button class="btn btn-outline-info" type="submit"><span class="fas fa-plus pr-2"></span> Créer cette option</button>
                </form>
            </div>
        </div>
    </div>

      
@endsection