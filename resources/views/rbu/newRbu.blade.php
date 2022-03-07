@extends('layouts.app', ["current" => "rbu"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/rbu" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname"
                        id="fname" placeholder="FirstName">
                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="
                        form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" name="lname"
                        id="lname" placeholder="LastName">
                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="
                        form-group">
                    <label for="acard">Amis Card</label>
                    <input type="text" class="form-control form-control-sm @error('acard') is-invalid @enderror" name="acard"
                        id="acard" placeholder="NCI-0000000-00">
                    @error('acard')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="
                        form-group">
                    <label for="acard_validity">Amis Card Validity</label>
                    <input type="date" class="form-control form-control-sm @error('acard_validity') is-invalid @enderror"
                        name="acard_validity" id="acard_validity" placeholder="2000-01-01">
                    @error('acard_validity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="acard_local">Amis Card - Only PDF</label>
                    <input type="file" class="form-control form-control-sm" name="acard_local" id="acard_local">
                </div>
                <div class="
                        form-group">
                    <label for="network">Network</label>
                    <input type="text" class="form-control form-control-sm @error('network') is-invalid @enderror"
                        name="network" id="network" placeholder="NUNR | NS">
                    @error('network')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sa_signed">Subscriber Agreement Signed</label>
                    <input type="date" class="form-control form-control-sm @error('sa_signed') is-invalid @enderror"
                        name="sa_signed" id="sa_signed" placeholder="2000-01-01">
                    @error('sa_signed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sa_signed_local">Subscriber Agreement - Only PDF</label>
                    <input type="file" class="form-control form-control-sm" name="sa_signed_local" id="sa_signed_local">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email" placeholder="john.doe@ncia.nato.int">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm p-3 mt-2 ">Add</button>
                <button type="cancel" class="btn btn-secondary btn-sm p-3 mt-2">Cancel</button>
            </form>
        </div>
    </div>
    <!-- @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                                                                                {{ $error }}
                                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                                                                            </div>
    @endforeach
    @endif-->
@endsection
