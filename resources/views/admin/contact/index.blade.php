@extends("../admin/admin_master")

@section("admin") 

    <div class="py-12">
      <div class="container">
          
        <h4>Contact Home</h4>
        <a href=" {{route('add.admin.contact')}} "><button class="btn btn-success">Ajouter</button></a>
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

                <div class="card-header"> All Contact</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th width="5%" scope="col">numero</th>
                    <th width="30%" scope="col">Addresse</th>
                    <th width="20%" scope="col">Email</th>
                    <th width="20%" scope="col">Telephone</th>
                    {{-- <th width="30%" scope="col">Date de création</th> --}}
                    <th width="20%" colspan="2" >Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($contacts as $contact)
                    <tr>
                        <td  scope="col">{{$i++}}</td>
                        <td  scope="col">{{$contact->address}}</td>
                        <td scope="col">{{$contact->email}}</td>
                        <td scope="col">{{$contact->phone}}</td>
                        {{-- <td scope="col">{{$contact->created_at->diffForHumans()}}</td> --}}
                        <td>
                            <a  href="{{url('edit-admin-contact/'.$contact->id)}}" class="btn btn-info">Modifier</a>
                            <a href="{{url('delete-admin-contact/'.$contact->id)}}" onclick="return confirm('Etres vous sûre de vouloir supprimé :?')" class="btn btn-danger">Supprimer</a>
                        </td>
                        
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{-- {{$contacts->links()}} --}}
        </div>
        </div>


        </div>
        <br><br>
       
      </div>
    </div>
@endsection