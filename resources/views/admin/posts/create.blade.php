@extends('layouts.app')
  @section('content')
  @include('admin.includes.errors')
  <div class="panel panel-default">
        <div class="panel panel-heading"> Create a new post </div>
        <div class="panel panel-body">
           
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="usr">Title:</label>
                            <input type="text" name="title" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                                <label for="usr">Select Category:</label>
                                <Select name="category_id" class="form-control">
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </Select>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>Tags: </label>
                                    @foreach ($tags as $tag )
                                    <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usr">Featured Image</label>
                                <input type="file" name="featured" class="form-control" id="usr">
                            </div>
                        <div class="form-group">
                            <label for="comment">Content:</label>
                            <textarea class="form-control" name="content" rows="5" id="summernote"></textarea>
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
  