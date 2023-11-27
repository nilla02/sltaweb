<?php

namespace App\Http\Controllers;

use App\Models\Collector;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use CreateRolesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends AdminsController
{
    public function index()
    {
        $property = Property::select('ownerName', 'ownerPosition', 'ownerEmail', 'managerName', 'managerPosition', 'managerEmail', 'accountantName', 'accountantPosition', 'accountantEmail', 'primaryContactName', 'primaryContactPosition', 'primaryContactEmail')->where('id', $this->property_id())->first();

        if (Auth::user()->email == $property->ownerEmail) {
            $property->ownerEmail = Null;
        }
        if (User::where('email', $property->ownerEmail)->exists()) {
            $property->ownerEmail = Null;
        }

        if (Auth::user()->email == $property->managerEmail) {
            $property->managerEmail = Null;
        }

        if (User::where('email', $property->managerEmail)->exists()) {
            $property->managerEmail = Null;
        }

        if (Auth::user()->email == $property->accountantEmail) {
            $property->accountantEmail = Null;
        }

        if (User::where('email', $property->accountantEmail)->exists()) {
            $property->accountantEmail = Null;
        }

        if (Auth::user()->email == $property->primaryContactEmail) {
            $property->primaryContactEmail = Null;
        }

        if (User::where('email', $property->primaryContactEmail)->exists()) {
            $property->primaryContactEmail = Null;
        }

        if ($property->ownerEmail == Null and $property->managerEmail == Null and $property->accountantEmail == Null and $property->primaryContactEmail == Null) {
            $property->remove = 1;
        } else {
            $property->remove = 0;
        }

        $roles = Role::all();

        $user = User::with('properties')->where('id', Auth::id())->first();
        $properties = $user->properties;

        return view('admin.user.create', ['property' => $property, 'properties' => $properties, 'roles' => $roles]);
    }

    public function create(Request $request)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users']
        ]);

        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $inputs['password'] = Hash::make(request('password'));

        if ($request->new == 'owner') {
            $userinfo = Property::select('ownerName', 'ownerPosition', 'ownerEmail')->where('id', $this->property_id())->first();
            $inputs['fullname'] = $userinfo->ownerName;
            $inputs['position'] = $userinfo->ownerPosition;
            $inputs['email'] = $userinfo->ownerEmail;
        }
        if ($request->new == 'manager') {
            $userinfo = Property::select('managerName', 'managerPosition', 'managerEmail')->where('id', $this->property_id())->first();
            $inputs['fullname'] = $userinfo->managerName;
            $inputs['position'] = $userinfo->managerPosition;
            $inputs['email'] = $userinfo->managerEmail;
        }
        if ($request->new == 'accountant') {
            $userinfo = Property::select('accountantName', 'accountantPosition', 'accountantEmail')->where('id', $this->property_id())->first();
            $inputs['fullname'] = $userinfo->accountantName;
            $inputs['position'] = $userinfo->accountantPosition;
            $inputs['email'] = $userinfo->accountantEmail;
        }
        if ($request->new == 'primary') {
            $userinfo = Property::select('primaryContactName', 'primaryContactPosition', 'primaryContactEmail')->where('id', $this->property_id())->first();
            $inputs['fullname'] = $userinfo->primaryContactName;
            $inputs['position'] = $userinfo->primaryContactPosition;
            $inputs['email'] = $userinfo->primaryContactEmail;
        }

        $inputs['accepted'] = 1;

        $newUser = User::create($inputs);
        $collector = Collector::create($inputs);

        $user = User::with('properties')->where('id', Auth::id())->first();
        foreach ($user->properties as $property) {
            $name = $property->name;
            $name = str_replace(' ', '_', $name);
            if (isset($request->$name)) {
                $property = Property::where('id', $request->$name)->first();
                $newUser->properties()->save($property);
                $collector->properties()->save($property);
            }
        }

        $roles = Role::all();
        foreach ($roles as $role) {
            $name = $role->name;
            $name = str_replace(' ', '_', $name);
            if (isset($request->$name)) {
                $newUser->roles()->save($role);
                $collector->roles()->save($role);
            }
        }

        session()->flash('created', $inputs['fullname'] . ' account is created');

        return back();
    }

    public function create2(Request $request)
    {
        $inputs = request()->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'position' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $inputs['password'] = Hash::make(request('password'));
        $inputs['accepted'] = 1;


        $newUser = User::create($inputs);
        $collector = Collector::create($inputs);

        $user = User::with('properties')->where('id', Auth::id())->first();
        foreach ($user->properties as $property) {
            $name = $property->name;
            $name = str_replace(' ', '_', $name);
            if (isset($request->$name)) {
                $property = Property::where('id', $request->$name)->first();
                $newUser->properties()->save($property);
                $collector->properties()->save($property);
            }
        }

        $roles = Role::all();
        foreach ($roles as $role) {
            $name = $role->name;
            $name = str_replace(' ', '_', $name);
            if (isset($request->$name)) {
                $newUser->roles()->save($role);
                $collector->roles()->save($role);
            }
        }
    }

    public function show(User $user)
    {
        return view('admin.user.profile', ['user' => $user]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'position' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        if (request('password')) {
            request()->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            $inputs['password'] = Hash::make(request('password'));
        }

        session()->flash('status', "Your account has been updated");

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user)
    {

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');

        return back();
    }
}
