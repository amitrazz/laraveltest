@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> Post Updating : {{$post->title}} </div>
        <div class="panel panel-body">
           
                <form action="{{route('post.update',['id'   =>  $post->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="usr">Title:</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                                <label for="usr">Select Category:</label>
                                <Select name="category_id" class="form-control">
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}"
                                            
                                            @if ($category->id == $post->category_id)
                                                 Selected
                                            @endif 
                                        >{{$category->name}}</option>
                                    @endforeach
                                </Select>
                            </div>
                            <div class="form-group">
                                    <div class="checkbox">
                                        <label for="tags">Tags: </label>
                                        @foreach ($tags as $tag )
                                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                            @foreach ($post->tags as $t )
                                                @if ($tag->id == $t->id)
                                                    checked
                                                @endif
                                            @endforeach
                                           > {{$tag->tag}}
                                        </label>
                                        @endforeach
                                        
                                    </div>
                            <div class="form-group">
                                <label for="usr">Featured Image</label><br>
                                <img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="90px">
                                <input type="file" name="featured" class="form-control" id="usr">
                            </div>
                        <div class="form-group">
                            <label for="comment">Content:</label>
                            <textarea class="form-control" name="content" rows="5" id="summernote">{{$post->content}}</textarea>
                        </div>
                       <button type="submit" class="btn btn-default">Submit</button>
                    </form>
        </div>
      </div>
  @stop
   
  @section('style')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  @stop
  @section('script')
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
      });
  </script>
  @stop
  