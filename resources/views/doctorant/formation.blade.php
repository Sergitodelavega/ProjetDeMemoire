@extends('back.appback')
@section('title', 'Formations')
@section('content')

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                @foreach ($formations as $formation )
                <div class="col-sm-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$formation->image) }}" class="card-img-top" alt="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $formation->title }}</h4>
                            <p class="card-text h4"><small class="text-muted">{{ $formation->date_heure }}</small></p>
                            <div class="d-flex justify-content-end">
                                <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$formation->id}}">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop-{{$formation->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Formation : {{$formation->title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="text-center" style="margin-top: 10px">
                <img src="{{asset('storage/'.$formation->image)}}" style="width: 80%" >
            </div>
            <div style="margin-top: 15px">
                <span class="badge bg-primary" style="font-size: 1.4em">À {{$formation->location}}, le {{ \Carbon\Carbon::parse($formation->date_heure)->translatedFormat('d F Y à H\hi') }}</span>
                <p style="width:100%; text-align:justify; font-size:20px;">{{$formation->description}}</p>
            </div>
        </div>
      </div>
    </div>
  </div> 
                @endforeach                          
            </div>
        </div>


@endsection