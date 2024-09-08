
@extends('layouts.user.include')
@section('title', 'Products')

@section('title-section', 'Products')
@section('content')
<div class="container-fluid py-4">
    <div class="card my-4">
        <div>
            <a class="btn btn-outline-primary" href="{{ route('e-shopping.product.create') }}">
                Add New Product
            </a>
        </div>
        <div class="card-body px-0 pb-2">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Reference</th>
                            <th>Buying Price</th>
                            <th>Selling Price</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Reference</th>
                            <th>Buying Price</th>
                            <th>Selling Price</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product )
                            <tr>
                                <td>{{ $product->user->username }}</td>
                                <td>{{ $product->name }}</td>
                                {{-- <td>{{ $product->reference }}</td> --}}
                                <td>
                                    @foreach ($product->productreference as $value)
                                        <span>{{ $value->reference }}</span><br>
                                    @endforeach
                                </td>
                                <td>{{ $product->buying_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-success " href="{{ route('e-shopping.product.show', $product->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary " href="{{ route('e-shopping.product.edit', $product->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="javascript:void(0);"
                                        data-bs-toggle="modal" data-bs-target="#deleteProductModal{{ $product->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('user.product.deleted')
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
