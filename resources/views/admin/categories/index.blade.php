@extends('layouts.app')
  @section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Categories</div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
  @if($categories->count() > 0)
  @foreach ($categories as $category)
  <tr>
      <td>{{$category->name}}</td>
      <td><a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger">X</a></td>
     </tr>
  @endforeach
  @else
     <tr>
       <th colspan="5" class="text-center">
         No categories avillable
       </th>
     </tr>
  @endif
      
    </tbody>
  </table>
  @stop