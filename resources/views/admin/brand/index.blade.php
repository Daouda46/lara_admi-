@extends("../admin/admin_master")

@section("admin") 

    <div class="py-12">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8">
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
                <div class="card-header"> All brand</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th scope="col">numero</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Image</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($brands as $brand)
                    <tr>
                        <th scope="col">{{$i++}}</th>
                        <th scope="col">{{$brand->brand_name}}</th>
                        <th scope="col"><img src=" {{asset($brand->brand_image)}} " alt="" style="width: 70px; height:60px;"></th>
                        <th scope="col">{{$brand->created_at->diffForHumans()}}</th>
                        <th scope="col">
                            <a href="{{url('edit-brand/'.$brand->id)}}" class="btn btn-info">Modifier</a>
                            <a href="{{url('delete-brand/'.$brand->id)}}" onclick="return confirm('Etres vous sûre de vouloir supprimé :?')" class="btn btn-danger">Supprimer</a>
                        </th>
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{-- {{$brands->links()}} --}}
        </div>
        </div>

        <div class="col-md-4">
            <div class="card">
          <div class="card-header"> Ajouter une catégorie</div>
          <div class="card-body">  
            <form class="row g-3" action=" {{route('brand.store')}} " method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">

                   <label for="validationDefault01" class="form-label">Brand Name</label>
                   <input type="text" class="form-control" name="brand_name" id="validationDefault01">
                   @error('brand_name')
                   <span style="color:red;"> {{$message}} </span>
                    @enderror
               </div>
                  <div class="form-group">

                      <label for="validationDefault01" class="form-label">Brand Name</label>
                      <input type="file" class="form-control" name="brand_image" id="validationDefault01">
                    @error('brand_image')
                                <span style="color:red;"> {{$message}} </span>
                    @enderror
                  </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Add brand</button>
                </div>
              </form>
          </div>
        
         </div>
        </div>

        </div>
        <br><br>
       
      </div>
    </div>
@endsection