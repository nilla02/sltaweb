<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminProperty;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Collector;
use App\Models\CollectorRole;
use App\Models\Property;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'tradeName' => ['required', 'string', 'max:255'],
            'vatTaxpayerAccount' => ['required', 'string', 'max:255'],
            'Location' => ['required', 'string', 'max:255'],
            'mailingAddress' => ['required', 'string', 'max:255'],
            'noOfRooms' => ['required', 'integer', 'max:10000'],
            'typeOfProperty' => ['required', 'string', 'max:255'],
            'OtherName' => ['required_if:typeOfProperty,Other'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerPosition' => ['required', 'string', 'max:255'],
            'ownerEmail' => ['required', 'string', 'email', 'max:255'],
            'managerName' => ['required', 'string', 'max:255'],
            'managerPosition' => ['required', 'string', 'max:255'],
            'managerEmail' => ['required', 'string', 'email', 'max:255'],
            'accountantName' => ['required', 'string', 'max:255'],
            'accountantPosition' => ['required', 'string', 'max:255'],
            'accountantEmail' => ['required', 'string', 'email', 'max:255'],
            'primaryContactName' => ['required', 'string', 'max:255'],
            'primaryContactPosition' => ['required', 'string', 'max:255'],
            'primaryContactEmail' => ['required', 'string', 'email', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'applicableClassAndRate' => ['required', 'integer', 'max:4'],
            'vat' => ['required', 'mimes:pdf,docx,doc', 'max:5048'],
            'coi-cogs' => ['required', 'mimes:pdf,docx,doc', 'max:5048'],
            'business' => ['required', 'mimes:pdf,docx,doc', 'max:5048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $newVatName = time() . '-vat-' . $data['name'] . '.' .
            $data['vat']->extension();

        $data['vat']->move(public_path('docs'), $newVatName);
        Storage::disk('ftp')->put($newVatName, fopen(public_path('docs\\') . $newVatName, 'r+'));

        $newcoicogsName = time() . '-coi-cogs-' . $data['name'] . '.' .
            $data['coi-cogs']->extension();

        $data['coi-cogs']->move(public_path('docs'), $newcoicogsName);
        Storage::disk('ftp')->put($newcoicogsName, fopen(public_path('docs\\') . $newcoicogsName, 'r+'));

        $newbusinessName = time() . '-business-' . $data['name'] . '.' .
            $data['business']->extension();

        $data['business']->move(public_path('docs'), $newbusinessName);
        Storage::disk('ftp')->put($newbusinessName, fopen(public_path('docs\\') . $newbusinessName, 'r+'));

        $newGovernmentId = time() . '-government_id-' . $data['name'] . '.' .
            $data['government_id']->extension();

        $data['government_id']->move(public_path('docs'), $newGovernmentId);
        Storage::disk('ftp')->put($newGovernmentId, fopen(public_path('docs\\') . $newGovernmentId, 'r+'));

        $newsigned = time() . '-signed-' . $data['name'] . '.' .
            $data['signature']->extension();

        $data['signature']->move(public_path('docs'), $newsigned);
        Storage::disk('ftp')->put($newsigned, fopen(public_path('docs\\') . $newsigned, 'r+'));

        User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'position' => $data['position'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (DB::table('users')->select('id')->orderBy('id', 'desc')->limit(1)->exists()) {
            $user = DB::table('users')->select('id')->orderBy('id', 'desc')->limit(1)->first();
            $id = $user->id;
        } else {
            $id = 1;
        }

        $collector = new Collector([
            'id' => $id,
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'position' => $data['position'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $collector->save();

        if ($data['typeOfProperty'] == 'Other') {
            $data['typeOfProperty'] = $data['OtherName'];
        }

        $property = new Property([
            'name' => $data['name'],
            'tradeName' => $data['tradeName'],
            'vatTaxpayerAccount' => $data['vatTaxpayerAccount'],
            'Location' => $data['Location'],
            'mailingAddress' => $data['mailingAddress'],
            'noOfRooms' => $data['noOfRooms'],
            'typeOfProperty' => $data['typeOfProperty'],
            'ownerName' => $data['ownerName'],
            'ownerPosition' => $data['ownerPosition'],
            'ownerEmail' => $data['ownerEmail'],
            'managerName' => $data['managerName'],
            'managerPosition' => $data['managerPosition'],
            'managerEmail' => $data['managerEmail'],
            'accountantName' => $data['accountantName'],
            'accountantPosition' => $data['accountantPosition'],
            'accountantEmail' => $data['accountantEmail'],
            'primaryContactName' => $data['primaryContactName'],
            'primaryContactPosition' => $data['primaryContactPosition'],
            'primaryContactEmail' => $data['primaryContactEmail'],
            'applicableClassAndRate' => $data['applicableClassAndRate'],
            'vat' => $newVatName,
            'coicogs' => $newcoicogsName,
            'business' => $newbusinessName,
            'government_id' => $newGovernmentId,
            'signed' => $newsigned,
        ]);

        $user = User::find($id);
        $user->properties()->save($property);

        $roles = Role::all();
        foreach ($roles as $role) {
            $user->roles()->save($role);
        }

        $property = new AdminProperty([
            'name' => $data['name'],
            'tradeName' => $data['tradeName'],
            'vatTaxpayerAccount' => $data['vatTaxpayerAccount'],
            'Location' => $data['Location'],
            'mailingAddress' => $data['mailingAddress'],
            'noOfRooms' => $data['noOfRooms'],
            'typeOfProperty' => $data['typeOfProperty'],
            'ownerName' => $data['ownerName'],
            'ownerPosition' => $data['ownerPosition'],
            'ownerEmail' => $data['ownerEmail'],
            'managerName' => $data['managerName'],
            'managerPosition' => $data['managerPosition'],
            'managerEmail' => $data['managerEmail'],
            'accountantName' => $data['accountantName'],
            'accountantPosition' => $data['accountantPosition'],
            'accountantEmail' => $data['accountantEmail'],
            'primaryContactName' => $data['primaryContactName'],
            'primaryContactPosition' => $data['primaryContactPosition'],
            'primaryContactEmail' => $data['primaryContactEmail'],
            'applicableClassAndRate' => $data['applicableClassAndRate'],
            'vat' => $newVatName,
            'coicogs' => $newcoicogsName,
            'business' => $newbusinessName,
            'government_id' => $newGovernmentId,
            'signed' => $newsigned,
        ]);

        $collector->properties()->save($property);

        $roles = CollectorRole::all();
        foreach ($roles as $role) {
            $collector->roles()->save($role);
        }

        return $user;
    }
}
