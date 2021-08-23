@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Creation un a-propos</h2>
        </div>
        <div class="card-body">
            <form  action=" {{route('store-about')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Titre</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Entrer le titre">
                   
                </div>
           
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" placeholder="Entrer une description" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texte</label>
                    <textarea class="form-control" placeholder="Entrer une description" name="long_text" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection