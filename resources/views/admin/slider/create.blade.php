@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Creation de l'image de fond (carrousel)</h2>
        </div>
        <div class="card-body">
            <form  action=" {{route('store-slider')}} " method="POST" enctype="multipart/form-data">
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
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                    @error('image')
                    <span style="color:red;"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection