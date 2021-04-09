@extends('layouts.admin')

@section('admin.coupon.edit')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Liste des coupons</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                    @include('includes.errors')
                    <form class="text-center" action="{{ route('coupon.update',$coupon->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <label for="code">Modifier le code promo</label>
                        <input type="text" id="code" name="code" value="{{ $coupon->code }}" class="form-control mb-4" placeholder="Code....">
                        <div class="my-4"></div>
                        <label for="percent">Modifier le pourcentage de remise</label>
                        <input type="number" id="percent" name="percent" value="{{ $coupon->percent }}" class="form-control mb-4" placeholder="25">
                        <button class="btn btn-success btn-block" type="submit"><span class="fas fa-pen pr-2"></span>Confirmer la nouvelle catégorie</button>
                    </form>
            </div>
        </div>
    </div>

@endsection