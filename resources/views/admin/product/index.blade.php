@extends('layouts.admin')

@section('admin.product')
<style>
  [x-cloak=""] { display: none; }
</style>
<div class="content">
  <div class="my-5">
      <div class="row justify-center">
            <a href="{{route('product.create')}}" class="btn btn-hero-lg btn-rounded btn-outline-dark"><i class="fas fa-plus mx-2"></i> Créer un nouveau produit</a>
       </div>
            <livewire:products-table 
            searchable="title,slug"/>
  </div>
</div>
@endsection
