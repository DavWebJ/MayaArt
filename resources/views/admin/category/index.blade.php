@extends('layouts.admin')

@section('admin.category')
<style>
  [x-cloak=""] { display: none; }
</style>

<div class="content">
  <div class="my-5">
        <div class="row justify-content-center my-4">
          <a href="{{route('category.create')}}" class="btn btn-hero-lg btn-rounded btn-outline-dark"><i class="fas fa-plus pr-2"></i> Ajouter une nouvelle catégorie de produit</a>
        </div>
          <div class="block">
            <livewire:category-table searchable="category,name" />
          </div>
        </div>
      </div>
    </div>
@endsection
