@extends('layouts.app')
  @section('content')
  <div class="panel panel-default">
      <div class="panel-heading">posts</div>
    </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Baner Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Trash</th>
      </tr>
    </thead>
    <tbody>
     @if($posts->count()  > 0)
        @foreach ($posts as $post)
        <tr>
            <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="90px"></td>
            <td>{{$post->title}}</td>
            <td><a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-default btn-sm"> Edit</a></td>
            <td><a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-danger btn-sm">Trash</a></td>
            </tr>
        @endforeach
     @else
            <tr>
              <th class="text-center"> There is no posts for view!</th>
            </tr>
     @endif
      
    </tbody>
  </table>
  @stop