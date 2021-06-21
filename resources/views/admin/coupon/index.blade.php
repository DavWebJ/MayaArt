@extends('layouts.admin')

@section('admin.coupon')
<style>
  [x-cloak=""] { display: none; }
</style>
   <div class="content">
      <div class="my-5">
        <div class="row justify-content-center my-4">
        <a href="{{route('coupon.create')}}" class="btn btn-hero-lg btn-rounded btn-outline-dark"><i class="fas fa-plus pr-2"></i>Créer un nouveau coupon</a>
        </div>
            <livewire:coupon-table 
            searchable="coupon"/>
          </div>
        </div>
@endsection