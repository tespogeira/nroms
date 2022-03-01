@extends('layouts.app', ["current" => "rbu"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/rbu" method="POST">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="FirstName">
                </div>
                <div class="form-group">
                    <label for="lname">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="lname" id="lname" placeholder="LastName">
                </div>
                <div class="form-group">
                    <label for="acard">Amis Card</label>
                    <input type="text" class="form-control form-control-sm" name="acard" id="acard"
                        placeholder="NCI-0000000-00">
                </div>
                <div class="form-group">
                    <label for="acard_validity">Amis Card Validity</label>
                    <input type="date" class="form-control form-control-sm" name="acard_validity" id="acard_validity"
                        placeholder="2000-01-01">
                </div>
                <div class="form-group">
                    <label for="network">Network</label>
                    <input type="text" class="form-control form-control-sm" name="network" id="network"
                        placeholder="NUNR | NS">
                </div>
                <div class="form-group">
                    <label for="sa_signed">Subscriber Agreement Signed</label>
                    <input type="date" class="form-control form-control-sm" name="sa_signed" id="sa_signed"
                        placeholder="2000-01-01">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm" name="email" id="email"
                        placeholder="fname.lastname@ncia.nato.int">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                <button type="cancel" class="btn btn-secondary btn-sm">Cancel</button>
            </form>
        </div>
    </div>
@endsection
