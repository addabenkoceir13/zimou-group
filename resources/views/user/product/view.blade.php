@extends('layouts.user.include')

@section('title', 'Products')

@section('title-section', 'Products')

@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            toastr()->error($error)
        @endphp
    @endforeach
@endif
<div class="container-fluid py-4">
    <div class="card my-4">
        <div class="card-body px-0 pb-1">
            <form action="" method="POST" class="row g-3 m-3">

                <div class="col-md-6">
                    <label for="name" class="form-label">Name Product</label>
                    <input type="text" name="name" class="form-control"  value="{{ $product->name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" name="reference" class="form-control" value="{{ $product->reference }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="buying_price" class="form-label">Buying Price</label>
                    <input type="number" name="buying_price" class="form-control" value="{{ $product->buying_price }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="selling_price" class="form-label">Selling Price</label>
                    <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <img src="{{ asset($product->image) }}" width="300" />
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" disabled>{{ $product->description }}</textarea>
                </div>

                <div class="col-md-6 form-group">
                    <div class="attributes-section">
                        @foreach($productAttributes as $attributeId => $attributeGroup)
                            <div class="attribute-block">
                                <h4 class="">{{ $attributeGroup->first()->attribute_name }}</h4> <!-- Display attribute name -->

                                @foreach($attributeGroup as $attribute)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="value-{{ $attribute->value_id }}" checked disabled>
                                        <label class="form-check-label" for="value-{{ $attribute->value_id }}">
                                            {{ $attribute->value_name }} <!-- Display attribute value -->
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Reference</label>
                    @foreach ($product->productreference as $value)
                        <h4>{{ $value->reference }}</h4>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection







