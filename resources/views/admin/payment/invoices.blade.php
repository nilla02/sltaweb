<x-admin-master>
    @section('content')

    <x-bank-account>
    </x-bank-account>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Invoices
                <button class="csv btn btn-primary float-right mr-5">Export CSV</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-head">
                        <tr>
                            <th class="th-white">Invoice Number</th>
                            <th class="th-white">Description</th>
                            <th class="th-white">Amount</th>
                            <th class="th-white">Status</th>
                            <th class="th-white">Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach ($invoices as $invoice)
                        <tr class="border-row">
                            <td>
                                <a href="{{route('admin.invoice', $invoice->id)}}">
                                    <strong>
                                        {{ $invoice->sage_invoice_number }}
                                    </strong>
                                </a>
                            </td>
                            <td>
                                {{$invoice->description}}
                            </td>
                            <td>
                                ${{$invoice->amount}} ECD
                            </td>
                            <td>
                                <div class="my-2"><span class="badge badge-warning badge-pill px-25">Unpaid</span></div>

                            </td>
                            <td>
                                {{ date('d F, Y', strtotime($invoice->date))}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('js/csv.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>