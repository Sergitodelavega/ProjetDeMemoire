@extends('front.app')
@section('content')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('front/img/eres0.6b045dcd.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="color:black;">Plateforme Numérique Doctorale </h1>
            </div>
          </div>
          {{-- <div class="carousel-item">
            <img src="{{ asset('front/img/pexels-rodnae-productions-7713173.jpg') }}" class="d-block w-100" alt="..." style="height: 45vw">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="color:black;">Plateforme Numérique Doctorale </h1>
            </div>
          </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

@endsection