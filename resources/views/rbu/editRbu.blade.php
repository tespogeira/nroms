@extends('layouts.app', ["current" => "rbu"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/rbu/{{ $rbu->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname"
                        id="fname" value="{{ $rbu->fname }}">
                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" name="lname"
                        id="lname" value="{{ $rbu->lname }}">
                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="acard">Amis Card</label>
                    <input type="text" class="form-control form-control-sm @error('acard') is-invalid @enderror" name="acard"
                        id="acard" value="{{ $rbu->acard }}">
                    @error('acard')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="acard_validity">Amis Card Validity</label>
                    <input type="date" class="form-control form-control-sm @error('acard_validity') is-invalid @enderror"
                        name="acard_validity" id="acard_validity" value="{{ $rbu->acard_validity }}">
                    @error('acard_validity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="network">Network</label>
                    <input type="text" class="form-control form-control-sm @error('network') is-invalid @enderror"
                        name="network" id="network" value="{{ $rbu->network }}">
                    @error('network')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sa_signed">Subscriber Agreement Signed</label>
                    <input type="date" class="form-control form-control-sm @error('sa_signed') is-invalid @enderror"
                        name="sa_signed" id="sa_signed" value="{{ $rbu->sa_signed }}">
                    @error('sa_signed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                        name="email" id="email" value="{{ $rbu->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm p-3 mt-2">Update</button>
                <!--<button type="cancel" class="btn btn-danger btn-sm">Delete</button>-->
            </form>
        </div>
    </div>
@endsection
