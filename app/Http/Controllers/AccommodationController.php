<?php

namespace App\Http\Controllers;

use App\Imports\AccommodationImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Accommodation;
use App\Models\AdminAccommodation;
use App\Models\Declaration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccommodationController extends AdminsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = Null)
    {
        $accommodations = Accommodation::where('property_id', $this->property_id())->get();
        foreach ($accommodations as $accommodation) {
            $arrivalDate = $accommodation->arrivalDate;
            $numberOfNights = $accommodation->numberOfNights;
            $accommodation->endDate = date('Y-m-d', strtotime($arrivalDate . ' + ' . $numberOfNights . ' days'));
        }
        if ($id == Null) {
            return view('admin.report',  ['accommodations' => $accommodations]);
        } else {
            $object = Accommodation::where('id', $id)->first();
            return view('admin.report',  ['accommodations' => $accommodations], ['object' => $object]);
        }
    }

    public function index2($id = Null)
    {
        $accommodations = Accommodation::where('property_id', $this->property_id())->get();
        foreach ($accommodations as $accommodation) {
            $arrivalDate = $accommodation->arrivalDate;
            $numberOfNights = $accommodation->numberOfNights;
            $accommodation->endDate = date('Y-m-d', strtotime($arrivalDate . ' + ' . $numberOfNights . ' days'));
        }
        if ($id == Null) {
            return view('admin.report2',  ['accommodations' => $accommodations]);
        } else {
            $object = Accommodation::where('id', $id)->first();
            return view('admin.report2',  ['accommodations' => $accommodations], ['object' => $object]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = Auth::id();

        $guestExempted = $request->guestExempted;
        if ($guestExempted == 'on') {
            $guestExempted = 1;
        } else {
            $guestExempted = 0;
        }

        $check = 1;
        $decMonths = Declaration::select('date')->where('property_id', $this->property_id())->get();
        foreach ($decMonths as $decMonth) {
            if ($decMonth->date == date('Y-m', strtotime($request['arrivalDate']))) {
                $check = Null;
                $monthclose = date('F, Y', strtotime($request['arrivalDate']));
            }
        }

        if ($check == 1) {
            if (Accommodation::where('property_id', $this->property_id())->where('arrivalDate', $request['arrivalDate'])->where('roomNumber', $request['roomNumber'])->where('ageOfGuest', $request['ageOfGuest'])->where('guestExempted', $guestExempted)->where('lastName', $request['lastName'])->where('firstName', $request['firstName'])->where('numberOfNights', $request['numberOfNights'])->doesntExist()) {

                $color = '#' . $this->random_color();

                $accommodation = new Accommodation;
                $accommodation->property_id = $this->property_id();
                $accommodation->user_created = $id;
                $accommodation->user_updated = $id;
                $accommodation->arrivalDate = $request['arrivalDate'];
                $accommodation->roomNumber = $request['roomNumber'];
                $accommodation->ageOfGuest = $request['ageOfGuest'];
                $accommodation->guestExempted = $guestExempted;
                $accommodation->firstName = $request['firstName'];
                $accommodation->lastName = $request['lastName'];
                $accommodation->numberOfNights = $request['numberOfNights'];
                $accommodation->color = $color;
                $accommodation->save();

                $AdminAccommodation = new AdminAccommodation;
                $AdminAccommodation->property_id = $this->property_id();
                $AdminAccommodation->collector_created = $id;
                $AdminAccommodation->collector_updated = $id;
                $AdminAccommodation->arrivalDate = $request['arrivalDate'];
                $AdminAccommodation->roomNumber = $request['roomNumber'];
                $AdminAccommodation->ageOfGuest = $request['ageOfGuest'];
                $AdminAccommodation->guestExempted = $guestExempted;
                $AdminAccommodation->firstName = $request['firstName'];
                $AdminAccommodation->lastName = $request['lastName'];
                $AdminAccommodation->numberOfNights = $request['numberOfNights'];
                $AdminAccommodation->color = $color;
                $AdminAccommodation->save();

                session()->flash('file', $request['firstName'] . " " . $request['lastName'] . " has been inserted.");
            } else {
                session()->flash('exist', $request['firstName'] . " " . $request['lastName'] . " already created.");
            }
        } else {
            session()->flash('check', $request['firstName'] . " " . $request['lastName'] . " couldn't been uploaded because " . $monthclose . " is close.");
        }


        return redirect()->route('admin.report');
    }

    public function import(Request $request)
    {
        Excel::import(new AccommodationImport(), $request->file('excel'));

        return redirect()->route('admin.report')->with('success', 'All good!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guestExempted = $request->guestExempted;
        if ($guestExempted == 'on') {
            $guestExempted = 1;
        } else {
            $guestExempted = 0;
        }

        $accommodation = Accommodation::find($id);
        $accommodation->user_updated = $id;
        $accommodation->arrivalDate = $request->arrivalDate;
        $accommodation->roomNumber = $request->roomNumber;
        $accommodation->ageOfGuest = $request->ageOfGuest;
        $accommodation->guestExempted = $guestExempted;
        $accommodation->firstName = $request->firstName;
        $accommodation->lastName = $request->lastName;
        $accommodation->numberOfNights = $request->numberOfNights;
        $accommodation->color = $request->color;
        $accommodation->save();

        $AdminAccommodation = AdminAccommodation::find($id);
        $AdminAccommodation->collector_updated = $id;
        $AdminAccommodation->arrivalDate = $request->arrivalDate;
        $AdminAccommodation->roomNumber = $request->roomNumber;
        $AdminAccommodation->ageOfGuest = $request->ageOfGuest;
        $AdminAccommodation->guestExempted = $guestExempted;
        $AdminAccommodation->firstName = $request->firstName;
        $AdminAccommodation->lastName = $request->lastName;
        $AdminAccommodation->numberOfNights = $request->numberOfNights;
        $AdminAccommodation->color = $request->color;
        $AdminAccommodation->save();

        return redirect()->route('admin.report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($accommodation)
    {
        Accommodation::where('id', $accommodation)->delete();
        AdminAccommodation::where('id', $accommodation)->delete();

        return redirect()->route('admin.report');
    }
}
