@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> Create a new User </div>
        <div class="panel panel-body">
           
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" name="name" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                          <label for="usr">Email:</label>
                          <input type="email" name="email" class="form-control" id="usr">
                      </div>
                     
                      <div class="text-center">
                        <button type="submit" class="btn btn-default">Add User</button>
                      </div>
                    </form>
        </div>
      </div>
  @stop
  