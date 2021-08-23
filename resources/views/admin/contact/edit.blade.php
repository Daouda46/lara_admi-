@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    @if(session('success'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close right" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true" style="float: right;">&times;</span>
                    </button>
                </div>
                @endif
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2> Modifier un Contact</h2>
        </div>
        <div class="card-body">
            <form  action=" {{url('update-admin-contact/'.$contact->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Addrese</label>
                    <input type="text" name="address" value="{{$contact->address}}"  class="form-control" id="exampleFormControlInput1" placeholder="Entrer votre addresse">
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" name="email" value="{{$contact->email}}"  class="form-control" id="exampleFormControlInput1" placeholder="Entrer votre email">
                   
                </div>
           
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telephone</label>
                    <input class="form-control" value="{{$contact->phone}}"  placeholder="Entrer votre numero" name="phone" id="exampleFormControlTextarea1" >
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection