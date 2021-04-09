@extends('layouts.app')
@section('title')
    contactez-moi
@endsection
@section('meta')

@endsection
@section('contact')
<section class="contact-container">
    <div class="row">
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
        <div class=" col-lg-5 col-sm-12 contact-image">
            <h1 class="contact-title contact-title-mobile uppercase font-bold">Contactez-moi</h1>
            </div>
            <div class="col-lg-7 col-sm-12 relative">
                <div class="formulaire-container">
                    <h1 class="contact-title contact-title-laptop uppercase font-bold">Contactez-moi</h1>
                    <form class="grid form-contact" action="{{route('message')}}" method="post" id="message">
                        @csrf
                        <div class=" flex">
                            <input type="text" class="w-1/2 input-contact" name="prenom" id="prenom" required autofocus placeholder="Prénom">
                            <input type="text" class="w-1/2 input-contact" name="name" id="name" required placeholder="Nom">
                        </div>
                        
                        <input type="email"  class="input-contact" name="email" id="email" required placeholder="Email">
                        <div class="flex input-contact checkbox-contact-container">
                            <input class="checkbox-newsletter-contact" type="checkbox" name="newsletter" id="newsletter">
                            <label class="newsletter-contact" for="newletter">J'accepte de recevoir la newsletter</label>
                        </div>
                        <textarea class="input-contact input-contact" name="message" id="message"  placeholder="Message"></textarea>
        
                        <button class="submit-button-contact" type="submit" id="submit"><span class="fas fa-paper-plane fa-2x text-indigo-400"></span></button>
                    </form>
                </div>
                
            </div>
    </div>
    
</section>
<script>
    $(function () {
        $("input[type=checkbox]").change(function(){
            if($(this).is(':checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        });
    });
    </script>
@endsection