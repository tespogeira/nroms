@extends('layouts.app', ["current" => "rbu"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">New - Reach Back User
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
