<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
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
          <div class="card-header"> Modifier la catégorie</div>
          <div class="card-body">  
            <form class="row g-3" action="{{url('update-categorie/'.$categorie->id)}} " method="POST">
               @csrf
                  <label for="validationDefault01" class="form-label">Modification</label>
                  <input value="{{$categorie->category_name}}" type="text" class="form-control" name="category_name" id="validationDefault01">
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
      </div>
    </div>
</x-app-layout>
