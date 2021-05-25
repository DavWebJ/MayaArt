@extends('layouts.admin')

@section('admin.index')
<style>
    [x-cloak=""] {
        display: none;
    }
</style>

<div class="col-md-12 col-12 col-md-12 col-xl-12">
    <h1 class="head-title">Liste des Super Admins</h1>
    <button  type="button" class="btn btn-hero-info js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;"><a href="{{route('admin.create')}}"></a><span class="fa fa-plus"></span> Ajouter un Admin</button>
      <livewire:admin-tables />
</div>
@endsection
