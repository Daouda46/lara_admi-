@extends("../admin/admin_master")

@section("admin") 


    <div class="py-12 mt-12">
      <div class="container">
        <br><br>
          <div class="row">
              <div class="col-md-8">
                <div class="card-group">

                    @foreach ($images as $item)
                    <div class="col-md-3 mt-4">

                        <div class="card">
                            <img src=" {{asset($item->image)}} " alt="" height="60px;" >
                        </div>
                    </div>
                    @endforeach
                </div>
              </div>

        <div class="col-md-4">
            <div class="card">
          <div class="card-header"> Add multi Image</div>
          <div class="card-body">  
            <form class="row g-3" action=" {{route('image.store')}} " method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">

                   <label for="validationDefault01" class="form-label">Multi Image</label>
                   <input type="file" class="form-control" name="image[]" id="validationDefault01" multiple="">
                   @error('image')
                   <span style="color:red;"> {{$message}} </span>
                    @enderror
               </div>
                  
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Add images</button>
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