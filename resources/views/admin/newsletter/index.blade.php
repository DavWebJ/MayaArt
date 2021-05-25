@extends('layouts.admin')

@section('admin.newsletter')
<style>
  [x-cloak=""] { display: none; }
</style>
<div class="content">
    <div class="my-5">
             <livewire:newsletter-table exportable>
    </div>
  </div>

@endsection