@extends('layouts.admin')

@section('admin.order')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="elegant-color">
       <div class="jumbotron text-center">
           <h1 class="text-info display-2">Liste des commandes</h1>
       </div>
   </div>

   <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-body"></div>
            <div class="orders">
            <h3>Mes commandes</h3>
             <livewire:customer-order-table>
        </div>
          </div>
        </div>
      </div>
    </div>
@endsection
