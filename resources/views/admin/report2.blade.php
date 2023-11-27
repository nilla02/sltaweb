<x-admin-master>


    @section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            <?php

            if (isset($object)) {
                echo '$(\'#updateAcceptAccommodation\').modal();';
            }

            ?>
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 'calc(100vh - 100px)',
                themeSystem: 'bootstrap',
                expandRows: true,
                headerToolbar: {
                    left: 'prev,next dayGridMonth,dayGridWeek,dayGridDay listMonth,today',
                    center: 'title',
                    right: 'prevYear,nextYear'
                },
                eventClassNames: ['myclassname', 'otherclassname'],
                initialView: 'dayGridMonth',
                displayEventTime: false,
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                timeZone: 'America/St_Lucia',
                eventClick: function(info) {
                    var accommodation = info.event.id;
                    location.replace('/report/' + accommodation + '/update');
                    //Livewire.emit('getAccommodation', accommodation);
                },
                events: [
                    <?php
                    foreach ($accommodations as $accommodation) {
                    ?> {
                            <?php
                            $Exempted = $accommodation->guestExempted;
                            if ($Exempted == 1) {
                                $Exempted = "( Exempted )";
                            } else {
                                $Exempted = "";
                            }
                            ?>
                            id: '<?php echo $accommodation->id; ?>',
                                title: '<?php echo $accommodation->roomNumber . " - " . $accommodation->firstName . " " . $accommodation->lastName . " " . "$Exempted"; ?>',
                                start: '<?php echo $accommodation->arrivalDate; ?>',
                                end: '<?php echo $accommodation->endDate; ?>',
                                color: '<?php echo $accommodation->color; ?>',
                        },
                    <?php
                    }
                    ?>
                ]
            });


            calendar.render();
            var event = calendar.getEventById(1) // an event object!
            var start = event.start // a property (a Date object)
            console.log(start.toISOString())
        });
    </script>
    <div class="float-right">
        <button class="btn btn-secondary csv" href="#" data-toggle="modal" data-target="#acceptCSV">Import with EXCEL</button>

        <button class="btn btn-primary guest" href="#" data-toggle="modal" data-target="#acceptAccommodation">Enter an Accommodation</button>
    </div>
    <br>



    @livewire('accommodation')

    @isset($object)
    <!-- Update Accommodation Modal-->
    <div class="modal fade" id="updateAcceptAccommodation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Accommodation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.report.id.update', $object->id) }}" class="w100" method="post">
                        @csrf
                        @method('PUT')
                        <div class="arrivalDate">
                            <label for="arrivalDate" class="col-md-4 col-form-label text-md-end">{{ __('Arrival Date') }}</label>
                            <input type="date" class="mt-2" name="arrivalDate" value="{{$object->arrivalDate}}" id="arrivalDate" required>
                            @error('arrivalDate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="roomNumber">
                            <label for="roomNumber" class="col-md-4 col-form-label text-md-end">{{ __('Room Number') }}</label>
                            <input type="text" class="mt-2" name="roomNumber" value="{{$object->roomNumber}}" id="roomNumber" required>
                            @error('roomNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="ageOfGuest">
                            <label for="ageOfGuest" class="col-md-4 col-form-label text-md-end">{{ __('Age Of Guest') }}</label>
                            <input type="number" class="mt-2" name="ageOfGuest" value="{{$object->ageOfGuest}}" id="ageOfGuest" required>
                            @error('ageOfGuest')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="guestExempted">
                            <label for="guestExempted" class="col-md-4 col-form-label text-md-end wbreak" title="Only including"><i class="far fa-question-circle d-inline mr-2"></i>{{ __('Guest Exempted') }}</label>
                            <input type="checkbox" class="mt-2 p-30" name="guestExempted" @if($object->guestExempted == 1) checked @endif id="guestExempted">

                            @error('guestExempted')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="firstName">
                            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                            <input type="text" class="mt-2" name="firstName" value="{{$object->firstName}}" id="firstName" required>
                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="lastName">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                            <input type="text" class="mt-2" name="lastName" value="{{$object->lastName}}" id="lastName" required>
                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="numberOfNights">
                            <label for="numberOfNights" class="col-md-4 col-form-label text-md-end">{{ __('Number Of Nights') }}</label>
                            <input type="number" class="mt-2" name="numberOfNights" value="{{$object->numberOfNights}}" id="numberOfNights" required>
                            @error('numberOfNights')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="color">
                            <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>
                            <input type="color" class="mt-2" name="color" value="{{$object->color}}" id="color" required>
                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- <div class="declaration mt-4 ml-4 mr-4 mb-2">
                            <input type="checkbox" class="mt-2 p-30" name="declaration" value="" id="declaration" required>
                            <label for="declaration" class="col-form-label text-md-end wbreak in-line">I hereby certify that the information given on this application form is true, correct and complete and I further declare that I have the authority to make this disclosure of the information provided.</label>
                        </div> -->

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endisset

    <div id='calendar' class="mb-5 mt-5"></div>

    <div class="silder"></div>


    @endsection


    </x-home-master>