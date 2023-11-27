<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class PropertyController extends AdminsController
{
    use AuthenticatesUsers;

    public function select()
    {
        $id = Auth::id();
        $user = User::with('properties')->where('id', $id)->first();
        if ($user->accepted != 1) {

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.AdminAccepted')],
            ]);

            // return view('auth.thanks');
        }

        $properties = $user->properties;

        foreach ($properties as $property) {
            $this->prefix($property);
            $this->suffix($property);
        }


        if (count($properties) == 0) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }

        if (Session::has('propertyCount')) {
            Session::forget('propertyCount');
        }
        Session::put('propertyCount', count($properties));

        if (count($properties) == 1) {

            foreach ($properties as $property) {
                $property = $property->id;
                return redirect()->route('admin.session', $property);
            }
        }

        return view('admin.select', ['properties' => $properties]);
    }

    public function session($property)
    {
        if (Session::has('propertyid')) {
            Session::forget('propertyid');
            Session::forget('propertyName');
        }
        Session::put('propertyid', $property);

        $property = Property::select('name')->where('id', $property)->first();

        Session::put('propertyName', $property->name);

        return redirect()->route('admin.index');
    }
}
