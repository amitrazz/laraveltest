@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> Create a new Category </div>
        <div class="panel panel-body">
           
                <form action="{{route('tag.store')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Tag:</label>
                            <input type="text" name="tag" class="form-control">
                        </div>
                       <button type="submit" class="btn btn-default">Submit</button>
                    </form>
        </div>
      </div>
  @stop
  