<x-admin-master>


    @section('content')


    <section id="content" class="dash-content">
        <div class="text-center">


            <h1 class="none">{{Session::get('propertyName')}} <span style="color:#45a9de">({{$data['id']}})</span></h1>
        </div>
        <!-- MAIN -->
        <main>
            <div class="head-title">

            </div>

            <ul class="box-info">
                <li id="dash-hover">
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{$data['reports']}}</h3>
                        <p>Reports</p>
                    </span>
                </li>
                <li id="dash-hover">
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{$data['visitors']}}</h3>
                        <p>Visitors</p>
                    </span>
                </li>
                <li id="dash-hover">
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>${{$data['total']}}</h3>
                        <p>Total Collected</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order" id="dash-hover">
                    <div class="head">
                        <h3>Monthly Collection</h3>
                        <span>2022</span>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Status</th>
                                <th>Month</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>January</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-01')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['January'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['January'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['January'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>February</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-02')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['February'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['February'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['February'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>March</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-03')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['March'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['March'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['March'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>April</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-04')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['April'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['April'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['April'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>May</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-05')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['May'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['May'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['May'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>June</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-06')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['June'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['June'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['June'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>July</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-07')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['July'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['July'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['July'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>August</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-08')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['August'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['August'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['August'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>September</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-09')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['September'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['September'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['September'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>October</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-10')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['October'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['October'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['October'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>November</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-11')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['November'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['November'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['November'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                                <td>
                                    <p>December</p>
                                </td>
                                <td>
                                    @if(strtotime(today()) < strtotime(date('Y').'-12')) <span class="status waiting">Waiting</span>
                                        @else
                                        @if($data['December'] == 0)
                                        <span class="status pending">Pending</span>
                                        @elseif($data['December'] == 1)
                                        <span class="status process">Processing</span>
                                        @elseif($data['December'] == 2)
                                        <span class="status completed">Completed</span>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="order" id="dash-hover">
                    <div class="head">
                        <h3>Payments</h3>
                        <span><a href="{{route('admin.history')}}">History</a></span>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Recepit Number</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recepits as $recepit)
                            <tr class="border-row">
                                <td>
                                    <a href="{{route('admin.recepit', $recepit->id)}}">
                                        <strong>
                                            @if ($recepit->number != '')
                                            {{ $recepit->number }}
                                            @else
                                            {{ $recepit->sage_system_id }}
                                            @endif
                                        </strong>
                                    </a>
                                </td>
                                <td>
                                    @if ($recepit->title != '')
                                    {{ $recepit->title }}
                                    @else
                                    {{ $recepit->reference }}
                                    @endif
                                </td>
                                <td class="mr4 ml4">
                                    ${{$recepit->amount}} {{$recepit->currency}}
                                </td>
                                <td>
                                    {{ date('d F, Y', strtotime($recepit->date))}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="todo" id="dash-hover">
                    <div class="head">
                        <h3>News Feed</h3>
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <br>
    @endsection


    </x-home-master>