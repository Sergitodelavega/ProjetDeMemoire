<div class="col-lg-4 col-xlg-3">
    <div class="card">
        <div class="card-body">
            {{-- <h4 class="card-title">Basic Table</h4>
            <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr scope="row">
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ecoles as $ecole)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('ecoles.show', $ecole->id) }}">{{ $ecole->name }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
