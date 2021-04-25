@extends('layouts.master')
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
 <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Contactez moi</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container-fluid">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Adresse:</span> 16000 Angoulême</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 33.......</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:contact@mayart.com">contact@mayart.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Développeur qui  as fais mon site</span> <a href="https://www.david-friquet.com" target="_blank">David Friquet</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="{{ route('message') }}" class="bg-white p-5 contact-form" method="POST">
                @csrf
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name" required autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="sujet" required>
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" placeholder="Message" name="message" required></textarea>
              </div>
              <div class="form-group">
                <button type="submit"  class="btn btn-primary py-3 px-5">envoyer votre message</button>
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22314.0519320729!2d0.11467829212243849!3d45.64567066261197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe2d85032bc499%3A0x1c05d395aa855070!2s16000%20Angoul%C3%AAme!5e0!3m2!1sfr!2sfr!4v1618255300607!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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