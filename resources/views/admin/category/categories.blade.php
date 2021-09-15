@extends('admin.base')


@section('content')
    <div class="container-fluid">
        <div class="container">
            <a href="{{route('category.create')}}" class="btn btn-success">Add Category</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>description</th>
                <th>parent_id</th>
                <th>action</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->cat_title}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>
                        <form action="{{route('category.destroy',['category'=>$category->id])}}" method="POST">
                            @method("delete")
                            @csrf
                            <input type="submit" class="btn btn-danger" value="X">
                        </form>
                        <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection