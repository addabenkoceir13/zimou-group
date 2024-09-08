<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AddUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    public function index()
    {
        $users = $this->users->all();
        return view('admin.User.index', compact('users'));
    }

    public function create(AddUserRequest $request)
    {
        $user = $this->users->create($request->all());

        toastr()->success('created user successfully');

        return redirect()->back();
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->users->update($request->id, $request->all());

        toastr()->success('updated user successfully');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user = $this->users->delete($id);
        toastr()->success('deleted user successfully');
        return redirect()->back();
    }
}
