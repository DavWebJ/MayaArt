@extends('layouts.admin')

@section('admin.promotion')
<style>
  [x-cloak=""] { display: none; }
</style>
<div class="content">
  <div class="my-5">
          <div class="row justify-content-center">
            <a href="{{ route('promotion.create') }}"class="btn btn-hero-lg btn-rounded btn-outline-dark"><i class="fas fa-plus mx-2"></i>Créer une promos</a>
          </div>
            <livewire:promo-table searchable="title"/>
  </div>
</div>
@endsection
