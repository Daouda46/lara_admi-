@extends("../admin/admin_master")

@section("admin") 

    <div class="py-12">
      <div class="container">
          
        <h4>Home slider</h4>
        <a href=" {{route('add-slider')}} "><button class="btn btn-success">Ajouter</button></a>
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                @if(session('success'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close right" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true" style="float: right;">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('message'))
                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                    <strong>{{session('message')}}</strong>
                    <button type="button" class="close right" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true" style="float: right;">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-header"> All Slider</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th width="5%" scope="col">numero</th>
                    <th width="20%" scope="col">Titre</th>
                    <th width="50%" scope="col">Description</th>
                    <th width="20%" scope="col">Image</th>
                    <th width="30%" scope="col">Date de création</th>
                    <th width="20%" colspan="2" >Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($sliders as $slider)
                    <tr>
                        <td  scope="col">{{$i++}}</td>
                        <td  scope="col">{{$slider->title}}</td>
                        <td scope="col">{{$slider->description}}</td>
                        <td scope="col"><img src=" {{asset($slider->image)}} " alt="" style="width: 70px; height:60px;"></td>
                        <td scope="col">{{$slider->created_at->diffForHumans()}}</td>
                        <td>
                            <a  href="{{url('edit-slider/'.$slider->id)}}" class="btn btn-info">Modifier</a>
                        </td>
                        <td>
                            <a href="{{url('delete-slider/'.$slider->id)}}" onclick="return confirm('Etres vous sûre de vouloir supprimé :?')" class="btn btn-danger">Supprimer</a>
                        </td>
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{-- {{$sliders->links()}} --}}
        </div>
        </div>


        </div>
        <br><br>
       
      </div>
    </div>
@endsection