@extends('front.app')

@section('content')

<x-banner>
</x-banner>


<div class="main-form">
    <div>
        <div class="text-center main-title">{{ __('Tourism Accommodation Service Provider Registration Form') }}</div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            <div class="form">
                @csrf
                <div>
                    <div class="title">
                        <h2>General</h2>
                    </div>
                    <div class="form-box">
                        <div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name of Property') }} *</label>

                            <div>
                                <input id=" name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="tradeName" class="col-md-4 col-form-label text-md-right">{{ __('Trade Name') }} *</label>

                            <div>
                                <input id="tradeName" type="text" class="form-control @error('tradeName') is-invalid @enderror" name="tradeName" value="{{ old('tradeName') }}" autocomplete="tradeName" autofocus>

                                @error('tradeName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="vatTaxpayerAccount" class="col-md-4 col-form-label text-md-right">{{ __('VAT Taxpayer Account') }} *</label>

                            <div>
                                <input id="vatTaxpayerAccount" type="text" class="form-control @error('vatTaxpayerAccount') is-invalid @enderror" name="vatTaxpayerAccount" value="{{ old('vatTaxpayerAccount') }}" autocomplete="vatTaxpayerAccount" autofocus>

                                @error('vatTaxpayerAccount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="Location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }} *</label>

                            <div>
                                <input id="Location" type="text" class="form-control @error('Location') is-invalid @enderror" name="Location" value="{{ old('Location') }}" autocomplete="Location" autofocus>

                                @error('Location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="mailingAddress" class="col-md-4 col-form-label text-md-right">{{ __('Mailing Address') }} *</label>

                            <div>
                                <input id="mailingAddress" type="text" class="form-control @error('mailingAddress') is-invalid @enderror" name="mailingAddress" value="{{ old('mailingAddress') }}" autocomplete="mailingAddress" autofocus>

                                @error('mailingAddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="noOfRooms" class="col-md-4 col-form-label text-md-right">{{ __('No of Rooms') }} *</label>

                            <div>
                                <input id="noOfRooms" type="number" class="form-control @error('noOfRooms') is-invalid @enderror" name="noOfRooms" value="{{ old('noOfRooms') }}" autocomplete="noOfRooms" autofocus>

                                @error('noOfRooms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="title">
                        <h2>{{ __('Type Of Property') }}</h2>
                    </div>
                    <div class="form-box">
                        <div>
                            <input class="inline" id="Hotel" type="radio" name="typeOfProperty" value="Hotel" checked>
                            <label class="inline" for="Hotel">Hotel</label>
                        </div>
                        <div>
                            <input class="inline" id="Villa" type="radio" name="typeOfProperty" value="Villa">
                            <label class="inline" for="Villa">Villa</label>
                        </div>
                        <div>
                            <input class="inline" id="Rooms for Let" type="radio" name="typeOfProperty" value="Rooms for Let">
                            <label class="inline" for="Rooms for Let">Rooms for Let</label>
                        </div>
                        <div>
                            <input class="inline" id="Guest House" type="radio" name="typeOfProperty" value="Guest House">
                            <label class="inline" for="Guest House">Guest House</label>
                        </div>
                        <div>
                            <input class="inline" id="Apartments" type="radio" name="typeOfProperty" value="Apartments">
                            <label class="inline" for="Apartments">Apartments</label>
                        </div>
                        <div>
                            <input class="inline" id="Other" type="radio" name="typeOfProperty" value="Other">
                            <label class="inline" for="Other">Other</label>
                        </div>
                        @error('typeOfProperty')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div>
                            <input type="OtherName" name="OtherName" class="form-control @error('OtherName') is-invalid @enderror" value="{{ old('OtherName') }}" autocomplete="OtherName">
                            @error('OtherName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="title">
                    <h2>Contact Details</h2>
                </div>
                <div class="form-box">
                    <div>
                        <label for="ownerName" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }} *</label>

                        <div>
                            <input id="ownerName" type="ownerName" class="form-control @error('ownerName') is-invalid @enderror" name="ownerName" value="{{ old('ownerName') }}" autocomplete="ownerName">

                            @error('ownerName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="ownerPosition" class="col-md-4 col-form-label text-md-right">{{ __('Position') }} *</label>

                        <div>
                            <input id="ownerPosition" type="ownerPosition" class="form-control @error('ownerPosition') is-invalid @enderror" name="ownerPosition" value="{{ old('ownerPosition') }}" autocomplete="ownerPosition">

                            @error('ownerPosition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="ownerEmail" class="col-md-4 col-form-label text-md-right">{{ __('Owner Email') }} *</label>

                        <div>
                            <input id="ownerEmail" type="ownerEmail" class="form-control @error('ownerEmail') is-invalid @enderror" name="ownerEmail" value="{{ old('ownerEmail') }}" autocomplete="ownerEmail">

                            @error('ownerEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="managerName" class="col-md-4 col-form-label text-md-right">{{ __('Manager Name') }} *</label>

                        <div>
                            <input id="managerName" type="managerName" class="form-control @error('managerName') is-invalid @enderror" name="managerName" value="{{ old('managerName') }}" autocomplete="managerName">

                            @error('managerName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="managerPosition" class="col-md-4 col-form-label text-md-right">{{ __('Position') }} *</label>

                        <div>
                            <input id="managerPosition" type="managerPosition" class="form-control @error('managerPosition') is-invalid @enderror" name="managerPosition" value="{{ old('managerPosition') }}" autocomplete="managerPosition">

                            @error('managerPosition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="managerEmail" class="col-md-4 col-form-label text-md-right">{{ __('Manager Email') }} *</label>

                        <div>
                            <input id="managerEmail" type="managerEmail" class="form-control @error('managerEmail') is-invalid @enderror" name="managerEmail" value="{{ old('managerEmail') }}" autocomplete="managerEmail">

                            @error('managerEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="accountantName" class="col-md-4 col-form-label text-md-right">{{ __('Accountant Name') }} *</label>

                        <div>
                            <input id="accountantName" type="accountantName" class="form-control @error('accountantName') is-invalid @enderror" name="accountantName" value="{{ old('accountantName') }}" autocomplete="accountantName">

                            @error('accountantName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="accountantPosition" class="col-md-4 col-form-label text-md-right">{{ __('Position') }} *</label>

                        <div>
                            <input id="accountantPosition" type="accountantPosition" class="form-control @error('accountantPosition') is-invalid @enderror" name="accountantPosition" value="{{ old('accountantPosition') }}" autocomplete="accountantPosition">

                            @error('accountantPosition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="accountantEmail" class="col-md-4 col-form-label text-md-right">{{ __('Accountant Email') }} *</label>

                        <div>
                            <input id="accountantEmail" type="accountantEmail" class="form-control @error('accountantEmail') is-invalid @enderror" name="accountantEmail" value="{{ old('accountantEmail') }}" autocomplete="accountantEmail">

                            @error('accountantEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="primaryContactName" class="col-md-4 col-form-label text-md-right">{{ __('Primary Contact Name') }} *</label>

                        <div>
                            <input id="primaryContactName" type="primaryContactName" class="form-control @error('primaryContactName') is-invalid @enderror" name="primaryContactName" value="{{ old('primaryContactName') }}" autocomplete="primaryContactName">

                            @error('primaryContactName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="primaryContactPosition" class="col-md-4 col-form-label text-md-right">{{ __('Primary Contact Position') }} *</label>

                        <div>
                            <input id="primaryContactPosition" type="primaryContactPosition" class="form-control @error('primaryContactPosition') is-invalid @enderror" name="primaryContactPosition" value="{{ old('primaryContactPosition') }}" autocomplete="primaryContactPosition">

                            @error('primaryContactPosition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="primaryContactEmail" class="col-md-4 col-form-label text-md-right">{{ __('Primary Contact Email') }} *</label>

                        <div>
                            <input id="primaryContactEmail" type="primaryContactEmail" class="form-control @error('primaryContactEmail') is-invalid @enderror" name="primaryContactEmail" value="{{ old('primaryContactEmail') }}" autocomplete="primaryContactEmail">

                            @error('primaryContactEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <p class="req">Required</p>
                </div>

                <div class="title">
                    <h2>Information for the Online Portal:</h2>
                </div>
                <div class="form-box">

                    <div>
                        <label for="Full Name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }} *</label>

                        <div>
                            <input id="fullname" type="fullname" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" autocomplete="username">

                            @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }} *</label>

                        <div>
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }} *</label>

                        <div>
                            <input id="position" type="position" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" autocomplete="position">

                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} *</label>

                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="grid-2">
                        <div>
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} *</label>

                            <div>
                                <input id="password" type="password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} *</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control w-75" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="title">
                    <h2>{{ __('Applicable Class and Rate') }} :</h2>
                </div>
                <div class="form-box">

                    <div>
                        <div>
                            <input class="inline" id="1" type="radio" name="applicableClassAndRate" value="1" checked>
                            <label class="inline" for="1">ADR Average Daily Rate (ADR) US$ 120 and less - Class 1 (Rate - US$3 per person/night</label>
                        </div>
                        <div>
                            <input class="inline" id="2" type="radio" name="applicableClassAndRate" value="2">
                            <label class="inline" for="2">ADR Average Daily Rate (ADR) US$ 121 and more - Class 2 (Rate - US$6 per person/night</label>
                        </div>
                        <div>
                            <input class="inline" id="3" type="radio" name="applicableClassAndRate" value="3">
                            <label class="inline" for="3">Night Rate (NR) US$ 120 and less - Class 3 (Rate - US$3 per person/night</label>
                        </div>
                        <div>
                            <input class="inline" id="4" type="radio" name="applicableClassAndRate" value="4">
                            <label class="inline" for="4">Night Rate (NR) US$ 121 and more - Class 4 (Rate - US$6 per person/night</label>
                        </div>
                        @error('applicableClassAndRate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="title">
                    <h2>Required Documents:</h2>
                </div>
                <div class="form-box">
                    <p class="mb-1">The following documents (if applicable) must accompany your application:</p>
                    <div class="grid_3_2 center mt-4">
                        <div>
                            <p class="mb-1">1. A Copy of VAT Registration</p>
                            <div class="file">
                                <input type="file" name="{{ __('vat') }}" id="vat" onchange="javascript:updateList()">
                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="grey" id="file-upload-filename"></div>
                        </div>
                        <div>
                            <p class="mb-1">2. Certificate of Incorporation and Certificate of Good Standing</p>
                            <div class="file">
                                <input type="file" name="{{ __('coi-cogs') }}" id="coicogs" onchange="javascript:updateList2()">
                                @error('coi-cogs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="grey" id="file-upload-filename-2"></div>
                        </div>
                        <div>
                            <p class="mb-1">3. Certificate of Business Name</p>
                            <div class="file">
                                <input type="file" name="{{ __('business') }}" id="business" onchange="javascript:updateList3()">
                                @error('business')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="grey" id="file-upload-filename-3"></div>
                        </div>
                    </div>
                    <p class="mt-4">Required <br> Only PDF, DOC, DOCX</p>

                </div>

                <div class="title">
                    <h2>Identification:</h2>
                </div>
                <div class="form-box">

                    <!-- <div class="col-md-12">
                        <br />
                        <div id="sig"></div>
                        <br />
                        <button class="mt-3" id="clear">Clear Signature</button>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div> -->
                    <div class="grid_3_2 center mt-4">
                        <div>
                            <p class="mb-1">Government Issue ID</p>
                            <div class="file">
                                <input type="file" name="{{ __('government_id') }}" id="government_id" onchange="javascript:updateList4()">
                                @error('government_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="grey" id="file-upload-filename-4"></div>
                        </div>

                        <div>
                            <p class="mb-1">Signature</p>
                            <div class="file">
                                <input type="file" name="{{ __('signature') }}" id="signature" onchange="javascript:updateList5()">
                                @error('signature')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="grey" id="file-upload-filename-5"></div>
                        </div>
                    </div>

                    <p class="mt-3">Required <br> Only PDF, DOC, DOCX, PNG, JPG, JEPG</p>
                </div>

                <div class="mt-4">
                    <button type="submit" class="submit">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection