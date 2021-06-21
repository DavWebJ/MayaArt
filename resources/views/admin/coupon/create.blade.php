@extends('layouts.admin')

@section('admin.coupon.create')
<!-- Page Content -->
<div class="content">
    <h3 class="text-center text-xl">Créer un nouveau coupon</h3>
    <!-- Quick Overview + Actions -->
    <div class="row-deck">
    <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Info</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        @include('includes.errors')
                    <form class="text-center" action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="type">Sélectionner le type de coupon à appliquer</label>
                            <select name="type" id="type" class="custom-select custom-select-sm" required>
                                <option value=""selected style="display: none">Quel est le type de coupon</option>
                                <option value="fixed">prix fixe</option>
                                <option value="percent">pourcentage %</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Insérer le code promo </label>
                            <input type="text" class="form-control" type="text" id="code" name="code" class="form-control mb-4" placeholder="AZ125TY2" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="value">Insérer la valeur du coupon <i class="text-xplay">(prix fixe ou %)</i></label>
                            <input type="text" id="value" name="value" class="form-control mb-4" placeholder="prix ou poucentage" required>
                        </div>
                        <div class="form-group">
                            <label for="cartvalue">Insérer la valeur minimum du panier pour appliquer ce coupon</label>
                            <input type="text" id="cartvalue" name="cart_value" class="form-control mb-4" placeholder="valeur minimum" required>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Choisis la date à laquelle ton coupon prendra fin</label>
                            <input type="text" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active date" id="expiry_date" name="expiry_date" placeholder="2021/07/20" readonly="readonly">
                        </div> 
                        <div class="form-group">
                           <button class="btn btn-hero-lg btn-rounded btn-hero-success mr-1 mb-3 mt-3" type="submit"><i class="si si-rocket mr-1"></i> Créer ce coupon</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END Info -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/l10n/fr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css"  />
<script>
    $(function () {
        $(".date").flatpickr(
            {
                dateFormat: "d-m-Y",
                inline: true,
                "locale": "fr"
            }
        );
    });
</script>
@endsection