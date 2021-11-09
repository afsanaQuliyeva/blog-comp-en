@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="mt-3 mb-3">
                <a class="btn btn-info" href="{{route('categories.create')}}">Add category</a>
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
                            <th>Category name</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                @if($category->created_at !== null)
                                    {{ $category->created_at->diffForHumans() }}
                                @else
                                    <span class="text-danger">{{ 'There is no info' }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                            </td>

                        </tr>
                        @endforeach

                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </section>
    </div>
@endsection
