@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2> Créer un Contact</h2>
        </div>
        <div class="card-body">
            <form  action=" {{route('store.admin.contact')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Addrese</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Entrer votre addresse">
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Entrer votre email">
                   
                </div>
           
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telephone</label>
                    <input class="form-control" placeholder="Entrer votre numero" name="phone" id="exampleFormControlTextarea1" >
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection