@extends('layouts.app')
  @section('content')
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @if($posts->count() >  0)
      @foreach ($posts as $post)
      <tr>
          <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="90px"></td>
          <td>{{$post->title}}</td>
          <td><a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-info btn-sm">Edit</a></td>
          <td><a href="{{route('post.restore',['id' => $post->id])}}" class="btn btn-success btn-sm">Restore</a></td>
          <td><a href="{{route('post.kill',['id' => $post->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
      @endforeach
     @else
          <tr>
            <th colspan="5" class="text-center">No Trashed Post</th>
          </tr>
     @endif
      
    </tbody>
  </table>
  @stop