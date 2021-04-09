@extends('layouts.admin')

@section('admin.coupon.create')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil du site</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Liste des codes promo</a></li>
                        <li class="breadcrumb-item active">Créer un nouveau code promo</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6 card">
                <form class="text-center" action="{{route('coupon.store')}}" method="POST">
                    @csrf
                    @include('includes.errors')
                    <label for="code">Insérer le code promo </label>
                    <input type="text" id="code" name="code" class="form-control mb-4" placeholder="AZ125TY2" autofocus required>
                    <label for="percent">Insérer le poucentage à appliquer (en chiffre)</label>
                    <input type="text" id="percent" name="percent" class="form-control mb-4" placeholder="15" required>
                    <button class="btn btn-info" type="submit"><span class="fas fa-plus pr-2"></span> Créer le code promo</button>
                </form>
            </div>
        </div>
    </div>

@endsection