@extends('layouts.admin')
@section('admin.imageproduct.create')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('imageproduct.index') }}">Revenir à la liste des images</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container">
            <div class="jumbotron bg-yellow-300">
                <h2 class="text-center font-bold text-lg">charger vos images ci-dessous</h2>
            </div>
            <form method="post" action="{{route('imageproduct.store')}}" enctype="multipart/form-data">
                @csrf
                <select name="product_id" id="product_id" class="js-example-basic-multiple">
                        <option value="" style="display: none;" selected="true">selectionner votre produit</option>
                        @foreach ($product as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
            </form>   
        </div>
    </div>
@endsection