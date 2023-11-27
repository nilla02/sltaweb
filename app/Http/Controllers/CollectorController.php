<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Declaration;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;

class CollectorController extends AdminsController
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if ($this->property_id() == Null) {
            redirect()->route('admin.select');
        } else {
            $property = Property::where('id', $this->property_id())->count();
            if ($property == 0) {
                redirect()->route('admin.select');
            }
        }

        $property = Property::where('id', $this->property_id())->first();

        $data = [];

        $data['id'] = $this->prefix_id($this->property_id()) . $this->property_id() . '-12-2020';

        $data['reports'] = Declaration::where('property_id', $this->property_id())->count();

        $data['visitors'] = Accommodation::where('property_id', $this->property_id())->count();

        $payments = Payment::where('property_id', $this->property_id())->get();
        $amount = 0;
        foreach ($payments as $payment) {
            $amount += $payment->payment;
        }
        $data['total'] = $amount;

        $calender = Declaration::select('date', 'made_payment')->where('date', '>=', date("Y") . '-01')->where('date', '<=', date("Y") . '-12')->where('property_id', $this->property_id())->get();

        $data['January'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-01')) {
                $data['January'] = 1;
                if ($month->made_payment == 1) {
                    $data['January'] = 2;
                }
            }
        }

        $data['February'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-02')) {
                $data['February'] = 1;
                if ($month->made_payment == 1) {
                    $data['February'] = 2;
                }
            }
        }

        $data['March'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-03')) {
                $data['March'] = 1;
                if ($month->made_payment == 1) {
                    $data['March'] = 2;
                }
            }
        }

        $data['April'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-04')) {
                $data['April'] = 1;
                if ($month->made_payment == 1) {
                    $data['April'] = 2;
                }
            }
        }

        $data['May'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-05')) {
                $data['May'] = 1;
                if ($month->made_payment == 1) {
                    $data['May'] = 2;
                }
            }
        }

        $data['June'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-06')) {
                $data['June'] = 1;
                if ($month->made_payment == 1) {
                    $data['June'] = 2;
                }
            }
        }

        $data['July'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-07')) {
                $data['July'] = 1;
                if ($month->made_payment == 1) {
                    $data['July'] = 2;
                }
            }
        }

        $data['August'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-08')) {
                $data['August'] = 1;
                if ($month->made_payment == 1) {
                    $data['August'] = 2;
                }
            }
        }

        $data['September'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-09')) {
                $data['September'] = 1;
                if ($month->made_payment == 1) {
                    $data['September'] = 2;
                }
            }
        }

        $data['October'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-10')) {
                $data['October'] = 1;
                if ($month->made_payment == 1) {
                    $data['October'] = 2;
                }
            }
        }

        $data['November'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-11')) {
                $data['November'] = 1;
                if ($month->made_payment == 1) {
                    $data['November'] = 2;
                }
            }
        }

        $data['December'] = 0;
        foreach ($calender as $month) {
            if (strtotime($month->date) == strtotime(date('Y') . '-12')) {
                $data['December'] = 1;
                if ($month->made_payment == 1) {
                    $data['December'] = 2;
                }
            }
        }

        $data['late_month'] = date('m', strtotime("-1 month"));

        $recepits = Receipt::select('id', 'number', 'sage_invoice_number', 'amount', 'currency', 'title', 'reference', 'date')->where('sage_customer_id', $property->sageId)->orderBy('id', 'desc')->take(5)->get();

        return view('admin.index', ['property' => $property, 'data' => $data, 'recepits' => $recepits]);
    }
}
