@extends("../admin/admin_master")

@section("admin")

<div class="col-lg-12">
    @if(session('success'))
    <div class="alert alert-warning  alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close right" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true" style="float: right;">&times;</span>
        </button>
    </div>
    @endif
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Modification de la page about</h2>
        </div>
        <div class="card-body">
            <form  action=" {{url('update-home-about/'.$about->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                    <label for="exampleFormControlInput1">Titre</label>
                    <input type="text" value="{{$about->title}}" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Entrer le titre">
                   
                </div>
           
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea  class="form-control" placeholder="Entrer une description"name="description" 
                        id="exampleFormControlTextarea1" rows="4">{{$about->description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texte</label>
                    <textarea  class="form-control" placeholder="Entrer une description"name="long_text" 
                        id="exampleFormControlTextarea1" rows="6">{{$about->long_text}}
                    </textarea>
                </div>
               
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Modifier</button>
                   
                </div>
            </form>
        </div>
    </div>

   

  
</div>

@endsection