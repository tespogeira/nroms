@extends('layouts.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Reach Back Users: {{ $rbu->count() }}
            </h5>
            <table class="table table-hover" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Amis Card</th>
                        <th>Amis Card Validity</th>
                        <th>Classification</th>
                        <th>SA Signed</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rbu as $reachbu)
                        <tr>
                            <td value="{{ $reachbu->id }}"></td>
                            <td>{{ $reachbu->fname }}</td>
                            <td>{{ $reachbu->lname }}</td>
                            <td>{{ $reachbu->acard }}</td>
                            <td>{{ $reachbu->acard_validity }}</td>
                            <td>{{ $reachbu->classification }}</td>
                            <td>{{ $reachbu->sa_signed }}</td>
                            <td>{{ $reachbu->email }}</td>
                            <td>[+]</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
