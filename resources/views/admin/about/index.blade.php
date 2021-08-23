@extends("../admin/admin_master")

@section("admin") 

    <div class="py-12">
      <div class="container">
          
        <h4>Home about</h4>
        <a href=" {{route('add-about')}} "><button class="btn btn-success">Ajouter</button></a>
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

                <div class="card-header"> Ajouter une description</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th width="3%" scope="col">numero</th>
                    <th width="15%" scope="col">Titre</th>
                    <th width="40%" scope="col">Description</th>
                    <th width="80%" scope="col">About</th>
                    {{-- <th width="30%" scope="col">Date de création</th> --}}
                    <th width="10%" scope="col" >Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($abouts as $about)
                    <tr>
                        <td  scope="col">{{$i++}}</td>
                        <td  scope="col">{{$about->title}}</td>
                        <td scope="col">{{$about->description}}</td>
                        <td scope="col">{{$about->long_text}}</td>               
                        {{-- <td scope="col">{{$about->created_at->diffForHumans()}}</td> --}}
                        <td >
                            <a style=" width='10px;' " href="{{url('edit-home-about/'.$about->id)}}" class="btn btn-info">Modifier</a>
                            <a style=" width='10px;' " href="{{url('delete-home-about/'.$about->id)}}" onclick="return confirm('Etres vous sûre de vouloir supprimé :?')" class="btn btn-danger">Supprimer</a>
                        </td>
                       
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{-- {{$abouts->links()}} --}}
        </div>
        </div>


        </div>
        <br><br>
       
      </div>
    </div>
@endsection