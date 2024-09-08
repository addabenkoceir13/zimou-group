<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('dashboard.users.create') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add new user </h5>
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
                                name="username" placeholder="Enter Username" value="{{ old('username') }}">
                            @error('username')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter new password" value="{{ old('password') }}">
                            @error('password')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="password_confirmation">Password confirmation</label>
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Enter new Password confirmation">
                            @error('password_confirmation')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role">
                                <option value="">Choose Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group mb-2">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Added</button>
                </div>
            </div>
        </form>
    </div>
</div>
