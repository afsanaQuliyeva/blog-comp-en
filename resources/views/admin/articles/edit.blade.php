@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Article</h3>
                </div>

                <form method="post" action="{{route('articles.update', $article->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $article->title)}}">
                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $article->slug)}}">
                            @error('slug')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{old('desc', $article->desc)}}</textarea>
                            @error('desc')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Article</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content', $article->content)}}</textarea>
                            @error('content')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div>
{{--                                <img src="{{$article->image}}" alt="">--}}
                                <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                                <input type="hidden" value="{{$article->image}}" name="old_image">
                            </div>
                            <label for="photo">Photo</label>
                            <input type="file" id="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="categories"  class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}"
                                        @if($article->getCategories->contains($category->id))
                                            {{'selected'}}
                                        @endif>
                                        {{$category->category_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </section>
    </div>


@endsection
