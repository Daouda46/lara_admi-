<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... <b>{{ Auth::user()->name }}</b>
            <b style="float:right;">Total users: 
                <span class="btn btn-danger"> {{count($users)}} </span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">numero</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Date de création</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    
               
              <tr>
                <th scope="row">{{$incre++}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
</x-app-layout>
