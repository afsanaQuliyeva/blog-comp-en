@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
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
                            <th>Deleted at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($deletedCategories as $category)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->deleted_at->diffForHumans() }}</td>
                                <td>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Permenantly delete</button>
                                    </form>
                                    <a href="{{route('categories.restore', $category->id)}}" class="btn btn-info">Restore</a>
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
