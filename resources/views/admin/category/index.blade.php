<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toutes les categories
            {{-- <b style="float:right;">Total users: 
                <span class="btn btn-danger">  </span>
            </b> --}}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="container">
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
                <div class="card-header"> Toutes les categories</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th scope="col">numero</th>
                    <th scope="col">Nom de la catégorie</th>
                    <th scope="col">User</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($categories as $categorie)
                    <tr>
                        <th scope="col">{{$i++}}</th>
                        <th scope="col">{{$categorie->category_name}}</th>
                        <th scope="col">{{$categorie->user->name}}</th>
                        <th scope="col">{{$categorie->created_at->diffForHumans()}}</th>
                        <th scope="col">
                            <a href="{{url('edit-categorie/'.$categorie->id)}}" class="btn btn-info">Modifier</a>
                            <a href="{{url('SoftDele-categorie/'.$categorie->id)}}" class="btn btn-danger">Supprimer</a>
                        </th>
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{$categories->links()}}
        </div>
        </div>

        <div class="col-md-4">
            <div class="card">
          <div class="card-header"> Ajouter une catégorie</div>
          <div class="card-body">  
            <form class="row g-3" action=" {{route('store.categorie')}}" method="POST">
               @csrf
                  <label for="validationDefault01" class="form-label">Nom</label>
                  <input type="text" class="form-control" name="category_name" id="validationDefault01">
                @error('category_name')
                            <span style="color:red;"> {{$message}} </span>
                @enderror
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
              </form>
          </div>
        
         </div>
        </div>

        </div>
        <br><br>
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
              <div class="card-header"> les categories Supprimés</div>
          
      <table class="table">
          <thead>
             
              <tr>
                  <th scope="col">numero</th>
                  <th scope="col">Nom de la catégorie</th>
                  <th scope="col">User</th>
                  <th scope="col">Date de création</th>
                  <th scope="col">Action</th>
              </tr>
             
            
          </thead>
          <tbody>             
                  @php($i =1)
                  @foreach ($trashCat as $categorie)
                  <tr>
                      <th scope="col">{{$i++}}</th>
                      <th scope="col">{{$categorie->category_name}}</th>
                      <th scope="col">{{$categorie->user->name}}</th>
                      <th scope="col">{{$categorie->created_at->diffForHumans()}}</th>
                      <th scope="col">
                          <a href="{{url('restaurer-categorie/'.$categorie->id)}}" class="btn btn-info">Restaurer</a>
                          <a href="{{url('supprimer-categorie/'.$categorie->id)}}" class="btn btn-danger">P Supprimer</a>
                      </th>
                     
                  </tr>
                  @endforeach
          </tbody>
        </table>
        {{$categories->links()}}
      </div>
      </div>
        </div>
      </div>
    </div>
</x-app-layout>
