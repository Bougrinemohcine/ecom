@extends('base')
@section('title', $isUpdate ? 'Update Product' : 'create Products')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{$isUpdate ? route('products.update',$product->id) : route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($isUpdate)
            @method('PUT')
        @endif
        <div class="mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="name" aria-label="name" name="name" value="{{old('name',$product->name)}}">
            </div>
            <div class="input-group">
                <span class="input-group-text">Description</span>
                <input class="form-control" aria-label="With textarea" name="description" value="{{old('description',$product->description)}}"></input>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Quantity</span>
                <input type="number" class="form-control" aria-label="Quantity" min="0" name="quantity" value="{{old('quantity',$product->quantity)}}">
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="image">
                <label class="input-group-text" for="inputGroupFile02" name="image" >Upload</label>
            </div>
            @if ($product->image)
                <img width="100px" src="{{ asset($product->image) }}" alt="Product Image">
            @endif
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <span class="input-group-text">0.00</span>
                <input type="text" class="form-control" name="price" aria-label="Dollar amount (with dot and two decimal places)" value="{{old('price',$product->price)}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
