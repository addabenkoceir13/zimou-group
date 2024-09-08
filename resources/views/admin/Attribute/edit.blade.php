@extends('layouts.admin.include')

@section('title', 'Edit Attribute ')

@section('title-section', 'Edit Attribute')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <form action="{{ route('dashboard.attribute.update', $attribute->id) }}" method="POST" class="row g-2">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6 col-md-6 form-group mb-2">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" autofocus class="form-control  @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter Name" value="{{ $attribute->name }}" >
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
