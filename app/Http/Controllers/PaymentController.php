<?php

namespace App\Http\Controllers;

use App\Models\AdminDeclaration;
use App\Models\AdminPayment;
use App\Models\Declaration;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends AdminsController
{

    public function index()
    {
        $data = [];
        $dates = [];
        $data['current_year'] = date("Y");
        $data['previous_year'] = date('Y', strtotime('-1 year'));
        $data['next_year'] = date('Y', strtotime('+1 year'));


        $declarations = Declaration::select('date')->where('property_id', $this->property_id())->where('made_payment', NULL)->get();
        $num = 0;
        foreach ($declarations as $declaration) {
            $cut = explode('-', $declaration->date);
            $dates[$num]['year'] = $cut[0];
            $dates[$num]['month'] = $cut[1];
            $num += 1;
        }
        return view('admin.payment', ['data' => $data], ['dates' => $dates]);
    }

    public function option(Request $request)
    {
        $date = $request->year . '-' . $request->month;

        $payment_type = $request->payment_type;
        $declaration = Declaration::select('id', 'payment')->where('property_id', $this->property_id())->where('date', $date)->where('made_payment', NULL)->firstOrFail();

        $data = [];
        $data['date'] = $date;
        $data['month'] = $this->monthTitle($request->month);
        $data['year'] = $request->year;
        $data['declaration_id'] = $declaration->id;
        $data['payment'] = $declaration->payment;

        if ($payment_type == 'deposit') {
            return view('admin.payment.deposit', ['data' => $data]);
        }
    }

    public function bosl()
    {
        return view('admin.payment.bosl');
    }
z
    public function depositStore(Request $request, $declaration, $month, $year)
    {
        $property = Property::select('name')->where('id', $this->property_id())->first();

        $imgLocation = $property->name . '-' . $month . '-' . $year . '-' . time() . '-payment-receipt-front.' . $request->depositImage->extension();

        $request->depositImage->move(public_path('7647357'), $imgLocation);
        Storage::disk('ftp')->put($imgLocation, fopen(public_path('7647357\\') . $imgLocation, 'r+'));

        $imgLocationBack = $property->name . '-' . $month . '-' . $year . '-' . time() . '-payment-receipt-back.' . $request->depositImageBack->extension();

        $request->depositImageBack->move(public_path('7647357'), $imgLocationBack);
        Storage::disk('ftp')->put($imgLocationBack, fopen(public_path('7647357\\') . $imgLocationBack, 'r+'));

        Payment::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'declaration_id' => $declaration,
            'payment' => $request->payment,
            'payment_type' => 'Bank Deposit',
            'payment_sub_type' => $request->bank_type,
            'payment_url' => $imgLocation,
            'payment_back_url' => $imgLocationBack
        ]);

        AdminPayment::create([
            'collector_id' => Auth::id(),
            'property_id' => $this->property_id(),
            'declaration_id' => $declaration,
            'payment' => $request->payment,
            'payment_type' => 'Bank Deposit',
            'payment_sub_type' => $request->bank_type,
            'payment_url' => $imgLocation,
            'payment_back_url' => $imgLocationBack
        ]);

        Declaration::where('id', $declaration)->update(['made_payment' => 1]);
        AdminDeclaration::where('id', $declaration)->update(['made_payment' => 1]);

        session()->flash('status', 'Upload was successful');

        return redirect()->route('admin.payment');
    }

    public function history()
    {
        $property = Property::where('id', $this->property_id())->first();
        $recepits = Receipt::select('id', 'number', 'sage_invoice_number', 'amount', 'currency', 'title', 'reference', 'date')->where('sage_customer_id', $property->sageId)->orderBy('id', 'desc')->get();

        return view('admin.payment.history', ['recepits' => $recepits]);
    }

    public function recepit(Request $request)
    {
        $property = Property::where('id', $this->property_id())->first();
        $recepit = Receipt::select('id', 'number', 'sage_invoice_number', 'amount', 'currency', 'title', 'reference', 'date')->where('id', $request->recepit)->orderBy('id', 'desc')->first();


        return view('admin.payment.recepit', ['property' => $property, 'recepit' => $recepit]);
    }

    public function invoices()
    {
        $property = Property::where('id', $this->property_id())->first();
        $invoices = Invoice::select('id', 'sage_invoice_number', 'description', 'amount', 'date')->where('sage_customer_id', $property->sageId)->orderBy('id', 'desc')->get();

        return view('admin.payment.invoices', ['invoices' => $invoices]);
    }

    public function invoice(Request $request)
    {
        $invoice = Invoice::select('id', 'description', 'batch_number', 'sage_customer_id', 'sage_invoice_number', 'status', 'amount', 'date', 'termcode', 'shiptoste1', 'shiptoste2', 'shiptoste3', 'shiptoste4', 'shiptoctac')->where('id', $request->invoice)->orderBy('id', 'desc')->first();
        $property = Property::where('sageId', $invoice->sage_customer_id)->first();
        return view('admin.payment.invoice', ['property' => $property, 'invoice' => $invoice]);
    }

    public function invoicePayment(Request $request)
    {
    }
}
