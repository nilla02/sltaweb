<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\AdminDeclaration;
use App\Models\AdminPayment;
use App\Models\Declaration;
use App\Models\Payment;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DeclarationController extends AdminsController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Total = 0;
        $date = $request->date;

        if (Declaration::where('property_id', $this->property_id())->where('date', $date)->doesntExist()) {
            $property = Property::select('applicableClassAndRate')->where('id', $this->property_id())->first();
            $applicableClassAndRate = $property->applicableClassAndRate;
            $accommodations = Accommodation::where('property_id', $this->property_id())->where('arrivalDate', 'like', $date . '-%')->get();

            function rate($applicableClassAndRate, $ageOfGuest)
            {
                if ($applicableClassAndRate == 1 or $applicableClassAndRate == 3) {
                    $rate = 3;
                } elseif ($applicableClassAndRate == 2 or $applicableClassAndRate == 4) {
                    $rate = 6;
                }

                if ($ageOfGuest >= 12 and $ageOfGuest <= 18) {
                    $rate *= 0.5;
                } elseif ($ageOfGuest < 12) {
                    $rate = 0;
                }
                return $rate;
            }

            foreach ($accommodations as $accommodation) {
                $ageOfGuest = $accommodation->ageOfGuest;

                if ($accommodation->guestExempted != 1) {

                    $numberOfNights = $accommodation->numberOfNights;
                    $endMonth = date('Y-m', strtotime($accommodation->arrivalDate . ' + ' . $accommodation->numberOfNights . ' days'));
                    $endDay = date('d', strtotime($accommodation->arrivalDate . ' + ' . $accommodation->numberOfNights . ' days'));
                    if ($date != $endMonth) {
                        $numberOfNights = $numberOfNights - $endDay;
                        $numberOfNights += 1;
                    }
                    $amountPerMonth = $numberOfNights * rate($applicableClassAndRate, $ageOfGuest);
                }

                $Total += $amountPerMonth;

                $accommodation = Accommodation::find($accommodation->id);
                $accommodation->lockRecord = 1;
                $accommodation->save();
            }

            // $startMonth = date('Y-m', strtotime($date . '- 1 months'));
            // $accommodations = Accommodation::where('property_id', $this->property_id())->where('arrivalDate', 'like', $startMonth . '-%')->get();
            //Month before accommodations
            // foreach ($accommodations as $accommodation) {

            //     $ageOfGuest = $accommodation->ageOfGuest;

            //     if ($accommodation->guestExempted != 1) {
            //         $numberOfNights = $accommodation->numberOfNights;
            //         $endDateRecord = date('Y-m', strtotime($accommodation->arrivalDate . ' + ' . $accommodation->numberOfNights . ' days'));
            //         if ($startMonth < $endDateRecord) {
            //             $numberOfNights = date('d', strtotime($accommodation->arrivalDate . ' + ' . $accommodation->numberOfNights . ' days'));
            //             $amountPerMonth = $numberOfNights * rate($applicableClassAndRate, $ageOfGuest);
            //             $Total += $amountPerMonth;
            //         }
            //     }
            // }

            if ($Total == 0) {
                session()->flash('emptyPayment', $date);
                return redirect()->route('admin.report');
            }

            Declaration::create([
                'user_id' => Auth::id(),
                'property_id' => $this->property_id(),
                'date' => $date,
                'payment' => $Total,
            ]);

            AdminDeclaration::create([
                'collector_id' => Auth::id(),
                'property_id' => $this->property_id(),
                'date' => $date,
                'payment' => $Total,
            ]);
            return redirect()->route('admin.payment');
        } else {
            session()->flash('check', 'Reporting for ' . date('F, Y', strtotime($date)) . ' is already close.');
            return redirect()->route('admin.report');
        }
    }

    public function emptyPayment(Request $request)
    {
        $Total = 0;
        $date = $request->date;

        Declaration::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'date' => $date,
            'payment' => $Total,
            'made_payment' => 1,
        ]);

        if (DB::table('declarations')->select('id')->orderBy('id', 'desc')->limit(1)->exists()) {
            $declaration = DB::table('declarations')->select('id')->orderBy('id', 'desc')->limit(1)->first();
            $did = $declaration->id;
        } else {
            $did = 1;
        }

        AdminDeclaration::create([
            'id' => $did,
            'collector_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'date' => $date,
            'payment' => $Total,
            'made_payment' => 1,
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'declaration_id' => $did,
            'payment' => $Total,
            'payment_type' => 'Zero Amount Payment',
        ]);

        if (DB::table('payments')->select('id')->orderBy('id', 'desc')->limit(1)->exists()) {
            $payment = DB::table('payments')->select('id')->orderBy('id', 'desc')->limit(1)->first();
            $pid = $payment->id;
        } else {
            $pid = 1;
        }

        AdminPayment::create([
            'id' => $pid,
            'collector_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'declaration_id' => $did,
            'payment' => $Total,
            'payment_type' => 'Zero Amount Payment',
        ]);

        session()->flash('file', 'Your zero payment amount was uploaded for ' . date('F, Y', strtotime($date)));

        return back();
    }
}
