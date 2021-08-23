@extends("../admin/admin_master")

@section("admin")


	<div class="card card-default">
        @if(session('error'))
        <div class="alert alert-warning  alert-dismissible fade show" role="alert">
            <strong>{{session('error')}}</strong>
            <button type="button" class="close right" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true" style="float: right;">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-header card-header-border-bottom">
            <h2>Changer le mot de pass</h2>
        </div>
        <div class="card-body">
            <form method="POST" action=" {{url('update-user-password')}} " class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Mot de pass courrent</label>
                    <input type="password" name="oldpassword" class="form-control" id="current_password" placeholder="Current password">
                    @error('oldpassword')
                        <span class="text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Nouveau mot de pass</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                    @error('password')
                        <span class="text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Confirmer le nouveau mot de pass</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
                </div>
                <button class="btn btn-primary" type="submit">Changer</button>
            </form>
        </div>
    </div>
@endsection