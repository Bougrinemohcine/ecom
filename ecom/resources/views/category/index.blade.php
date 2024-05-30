@extends('base')
@section('title','Category')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Product list</h1>
    <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($category as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>

                    <td>
                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary btn-sm">Update</a>
                        <form action="{{ route('category.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" align="center"><h6>No category.</h6></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$category->links()}}
@endsection
