<x-admin-master>
    @section('content')


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container bck-white pt-3 mb-5">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
            </h1>

            <div class="page-tools none">
                <div class="action-buttons">
                    <a onclick="printContext()" role="button" name="print" class="btn bg-white btn-light mx-1px text-95 mr-2" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    <button class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" data-toggle="modal" data-target="#pay">Pay Now</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="pay" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pay">Select a payment option</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="get">
                            @csrf
                            <div class="grid-3">
                                <div class="payment payment-type">
                                    <input type="radio" id="online-payment" name="payment_type" value="bosl" required="required" disabled>
                                    <label class="h-120" for="online-payment"> <img width="50px" src="{{asset('img/visa.png')}}"> <img width="50px" src="{{asset('img/mastercard.png')}}"> <br> Online Payment <br> (coming soon)</label>
                                </div>
                                <div class="payment payment-type">
                                    <input type="radio" id="deposit" name="payment_type" value="deposit" required="required">
                                    <label for="deposit" class="h-120">Bank Deposit</label>
                                </div>
                                <div class="payment payment-type">
                                    <input type="radio" id="DCash" name="payment_type" value="DCash" disabled>
                                    <label for="DCash" class="h-120">DCash<br>(coming soon)</label>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150 mb-3">
                                <a href="https://saintluciatourismlevy.org/"><img src="{{asset('img/saintluciablue.png')}}" height="80" width="auto"></a>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">To:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{$invoice->shiptoctac}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{$invoice->shiptoste1}}
                                </div>
                                <div class="my-1">
                                    {{$invoice->shiptoste2}}
                                </div>
                                <div class="my-1">
                                    {{$invoice->shiptoste3}}
                                </div>
                                <div class="my-1">
                                    {{$invoice->shiptoste4}}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>

                                <div class="my-2"> <span class="text-600 text-90">ID:</span> #{{$invoice->sage_invoice_number}}</div>

                                <div class="my-2"> <span class="text-600 text-90">Issue Date:</span> {{ date('dS F, Y', strtotime($invoice->date))}}</div>

                                <div class="my-2"> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25 none">Unpaid</span> <span class="print">unpaid</span> </div>
                                <div class="my-2"> <span class="text-600 text-90">Term Code:</span> {{$invoice->termcode}}</div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            <div class="col-9 col-sm-5">Description</div>
                            <div class="d-none d-sm-block col-1"></div>
                            <div class="d-none d-sm-block col-4 col-sm-2"></div>
                            <div class="d-none d-sm-block col-sm-2"></div>
                            <div class="col-2">Amount</div>
                        </div>

                        <div class="text-95 text-secondary-d3">
                            <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                <div class="col-9 col-sm-5">{{$invoice->description}}</div>
                                <div class="d-none d-sm-block col-1"></div>
                                <div class="d-none d-sm-block col-2"></div>
                                <div class="d-none d-sm-block col-2 text-95"></div>
                                <div class="col-2 text-secondary-d2">${{$invoice->amount}}</div>
                            </div>
                        </div>

                        <div class="row border-b-2 brc-default-l2"></div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            </div>

                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                        Total Amount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-150 text-success-d3 opacity-2">${{$invoice->amount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div>
                            <span class="text-secondary-d1 text-105">Thank you for your business</span>
                            <button class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 none" data-toggle="modal" data-target="#pay">Pay Now</button>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-admin-master>