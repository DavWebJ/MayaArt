@extends('layouts.app')

@section('error')
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
    <h1 class=" text-red-600 text-center font-bold text-5xl">Erreur de paiement</h1>

        <div class="col-md-12">
        <div class="jumbotron text-center">
            <h3 class="display-3 text-red-600">echec du paiement</h3>
            <p class="lead text-red-600"><strong><span class="pl-2 pr-2" id="message"></span> </strong> </p>
            <hr>
            <p>
                Vous rencontrez un problème? <a href="{{route('contact')}}">Nous contacter</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('shop') }}" role="button">Continuer vers la boutique</a>
            </p>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            if(localStorage.getItem("message"))
            {
                let message = localStorage.getItem("message");
                $('#message').text(message);
                localStorage.clear();
            }else
            {
                return;
            }
        });
    </script>
@endsection