@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="mt-3 mb-3">
                <a class="btn btn-info" href="{{route('articles.create')}}">Add article</a>
                <a href="" class="btn btn-dark">Trash</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Article title</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @php($no = 1)--}}
                        @foreach($articles as $article)
                            <tr>
{{--                                <td>{{ $no++ }}</td>--}}
                                <td>{{$articles->firstItem() + $loop->index }}</td>
                                <td>{{ $article->title }}</td>
                                <td>
                                    {{ $article->desc }}
                                </td>
                                <td>{{$article->slug}}</td>
                                <td>
                                    <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                                </td>
                                <td>
                                    <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{$articles->links()}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </section>
    </div>
@endsection
