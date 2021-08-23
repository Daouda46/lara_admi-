@extends("../admin/admin_master")

@section("admin") 

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
          <div class="card-header"> Edit brand</div>
          <div class="card-body">  
            <form class="row g-3" action=" {{url('update-brand/'.$brand->id)}} " method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
               <div class="form-group">

                <label for="validationDefault01" class="form-label">Brand Name</label>
                <input type="text" class="form-control" value=" {{$brand->brand_name}} " name="brand_name" id="validationDefault01">
                @error('brand_name')
                <span style="color:red;"> {{$message}} </span>
                 @enderror
            </div>
            <div class="form-group">

                <label for="validationDefault01" class="form-label">Brand Image</label>
                <input type="file" value=" {{$brand->brand_image}} " class="form-control" name="brand_image" id="validationDefault01">
                @error('brand_image')
                <span style="color:red;"> {{$message}} </span>
                 @enderror
            </div>
            <div class="form-group">
                <img src=" {{asset($brand->brand_image)}} " style="width: 70px;height:60px;" alt="">
            </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Modifier</button>
                </div>
              </form>
          </div>
        
         </div>
        </div>

        </div>
      </div>
    </div>
@endsection