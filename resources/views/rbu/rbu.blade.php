@extends('layouts.app')

@section('body')
    <div class="card border">
        @if ($rbu->count() > 0)
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
                                <td> {{ $reachbu->acard_validity }}
                                    @if ($reachbu->acard_validity > \Carbon\Carbon::now())
                                        <i class="material-icons" style="font-size:18px;color:green">verified</i>
                                    @else
                                        <i class="material-icons" style="font-size:18px;color:red">warning</i>
                                    @endif
                                </td>
                                <td>{{ $reachbu->network }}</td>
                                <td>{{ $reachbu->sa_signed }}</td>
                                <td>{{ $reachbu->email }}</td>
                                <td>
                                    <a href="/rbu/edit/{{ $reachbu->id }}"><i class="material-icons"
                                            style="font-size:18px;color:black">edit</i></a>
                                    <a href="/rbu/delete/{{ $reachbu->id }}"><i class="material-icons"
                                            style="font-size:18px;color:red">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($rbu->count() == 0)
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">For now there are no registers</h4>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <a href="/rbu/new" class="btn btn-primary btn-sm">New RBUs List</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
