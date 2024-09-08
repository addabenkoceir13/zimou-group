@extends('layouts.admin.include')

@section('title', 'New Attribute ')

@section('title-section', 'New Attribute')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <form action="{{ route('dashboard.attribute.store') }}" method="POST" class="row g-2">
            @csrf
            <div class="row">
                <div class="col-sm-6 col-md-6 form-group mb-2">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" autofocus class="form-control  @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter Name" value="{{ old('name') }}" >
                    @error('name')
                        @php
                            toastr()->error($message);
                        @endphp
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary">Added</button>
            </div>
        <form>
    </div>
</div>
@endsection
