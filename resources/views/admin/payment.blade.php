<x-admin-master>


    @section('content')

    <x-bank-account>
    </x-bank-account>

    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <form action="{{route('admin.payment.')}}" method="post" class="payment-form">
        @csrf
        <div class="mt-5 mb-5">
            <h4 class="ml-1">Select Payment Type</h4>

            <div class="grid-4">
                <div class="payment payment-type">
                    <input type="radio" id="online-payment" name="payment_type" value="bosl" required="required" disabled>
                    <label for="online-payment"> <img width="50px" src="{{asset('img/visa.png')}}"> <img width="50px" src="{{asset('img/mastercard.png')}}"> <br> Online Payment <br> (coming soon)</label>
                </div>
                <div class="payment payment-type">
                    <input type="radio" id="deposit" name="payment_type" value="deposit" required="required">
                    <label for="deposit">Bank Deposit</label>
                </div>
                <div class="payment payment-type">
                    <input type="radio" id="DCash" name="payment_type" value="DCash" disabled>
                    <label for="DCash">DCash<br>(coming soon)</label>
                </div>
            </div>


        </div>


        <div class="mt-5 mb-5">
            <h4>Select Payment Period</h4>
            <label>Year</label>
            <div class="grid-4">
                <div class="payment payment-year">
                    <input type="radio" id="{{$data['previous_year']}}" name="year" value="{{$data['previous_year']}}" {{$dontSetYear = 0;}} @foreach ($dates as $date) @if ($data['previous_year']==$date['year']) $dontSetYear=1; @endif @endforeach @if($dontSetYear !=1) disabled @endif>
                    <label for="{{$data['previous_year']}}">{{$data['previous_year']}}</label>
                </div>
                <div class="payment payment-year">
                    <input type="radio" id="{{$data['current_year']}}" name="year" value="{{$data['current_year']}}" {{$dontSetYear = 0;}} @foreach ($dates as $date) @if ($data['current_year']==$date['year']) {{$dontSetYear=1;}} @endif @endforeach @if($dontSetYear !=1) disabled @endif>
                    <label for="{{$data['current_year']}}">{{$data['current_year']}}</label>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5">

            <label>Month</label>
            <div class="grid-4">
                <div class="payment payment-month">
                    <input type="radio" id="January" name="month" value="01" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='01' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="January">January</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="February" name="month" value="02" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='02' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="February">February</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="March" name="month" value="03" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='03' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="March">March</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="April" name="month" value="04" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='04' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="April">April</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="May" name="month" value="05" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='05' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="May">May</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="June" name="month" value="06" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='06' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="June">June</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="July" name="month" value="07" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='07' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="July">July</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="August" name="month" value="08" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='08' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="August">August</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="September" name="month" value="09" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='09' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="September">September</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="October" name="month" value="10" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='10' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="October">October</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="November" name="month" value="11" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='11' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="November">November</label>
                </div>
                <div class="payment payment-month">
                    <input type="radio" id="December" name="month" value="12" {{$dontSetMonth = 0;}} @foreach ($dates as $date) @if ($date['month']=='12' ) {{$dontSetMonth=1;}} @endif @endforeach @if($dontSetMonth !=1) disabled @endif>
                    <label for="December">December</label>
                </div>
            </div>
        </div>
        <div class="payment">
            <button class="payment" type="Submit">Submit</button>
        </div>
        
    </form>
    @endsection


    </x-home-master>