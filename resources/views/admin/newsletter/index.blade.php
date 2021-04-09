@extends('layouts.admin')

@section('admin.newsletter')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des membres inscrits à la newsletter</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-body"></div>
            <div class="orders">
             <livewire:newsletter-table exportable>
        </div>
          </div>
        </div>
      </div>
    </div>
@endsection