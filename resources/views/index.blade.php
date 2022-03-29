@extends('layouts.app')

@section('body')
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <a href="{{ '/rbu' }}" class="">
                    <h5 class="card-title">
                        @if (Auth::check())
                            @if ($rbu_total > 0)
                                <span class="position-absolute top start translate-middle badge rounded-pill bg-danger">
                                    {{ $rbu_total }}
                                </span>
                            @else
                            @endif
                        @endif
                        <span class="badge bg-primary">RBUs List</span>
                    </h5>
                </a>
                <p class="card-text">List of the Users for NCIRC that request certificates for NROP domain, here you
                    can find a list of the users that subscribe the agreements</p>
            </div>
            <div class="card-footer">
                <a href="/rbu/new" class="btn btn-primary btn-sm">Add RBU</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">POCs List</h5>
                <p class="card-text">##############</p>
            </div>
            <div class="card-footer">
                <a href="/poc" class="btn btn-primary btn-sm btn-sm">POCs List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title">Ticket mngt</h5>
                    <p class="card-text">##############</p>
                </div>
                <div class="card-footer">
                    <a href="/tickets" class="btn btn-primary btn-sm">Tickets</a>
                </div>
            </div>
        </div>
    @endsection
