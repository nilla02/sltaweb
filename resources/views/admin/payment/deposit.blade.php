<x-admin-master>


    @section('content')

    <h5>Payment for {{$data['month']}}, {{$data['year']}}</h5>
    <form action="{{route('admin.payment.depositStore', ['declaration' => $data['declaration_id'], 'month' => $data['month'], 'year' => $data['year']])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="payment">
            <span>$</span>
            <input type="number" class="mt-2" name="{{ __('payment') }}" id="payment" step="0.05" min="0" max="999999999" placeholder="Enter the amount on the receipt" required>
            <span class="btn btn-info">The system calculated ${{$data['payment']}} EC for this month</span>
            @error('payment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="payment mt-4">
            <p>Select A Bank Payment Type</p>
            <select name="bank_type">
                <option value="Cheque Deposit">Cheque Deposit</option>
                <option value="Cash Deposit">Cash Deposit</option>
                <option value="Wire Transfer">Wire Transfer</option>
            </select>
        </div>

        <div class="grid-2 mt-4">
            <div class="text-center">
                <h6>Upload the Front of the Receipt</h6>
                <div>
                    <input type="file" class="" name="{{ __('depositImage') }}" id="depositImage" onchange="javascript:updateList2()" required>
                    @error('depositImage')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center title-file" id="file-upload-filename"></div>
            </div>
            <div class="text-center">
                <h6>Upload the Back of the Receipt</h6>
                <div>
                    <input type="file" class="" name="{{ __('depositImageBack') }}" id="depositImageBack" onchange="javascript:updateList3()" required>
                    @error('depositImageBack')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center title-file" id="file-upload-filename2"></div>
            </div>
        </div>


        <button class="btn btn-primary mb-5">Upload</button>
    </form>

    @endsection


    </x-home-master>