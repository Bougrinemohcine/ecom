@extends('base')
@section('title','Products')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Product list</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($products as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{!! $item->quantity !!}}</td>
                    <td>
                        <img width="100px" src="{{ asset($item->image) }}" alt="Product Image">
                    </td>
                    <td>{{$item->price}}</td>
                    <td>
                        <a href="{{route('products.edit',$item->id)}}" class="btn btn-primary btn-sm">Update</a>
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" align="center"><h6>No products.</h6></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
