@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Article</h3>
                </div>

                <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value= "{{old('title')}}" class="form-control" id="title" placeholder="Enter article title" name="title">
                            @error('title')
                             <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter article description" name="desc" rows="5">{{old('desc')}}</textarea>
                            @error('desc')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Content</label>
                            <textarea class="form-control" id="content" placeholder="Enter article" name="content" rows="10">{{old('content')}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="category">Categories</label>
                            <select name="categories[]" id="" class="form-control" multiple>
                                @foreach($categories as $category)
                                     <option value="{{$category->id}}"
                                     {{is_array(old('categories')) && in_array($category->id, old('categories')) ? 'selected' : ''}}
                                     >
                                         {{$category->category_name}}
                                     </option>
                                @endforeach
                            </select>
                            @error('categories')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" >
                            @error('image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
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
