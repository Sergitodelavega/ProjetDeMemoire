@extends('back.appback')
@section('title', 'ProfilDoctorant')
@section('content')

<div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class=""> <img src="{{ asset('storage/'.$doctorant->user->photo) }}" class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><a class="card-title mt-2" href="{{ route('doctorant.histo', $doctorant->id) }}">{{ $doctorant->user->name }}</a></h4>
                                    <h6 class="card-subtitle" style="color: black;">{{ $doctorant->user->email }}</h6>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->matricule }}</h5>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->year }}</h5>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->specialite }}</h5>
                                    @if ($doctorant->encadreur)
                                    Encadreur
                                    <h4>{{ $doctorant->encadreur->user->name }}</h4>
                                    @else
                                    <h4>Pas d'encadreur</h4>
                                    @endif

                                    @if (empty($doctorant->these->title))
                                    <a href="" class="btn btn-info d-none d-md-inline-block text-white" data-bs-toggle="modal" data-bs-target="#mediumModal-{{$doctorant->id}}">Définir la thèse
                                    </a>
                                    @else
                                    <p>Sujet de thèse</p>
                                    <h5 class="card-subtitle" style="color: black;">{{ $doctorant->these->title }}</h5>
                                    @endif
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ses activités et leur évolution</h4>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">Se</th>
                                                <th class="border-top-0">Intitulé</th>
                                                <th class="border-top-0">Date limite</th>
                                                <th class="border-top-0">Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)
                                                @if ($doctorant->year =="1re année" && $activity->year_id == 1)
                                                <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('encadreur.show_activity', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    @if ($activity->status == "validée")
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                    @endif
                                                    <td>
                                                        @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                        @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                            
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif  
                                                    </td>
                                                </tr>
                                                @elseif($doctorant->year =="2e année" && $activity->year_id == 2)
                                                <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                   
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('encadreur.show_activity', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    @if ($activity->status == "validée")
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                    @endif
                                                    <td>
                                                        @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                                        @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif  
                                                    </td>
                                                </tr>
                                                @elseif($doctorant->year =="3e année" && $activity->year_id == 3)
                                                <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('encadreur.show_activity', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    @if ($activity->status == "validée")
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                    @endif
                                                    <td>
                                                        @if($activity->status == "rejetée")<span class="badge bg-danger"><i class="mdi mdi-close-circle-outline"></i></span> @endif  
                                                        @if($activity->status == "en attente")<span class="badge bg-primary"><i class="mdi mdi-clock"></i></span> @endif
                                                        @if($activity->status == "validée")<span class="badge bg-success"><i class="mdi mdi-check-circle"></i></span> @endif
                                                        @if($activity->status == "non soumis")<span class="badge bg-secondary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span> @endif  
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
                {{-- <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ses activités et leur évolution</h4>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr scope="row">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Semestre</th>
                                                <th class="border-top-0">Intitulé</th>
                                                <th class="border-top-0">Deadline</th>
                                                <th class="border-top-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activities as $activity)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                @if ($activity->status == "validée")
                                                    <td>---</td>
                                                @else
                                                    <td>{{ $daysTime }}<br/>{{ $activity->calculateDeadline() }}</td>
                                                @endif
                                                <td>
                                                    @if($activity->status == "en attente")<span class="badge bg-primary">{{$activity->status}}</span> @endif
                                                    @if($activity->status == "validée")<span class="badge bg-success">{{$activity->status}}</span> @endif
                                                    @if($activity->status == "non soumis")<span class="badge bg-secondary">{{$activity->status}}</span> @endif  
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                

        <!-- modal medium -->
        <div class="modal fade" id="mediumModal-{{ $doctorant->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel" style="font-size: 30px;">Définir la thèse du doctorant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('admin.store.these', $doctorant->id) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title" class="col-md-12 mb-0 lead" style="color: black;">Intitulé de thèse</label>
                                                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder=""
                                                        class="form-control ps-0 form-control-line">
                                                <span class="alert-danger">@error("title"){{ $message }}@enderror</span> 
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="description" class="col-md-12 mb-0 lead" style="color: black;">Description</label>
                                                <div class="col-md-12">
                                                    <textarea name="description" id="description" required rows="4"
                                                        class="form-control ps-0 form-control-line">{{ old('description') }}</textarea>
                                                </div>
                                                <span class="alert-danger">@error("description"){{ $message }}@enderror</span>
                                            </div>
                    
                                            
                                            {{-- <div class="form-group">
                                                <label for="deadline" class="col-md-12">Date limite</label>
                                                <div class="col-md-12">
                                                    <input type="date" name="deadline" id="deadline" value="{{ old('date') }}" placeholder=""
                                                        class="form-control ps-0 form-control-line">
                                                        
                                                </div>
                                                <!-- Le message d'erreur pour "name" -->
                                                @error("date")
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                    
                                            {{-- <div class="form-group">
                                                <label for="status" class="col-md-12">Statut</label>
                                                <div class="col-md-12">
                                                    <select name="status" id="status" class="form-control ps-0 form-control-line">
                                                        @foreach(App\Models\These::STATUS as $status)
                                                        <option
                                                            value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                                        @endforeach
                                                    </select>    
                                                </div>
                                                <!-- Le message d'erreur pour "name" -->
                                                @error("status")
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                    
                                            {{-- <div class="form-group">
                                                <label for="encadreur_id" class="col-md-12">Encadreur assigné</label>
                                                <div class="col-md-12">
                                                    <select name="encadreur_id" id="encadreur_id" class="form-control ps-0 form-control-line" required>
                                                        @foreach($encadreurs as $encadreur)
                                                        <option
                                                            value="{{ $encadreur->id }}" {{ old('encadreur_id') == $encadreur->id ? 'selected' : '' }}>{{ $encadreur->user->name }}</option>
                                                        @endforeach
                                                    </select>    
                                                </div>
                                                <!-- Le message d'erreur pour "name" -->
                                                @error("encadreur_id")
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                    
                                            {{-- <div class="form-group">
                                                <label for="doctorant_id" class="col-md-12">Doctorant assigné</label>
                                                <div class="col-md-12">
                                                    <select name="doctorant_id" id="doctorant_id" class="form-control ps-0 form-control-line" required>
                                                        @foreach($doctorants as $doctorant)
                                                        <option value="{{ $doctorant->id }}"  {{ old('doctorant_id') == $doctorant->id ? 'selected' : '' }}>{{ $doctorant->user->name }}</option>
                                                        @endforeach
                                                    </select>    
                                                </div>
                                                <!-- Le message d'erreur pour "name" -->
                                                @error("doctorant_id")
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection