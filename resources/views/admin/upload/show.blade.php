@extends('layouts.admin')

@section('admin.post')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">acceuil du site</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">liste des articles</a></li>
            <li class="breadcrumb-item active">{{$post->title}}</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!--Section: Content-->
  <section>
  	<!-- Grid row -->
    <div class="container-fluid d-flex justify-content-center">
		<!-- Featured image -->
        <img class="img-fluid" src="{{ asset($post->image) }}" alt="Sample image">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
    </div>
    <!-- Grid row -->
  </section>
  <!--Section: Content-->


@endsection
