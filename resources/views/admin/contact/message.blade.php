@extends("../admin/admin_master")

@section("admin") 

    <div class="py-12">
      <div class="container">
          
        <h4>Message For Admin</h4>
        {{-- <a href=" {{route('add.admin.message')}} "><button class="btn btn-success">Ajouter</button></a> --}}
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                @if(session('success'))
                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
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

                <div class="card-header"> All message</div>
            
        <table class="table">
            <thead>
               
                <tr>
                    <th width="5%" scope="col">numero</th>
                    <th width="10%" scope="col">Name</th>
                    <th width="20%" scope="col">Email</th>
                    <th width="20%" scope="col">Subject</th>
                    <th width="30%" scope="col">Message</th>
                    {{-- <th width="30%" scope="col">Date de création</th> --}}
                    <th width="20%"  >Action</th>
                </tr>
               
              
            </thead>
            <tbody>             
                    @php($i =1)
                    @foreach ($messages as $msg)
                    <tr>
                        <td  scope="col">{{$i++}}</td>
                        <td scope="col">{{$msg->name}}</td>
                        <td scope="col">{{$msg->email}}</td>
                        <td  scope="col">{{$msg->subject}}</td>
                        <td scope="col">{{$msg->message}}</td>
                        {{-- <td scope="col">{{$msg->created_at->diffForHumans()}}</td> --}}
                        <td>
                            <a href="{{url('delete-admin-message/'.$msg->id)}}" onclick="return confirm('Etres vous sûre de vouloir supprimé :?')" class="btn btn-danger">Supprimer</a>
                        </td>
                        
                       
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{-- {{$messages->links()}} --}}
        </div>
        </div>


        </div>
        <br><br>
       
      </div>
    </div>
@endsection