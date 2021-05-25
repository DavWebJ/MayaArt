@extends('layouts.admin')

@section('admin.header')
<style>
  [x-cloak=""] { display: none; }
</style>
<div class="content">
  <div class="my-5">
    @if ($header->count() < 3)
           <div class=" row justify-center">
            <a href="{{route('header.create')}}" class="btn btn-hero-lg btn-rounded btn-outline-dark"><i class="fas fa-plus mx-2"></i> Créer un nouveau header</a>
       </div>
    @endif
       <livewire:header-table searchable="title" />
  </div>
</div>
@endsection
