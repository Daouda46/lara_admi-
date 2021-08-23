@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Modification de l'image de fond (carrousel)</h2>
        </div>
        <div class="card-body">
            <form  action=" {{url('update-slider/'.$slider->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{$slider->image}}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Titre</label>
                    <input type="text" value="{{$slider->title}}" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Entrer le titre">
                   
                </div>
           
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea  class="form-control" placeholder="Entrer une description"name="description" 
                        id="exampleFormControlTextarea1" rows="3">{{$slider->description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" value="{{$slider->image}}" class="form-control-file" name="image" id="exampleFormControlFile1">
                    @error('image')
                    <span style="color:red;"> {{$message}} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <img src=" {{asset($slider->image)}} " style="width: 70px;height:60px;" alt="">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Modifier</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection