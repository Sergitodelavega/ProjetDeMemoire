@extends('front.app')
@section('content')

<?php

use Illuminate\Support\Str;

?>
  <!-- ======= Events Section ======= -->
  <section id="portfolio" class="portfoio">
    <div class="container">

      <div class="section-title">
        <h2>Actualités et Évènements</h2>
        <h3 class="card-title">{{ $post->title }}</h3>
      </div>
        <div class="row">
              <div class="col-lg-10 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('storage/'.$post->picture) }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    
                    <p class="card-text">{{ $post->content}}</p>
                    <p class="card-text"><small class="text-muted">Publié {{ $post->created_at->diffForHumans() }}</small></p>
                  </div>
                </div>
              </div>

        </div>
      
    </div>
  </section><!-- End Portfoio Section -->


@endsection