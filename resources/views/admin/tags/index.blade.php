@extends('layouts.app')
  @section('content')
  <div class="panel panel-default">
    <div class="panel-heading">tags</div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tag</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
  @if($tags->count() > 0)
  @foreach ($tags as $tag)
  <tr>
      <td>{{$tag->tag}}</td>
      <td><a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{route('tag.delete',['id' => $tag->id])}}" class="btn btn-danger">X</a></td>
     </tr>
  @endforeach
  @else
     <tr>
       <th colspan="5" class="text-center">
         No tags avillable
       </th>
     </tr>
  @endif
      
    </tbody>
  </table>
  @stop