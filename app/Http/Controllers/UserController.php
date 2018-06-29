<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index() {
        //Get all users and pass it to the view
        $users = User::all();
        return view('layouts.admin.user.index')->with('users', $users);
    }

    public function create() {
        //Get all roles and pass it to the view
        $roles = Role::get();
        return view('layouts.admin.user.create', ['roles'=>$roles]);
    }

    public function store(Request $request) {
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'roles' => 'present|array'
        ]);

        $user = User::createNew($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        //Redirect to the users.index view and display message
        return redirect()->route('user.index')
            ->with('flash_message',
                'User successfully added.');
    }

    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::select(['id','name'])->get(); //Get all roles

        return view('layouts.admin.user.edit', compact('user', 'roles')); //pass user and roles data to view

    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed',
            'roles' => 'present|array'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('user.index')
            ->with('flash_message',
                'User successfully edited.');
    }
    public function delete($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('flash_message',
                'User successfully deleted.');
    }

    public function destroy($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
