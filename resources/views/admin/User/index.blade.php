@extends('layouts.admin.include')

@section('title', 'Users')

@section('title-section', 'Users')

@section('content')
<div class="card mb-4">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toastr()->error($error)
            @endphp
        @endforeach
    @endif
    <div class="card-body">
        <div class="my-2">
            <a class="btn btn-outline-dark" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addUserModal">
                New User <i class="mx-2 fas fa-user-plus"></i>
            </a>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user )
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role === 'admin')
                                <span class="badge text-bg-primary">Admin</span>
                            @else
                                <span class="badge text-bg-secondary">User</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->status === 'active')
                                <span class="badge text-bg-success">Active</span>
                            @else
                                <span class="badge text-bg-warning">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a class="btn btn-primary " href="javascript:void(0);"
                                data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                                <i class="far fa-edit"></i>
                            </a>
                            @if ($user->role === 'user')
                                <a class="btn btn-danger" href="javascript:void(0);"
                                    data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                                    <i class="fas fa-user-times"></i>
                                </a>
                            @endif

                        </td>
                    </tr>
                    @include('admin.User.add')
                    @include('admin.User.edit')
                    @include('admin.User.deleted')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
