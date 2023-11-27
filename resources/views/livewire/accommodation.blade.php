<!-- EXCEL Modal-->
<div class="modal fade" id="acceptCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload EXCEL Template below</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('admin.report.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="excel">
                        <input type="file" class="mt-2" name="{{ __('excel') }}" id="excel" onchange="javascript:updateList()" required>
                        @error('excel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center title-file" id="file-upload-filename"></div>
                    <!-- <div class="declaration mt-2 mb-2">
                        <input type="checkbox" class="mt-2 p-30" name="declaration" value="" id="declaration" required>
                        <label for="declaration" class="col-form-label text-md-end wbreak in-line">I hereby certify that the information given on this application form is true, correct and complete and I further declare that I have the authority to make this disclosure of the information provided.</label>
                    </div> -->
                    <a href="{{asset('docs/TLORF.xlsx')}}" download="SLTA-Accommodation-report.xlsx" class="mt-2">Download EXCEL Template</a>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Accommodation Modal-->
<div class="modal fade" id="acceptAccommodation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete Action</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.report.create') }}" class="w100" method="post">
                    @csrf

                    <div class="arrivalDate">
                        <label for="arrivalDate" class="col-md-4 col-form-label text-md-end">{{ __('Arrival Date') }}</label>
                        <input type="date" class="mt-2" name="arrivalDate" value="{{date('Y-m-d')}}" id="arrivalDate" required>
                        @error('arrivalDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="roomNumber">
                        <label for="roomNumber" class="col-md-4 col-form-label text-md-end">{{ __('Room Number') }}</label>
                        <input type="text" class="mt-2" name="roomNumber" value="" id="roomNumber" required>
                        @error('roomNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="ageOfGuest">
                        <label for="ageOfGuest" class="col-md-4 col-form-label text-md-end">{{ __('Age Of Guest') }}</label>
                        <input type="number" class="mt-2" name="ageOfGuest" value="" id="ageOfGuest" required>
                        @error('ageOfGuest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="guestExempted">
                        <label for="guestExempted" class="col-md-4 col-form-label text-md-end wbreak" title="Only including"><i class="far fa-question-circle d-inline mr-2"></i>{{ __('Guest Exempted') }}</label>
                        <input type="checkbox" class="mt-2 p-30" name="guestExempted" value="" id="guestExempted">

                        @error('guestExempted')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="firstName">
                        <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                        <input type="text" class="mt-2" name="firstName" value="" id="firstName" required>
                        @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="lastName">
                        <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                        <input type="text" class="mt-2" name="lastName" value="" id="lastName" required>
                        @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="numberOfNights">
                        <label for="numberOfNights" class="col-md-4 col-form-label text-md-end">{{ __('Number Of Nights') }}</label>
                        <input type="number" class="mt-2" name="numberOfNights" value="" id="numberOfNights" required>
                        @error('numberOfNights')
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

                <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>