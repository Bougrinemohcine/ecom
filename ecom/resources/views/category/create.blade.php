@extends('base')
@section('title', $isUpdate ? 'Update Category' : 'create Category')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{$isUpdate ? route('category.update',$category->id) : route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($isUpdate)
            @method('PUT')
        @endif
        <div class="mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="name" aria-label="name" name="name" value="{{old('name',$category->name ?? '')}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary"> {{$isUpdate ? 'edit' : 'Submit' }}</button>
    </form>
@endsection
