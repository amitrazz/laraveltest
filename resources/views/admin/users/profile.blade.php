@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> profile </div>
        <div class="panel panel-body">
           
                <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{asset($user->profile->avator)}}" height="250px" width="250px" style="border-radius:50%">
                        </div>
                        <label for="usr">avatar:</label>
                        
                        <input type="file" name="avator" class="form-control" id="usr">
                    </div>
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                          <label for="usr">Email:</label>
                          <input type="email" name="email" value="{{$user->email}}" class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">New password:</label>
                          <input type="password" name="password"  class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">About you:</label>
                          <textarea name="about" rows="5" cols="50" class="form-control" id="usr">{{$user->profile->about}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="usr">facebook:</label>
                          <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Youtube:</label>
                          <input type="text" name="youtube"  value="{{$user->profile->youtube}}" class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">linkedin:</label>
                          <input type="text" name="linkedin" value="{{$user->profile->linkedin}}" class="form-control" id="usr">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-default">Update</button>
                      </div>
                    </form>
        </div>
      </div>
  @stop
  