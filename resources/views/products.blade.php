@extends('templates.index')

@section('title', 'Product - List')

@section('header')
<h1>Product <small><span class="label label-info">List</span></small></h1>
@endsection

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-xs-4">Name</th>
            <th class="col-xs-4">Price</th>
            <th class="col-xs-4 text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value)
        <tr>
            <td class="col-xs-4">{{ $value['name'] }}</td>
            <td class="col-xs-4"><i><small>${{ number_format($value['price'], 2, '.', ',') }}</small></i></td>
            <td class="col-xs-4 text-center">
                <a class="btn btn-xs btn-success" href="{{ url('/product-update/'.$value['id']) }}"><i class="glyphicon glyphicon-edit"></i> Update</a>
                <a class="btn btn-xs btn-danger" href="{{ url('/product-delete/'.$value['id']) }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
