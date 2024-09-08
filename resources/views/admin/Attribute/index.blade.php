@extends('layouts.admin.include')

@section('title', 'Attribute ')

@section('title-section', 'Attribute ')

@section('content')
<div class="card-body m-5">
    <div class="my-2">
        <a class="btn btn-outline-dark" href="{{ route('dashboard.attribute.create') }}">
            New Attribute <i class="mx-1 fas fa-plus-circle"></i>
        </a>
    </div>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($attributes as $attribute )
                <tr>
                    <td>{{ $attribute->id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a class="btn btn-primary " href="{{ route('dashboard.attribute.edit', $attribute->id) }}">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-danger" href="javascript:void(0);"
                            data-bs-toggle="modal" data-bs-target="#deleteAttributeModal{{ $attribute->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    </td>
                </tr>
                @include('admin.Attribute.deleted')
            @endforeach
        </tbody>
    </table>
</div>
@endsection
