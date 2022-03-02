@extends('layouts.app', ["current" => "rbu"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/rbu/{{ $rbu->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="fname" id="fname"
                        value="{{ $rbu->fname }}">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control form-control-sm" name="lname" id="lname"
                        value="{{ $rbu->lname }}">
                </div>
                <div class="form-group">
                    <label for="acard">Amis Card</label>
                    <input type="text" class="form-control form-control-sm" name="acard" id="acard"
                        value="{{ $rbu->acard }}">
                </div>
                <div class="form-group">
                    <label for="acard_validity">Amis Card Validity</label>
                    <input type="date" class="form-control form-control-sm" name="acard_validity" id="acard_validity"
                        value="{{ $rbu->acard_validity }}">
                </div>
                <div class="form-group">
                    <label for="network">Network</label>
                    <input type="text" class="form-control form-control-sm" name="network" id="network"
                        value="{{ $rbu->network }}">
                </div>
                <div class="form-group">
                    <label for="sa_signed">Subscriber Agreement Signed</label>
                    <input type="date" class="form-control form-control-sm" name="sa_signed" id="sa_signed"
                        value="{{ $rbu->sa_signed }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm" name="email" id="email"
                        value="{{ $rbu->email }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm p-3 mt-2">Update</button>
                <!--<button type="cancel" class="btn btn-danger btn-sm">Delete</button>-->
            </form>
        </div>
    </div>
@endsection
