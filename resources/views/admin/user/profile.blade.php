<x-admin-master>


        @section('content')

        <h1 class="mb-5">{{$user->name}}</h1>

        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div class="row">



                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="grid-2-2">
                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname" value="{{$user->fullname}}">
                                        @error('fullname')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="position" value="{{$user->position}}">
                                        @error('position')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">
                                        @error('username')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">

                                        @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">

                                        @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                </div>


                                <div class="form-group">
                                        <label for="password-confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirmation">

                                        @error('password_confirmation')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                </form>

        </div>

        @endsection
</x-admin-master>