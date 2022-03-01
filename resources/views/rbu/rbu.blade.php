@extends('layouts.app')

@section('body')
    <div class="card border">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="card-title">Reach Back Users: {{ $rbu->count() }}</h4>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-2">
                    <a href="/rbu/new" class="btn btn-primary btn-sm">New RBUs List</a>
                </div>
            </div>
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
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rbu as $reachbu)
                        <tr>
                            <td value="{{ $reachbu->id }}">{{ $reachbu->id }}</td>
                            <td>{{ $reachbu->fname }}</td>
                            <td>{{ $reachbu->lname }}</td>
                            <td>{{ $reachbu->acard }}</td>
                            <td>{{ $reachbu->acard_validity }}</td>
                            <td>{{ $reachbu->network }}</td>
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
