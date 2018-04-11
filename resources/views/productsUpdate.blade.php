@extends('templates.index')

@section('title', 'Product - Update')

@section('header')
<h1>Product <small><span class="label label-info">Update</span></small></h1>
@endsection

@section('content')
<form action="/product-update/{{$id}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" placeholder="eg: Chair" name="name" value="{{$name}}" required />
    </div>
    <div class="form-group">
        <label for="price">Price : </label>
        <input type="number" class="form-control" placeholder="eg: 399.99" name="price" min="0" step="any" data-bind="value:price" value="{{ number_format($price, 2, '.', '') }}" required/>
    </div>
    <div class="text-center">
        <a class="btn btn-danger pull-left" href="{{ url('/') }}"><i class="glyphicon glyphicon-triangle-left"></i> Back</a>
        <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-send"></i> Submit</button>
    </div>
</form>
@endsection
