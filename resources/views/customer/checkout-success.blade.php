@extends('layouts.master')

@section('success')
@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@if(Session::has('error'))
<script>
    toastr.error("{{ Session::get('error') }}");
</script>
@endif
    <h1 class=" text-green-600 text-center font-bold text-5xl">Paiement réussi</h1>
        <div class="col-md-12">
        <div class="jumbotron text-center">
            <h1 class="display-3">Merci!</h1>
            <p class="lead"><strong>Votre commande a été traitée avec succès !</strong></p>
            <hr>
            <p>
                Vous rencontrez un problème? <a href="{{route('contact')}}">Nous contacter</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('shop') }}" role="button">Continuer vers la boutique</a>
            </p>
        </div>
    </div>
@endsection