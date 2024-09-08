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
            <form action="{{ route('e-shopping.product.update', $product->id) }}" method="POST" class="row g-3 m-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="name" class="form-label">Name Product</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name product" value="{{ $product->name }}">
                    @error('name')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" name="reference" class="form-control" id="reference" placeholder="Enter reference" value="{{ $product->reference }}">
                    @error('reference')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="buying_price" class="form-label">Buying Price</label>
                    <input type="number" name="buying_price" class="form-control" id="buying_price" placeholder="Enter buying price" min="0" value="{{ $product->buying_price }}">
                    @error('buying_price')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="selling_price" class="form-label">Selling Price</label>
                    <input type="number" name="selling_price" class="form-control" id="selling_price" placeholder="Enter selling price" min="0" value="{{ $product->selling_price }}">
                    @error('selling_price')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image" accept="image/*" >
                    @error('image')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description " id="description" >{{ $product->description }}</textarea>
                    @error('description')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    @foreach($attributes as $attribute)
                    <div class="col-md-6">
                        <h4>{{ $attribute->name }}</h4>

                        @foreach($attribute->AttributeValue as $value)
                            <div class="form-check">
                                <input class="form-check-input"
                                    type="checkbox"
                                    id="value-{{ $value->id }}"
                                    name="attributes[{{ $attribute->id }}][]"
                                    value="{{ $value->id }}"
                                    {{ isset($productAttributes[$attribute->id]) && in_array($value->id, $productAttributes[$attribute->id]->pluck('value_id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="value-{{ $value->id }}">
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Added</button>

                <div class="">
                    <img src="{{ asset($product->image) }}" width="400" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection








