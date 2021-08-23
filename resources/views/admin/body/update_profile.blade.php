@extends("../admin/admin_master")

@section("admin")


	<div class="card card-default">
        @if(session('message'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close right" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true" style="float: right;">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-header card-header-border-bottom">
            <h2>Update User Profile</h2>
        </div>
        <div class="card-body">
            <form method="POST" action=" {{url('save-user-profile')}} " class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" value=" {{$user->name}} ">
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input  name="email" class="form-control" id="name" value=" {{$user->email}} ">
                   
                </div>
              
                
                <button class="btn btn-warning" type="submit">Modifier</button>
            </form>
        </div>
    </div>
@endsection