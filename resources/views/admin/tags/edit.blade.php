@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> Update Tag : {{$tag->tag}} </div>
        <div class="panel panel-body">
           
                <form action="{{route('tag.update',['id'  =>  $tag->id])}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Tag:</label>
                            <input type="text" name="tag" value="{{$tag->tag}}"class="form-control">
                        </div>
                       <button type="submit" class="btn btn-default">Submit</button>
                    </form>
        </div>
      </div>
  @stop
  