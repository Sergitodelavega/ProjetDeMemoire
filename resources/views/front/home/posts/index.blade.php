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
        <p>Découvrez toutes les actualités et évènements.</p>
      </div>
        <div class="row">
          @foreach($posts as $post)
              <div class="col-lg-4 col-md-3 col-sm-6">
                <!-- Première card -->
                <div class="card">
                  <img src="{{ asset('storage/'.$post->picture) }}" class="card-img-top" alt="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><a class="text-black" href="{{ route('post.show', $post)}}">{{ $post->title }}</a></h5>
                    <p class="card-text">{{ Str::limit($post->content, $limit = 100, $end = '...') }}</p>
                    <p class="card-text"><small class="text-muted">Publié {{ $post->created_at->diffForHumans() }}</small></p>
                    <a href="{{ route('post.show', $post)}}" class="btn btn-danger" style="font-size: 13px;">Lire la suite</a>
                  </div>
                </div>
                <br>
              </div>
          @endforeach
          
        </div>
      
    </div>
  </section><!-- End Portfoio Section -->


@endsection