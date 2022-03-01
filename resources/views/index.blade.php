@extends('layouts.app')

@section('body')
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">POCs List</h5>
                <p class="card-text">##############</p>
            </div>
            <div class="card-footer">
                <a href="/poc" class="btn btn-primary">POCs List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">RBUs List</h5>
                <p class="card-text">##############</p>
            </div>
            <div class="card-footer">
                <a href="/rbu" class="btn btn-primary">RBUs List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title">Ticket mngt</h5>
                    <p class="card-text">##############</p>
                </div>
                <div class="card-footer">
                    <a href="/tickets" class="btn btn-primary">Tickets</a>
                </div>
            </div>
        </div>
    @endsection
