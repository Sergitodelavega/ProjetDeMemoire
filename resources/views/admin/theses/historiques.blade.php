@extends('back.appback')
@section('title', 'Activities')
@section('content')

    <br>
    <div class="container" style="margin-left: 50px">
        <h1>Historiques des activities</h1>
    </div>

    <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
        @if ($doctorant->year =="1re année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">1re année</h4>
                        {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="1re année" && $activity->year_id == 1)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($doctorant->year =="2e année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">1re année</h4>
                        {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="2e année" && $activity->year_id == 1)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">2e année</h4>
                        {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="2e année" && $activity->year_id == 2)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                            <tr>
                                                <td>{{ $activity->semestre }}</td>
                                                <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($doctorant->year =="3e année")
            <div class="row">
                <!-- column -->
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">1re année</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                            {{-- <th class="border-top-0">Date limite</th>
                                            <th class="border-top-0">Statut</th> --}}
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="3e année" && $activity->year_id == 1)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">2e année</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="3e année" && $activity->year_id == 2)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    
                                                </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">3e année</h4>
                           {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr scope="row">
                                            <th class="border-top-0">Se</th>
                                            <th class="border-top-0">Intitulé</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                        @if ($doctorant->year =="3e année" && $activity->year_id == 3)
                                            <?php $daysTime = $activity->remainingTime(); ?>
                                                <tr>
                                                    <td>{{ $activity->semestre }}</td>
                                                    <td><a href="{{ route('doctorant.activity.show', $activity->id) }}">{{ $activity->title }}</a></td>
                                                    
                                                </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection