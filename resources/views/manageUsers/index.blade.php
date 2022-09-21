@extends('layouts.myapp')

@section('content')

<div class="container ">
    <div class="row">
      <div class="col">
       <div class="jumbotron">
           <h2 class="display-4">  users Management</h2>
       </div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col">
        <table  class="table table-dark table-striped">
            <thead >
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
        @foreach ($users as $item)


              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role}}</td>
                <td> <a class="btn btn-primary" href="{{route('users.edit',$item->id)}}">edit</a>
                    <a class="btn btn-danger" href="{{route('users.destroy', $item->id)}}">delete</a>
                </td>


              </tr>
        @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection
