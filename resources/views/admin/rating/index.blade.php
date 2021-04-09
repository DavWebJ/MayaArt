@extends('layouts.admin')

@section('admin.rating')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des commentaires</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
        <div class="card-header bg-dark py-3 d-flex justify-content-center my-4">
        </div>
          <div class="card-body">
            <livewire:comment-table 
            searchable="comment"/>
          </div>
        </div>
      </div>
    </div>
@endsection
