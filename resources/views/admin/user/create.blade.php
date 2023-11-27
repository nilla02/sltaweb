<x-admin-master>
    @section('content')
    @if(session('created'))
    <div class="alert alert-success">{{session('created')}}</div>
    @endif
    @if($property->remove != 0)
    <div>
        @endif
        @if($property->remove == 0)
        <div class="grid-2">
            <div>
                <h4>Create a user from the options</h4>
                <form action="{{route('user.create')}}" class="mt-3" method="post">
                    @csrf
                    <div>
                        @if ($property->ownerEmail != NULL)
                        <div class="payment d-inline-block mr-4">
                            <input type="radio" id="owner" name="new" value="owner">
                            <label for="owner">{{$property->ownerName}} <br> ( {{$property->ownerPosition}} )</label>
                        </div>
                        @endif
                        @if ($property->managerEmail != NULL)
                        <div class="payment d-inline-block mr-4">
                            <input type="radio" id="manager" name="new" value="manager">
                            <label for="manager">{{$property->managerName}} <br> ( {{$property->managerPosition}} )</label>
                        </div>
                        @endif
                        @if ($property->accountantEmail != NULL)
                        <div class="payment d-inline-block mr-4">
                            <input type="radio" id="accountant" name="new" value="accountant">
                            <label for="accountant">{{$property->accountantName}} <br> ( {{$property->accountantPosition}} )</label>
                        </div>
                        @endif
                        @if ($property->primaryContactEmail != NULL)
                        <div class="payment d-inline-block mr-4">
                            <input type="radio" id="primary" name="new" value="primary">
                            <label for="primary">{{$property->primaryContactName}} <br> ( {{$property->primaryContactPosition}} )</label>
                        </div>
                        @endif
                    </div>
                    <div class="w-50 mt-4">
                        <label for="username" class="">{{ __('Username') }}</label>
                        <div>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="w-50 mt-4">
                        <label for="properties" class="">Properties</label>
                        <div>
                            @foreach ($properties as $property)
                            <div>
                                <input type="checkbox" id="form1 {{$property->name}}{{$property->id}}" name="{{$property->name}}" value="{{$property->id}}">
                                <label for="form1 {{$property->name}}{{$property->id}}">{{$property->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-50 mt-4">
                        <label for="Roles" class="">Roles</label>
                        <div>
                            @foreach ($roles as $role)
                            <div>
                                <input type="checkbox" id="form1 {{$role->name}}{{$role->id}}" name="{{$role->name}}" value="{{$role->id}}">
                                <label for="form1 {{$role->name}}{{$role->id}}">{{$role->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid-2 mt-4">
                        <div class="w-75">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-75">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 mb-4">Create User</button>
                </form>
            </div>
            @endif
            <div class="ml-5">
                <h4>Create a user</h4>
                <form action="{{route('user.create2')}}" method="post">
                    @csrf
                    <div class="grid-2">
                        <div class="w-75 mt-3">
                            <label for="fullname" class="">{{ __('Full Name') }}</label>
                            <div>
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" required>

                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-75 mt-3">
                            <label for="username" class="">{{ __('Username') }}</label>
                            <div>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-75 mt-3">
                            <label for="position" class="">{{ __('Position') }}</label>
                            <div>
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" required>

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-75 mt-3">
                            <label for="email" class="">{{ __('Email') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-50 mt-4">
                        <label for="properties" class="">Properties</label>
                        <div>
                            @foreach ($properties as $property)
                            <div>
                                <input type="checkbox" id="form2 {{$property->name}}{{$property->id}}" name="{{$property->name}}" value="{{$property->id}}">
                                <label for="form2 {{$property->name}}{{$property->id}}">{{$property->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-50 mt-4">
                        <label for="Roles" class="">Roles</label>
                        <div>
                            @foreach ($roles as $role)
                            <div>
                                <input type="checkbox" id="form2 {{$role->name}}{{$role->id}}" name="{{$role->name}}" value="{{$role->id}}">
                                <label for="form2 {{$role->name}}{{$role->id}}">{{$role->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="grid-2">
                        <div class="w-75 mt-3">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-75 mt-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Create User</button>
                </form>
            </div>
        </div>

        @endsection
</x-admin-master>