@extends('layouts.admin.include')

@section('title', 'Modify Attribute Value ')

@section('title-section', 'Modify Attribute Value')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <form action="{{ route('dashboard.attributevalue.update', $attributeValue->id) }}" method="POST" class="row g-2">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6 form-group mb-2">
                    <label for="attribute" class="form-label">Attribute</label>
                    <select class="form-control @error('attribute_id') is-invalid @enderror" name="attribute_id" >
                        <option value="{{ $attributeValue->attribute_id }}" selected>{{ $attributeValue->attribute->name }}</option>
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                    @error('attribute_id')
                        @php
                            toastr()->error($message);
                        @endphp
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-6 form-group mb-2">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" autofocus class="form-control  @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter Name" value="{{ $attributeValue->name }}" >
                    @error('name')
                        @php
                            toastr()->error($message);
                        @endphp
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Modify</button>
            </div>
        <form>
    </div>
</div>
@endsection
