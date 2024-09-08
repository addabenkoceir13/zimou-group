<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="id" name="id" class="form-control" value="{{ $user->id }}">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit user profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" autofocus
                                class="form-control  @error('username') is-invalid @enderror" id="username"
                                name="username" value="{{ $user->username }}">
                            @error('username')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter new password">
                            @error('password')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                value="{{ $user->status }}">
                                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="role">Status</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role"
                                value="{{ $user->role }}">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                            @error('role')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Modify</button>
                </div>
            </div>
        </form>
    </div>
</div>
