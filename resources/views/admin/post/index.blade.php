@extends('layouts.admin')

@section('admin.post')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des articles du blog</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
            <div class="card-header bg-dark py-3 d-flex justify-content-center my-4">
                <a href="{{route('post.create')}}" class="btn btn-success btn-md px-3 my-0 mr-0 white-text"><i class="fas fa-plus pr-2"></i>Créer un nouvel article</a>
            </div>
          <div class="card-body">
           <livewire:post-table 
            searchable="title,category.name"/>
          </div>

        </div>
      </div>
    </div>
@endsection
