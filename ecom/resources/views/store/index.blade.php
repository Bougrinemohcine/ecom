@extends('base')
@section('title','Products')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Product list</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
</div>
<div class="row">
    @foreach ($products as $item)
        <div class="card" style="width: 18rem;margin-right:20px">
            <span class="badge bg-primary">{{$item->price}} MAD</span>
            <img class="card-img-top"width="100px" src="{{ asset($item->image) }}" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{!! $item->description !!}}</p>
                <hr>
                Quantity : <span class="badge bg-success">{{$item->quantity}}</span>
            </div>
        </div>
    @endforeach
</div>
@endsection
