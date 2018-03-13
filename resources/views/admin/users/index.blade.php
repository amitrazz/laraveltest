@extends('layouts.app')
  @section('content')
  <div class="panel panel-default">
      <div class="panel-heading">Users</div>
    </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Profile Picture</th>
        <th>Name</th>
        <th>Admin</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @if($users->count()  > 0)
        @foreach ($users as $user)
        <tr>
            <td><img src="{{asset($user->profile->avator)}}" alt="{{$user->name}}" width="90px" height="90px" style="border-radius:50%"></td>
            <td>{{$user->name}}</td>
            <td>
              @if($user->admin)

              @if(Auth::id()  !== $user->id)
              <a href="{{route('user.not.admin',['id'=>$user->id])}}" class="btn btn-danger">Remove</a>
              @endif
              @else
             <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success">Make</a>

              @endif
            </td>
            @if(Auth::id()  !== $user->id)
            <td><a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-success">Delete</a></td>
            @endif
            </tr>
        @endforeach
     @else
            <tr>
              <th class="text-center"> There is no User to Show !</th>
            </tr>
     @endif
      
    </tbody>
  </table>
  @stop