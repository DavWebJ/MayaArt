@extends('layouts.admin')

@section('admin.option.edit')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('option.index') }}">Liste des options</a></li>
                        <li class="breadcrumb-item active">Modifier cette option de produit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('option.update',$option->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                     <label for="product">Sélectionner le produit de base</label>
                    <select name="product_id" id="product_id" class="custom-select custom-select-sm my-2">
                        <option value=""selected style="display: none">Sélectionner le produit de base</option>
                        @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label for="title">Modifiez le nom de votre option</label>
                    <input type="text" id="option" name="option" value="{{ $option->option }}" class="form-control my-2" placeholder="">
                    <div class="my-4"></div>
                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Modifier cette option</button>
                    </form>
            </div>
        </div>
    </div>
    
    @endsection