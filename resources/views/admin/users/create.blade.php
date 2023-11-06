<x-app-admin-layout>
    <x-slot name="header">{{ __('Users') }}</x-slot>

    <div class="row">
       <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Add User</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.users.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputname" class="form-label">{{ __('User Name') }}</label>
                                <input type="text"  name="name" value="{{old('name')}}" class="form-control" id="inputname">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputemail" class="form-label">{{ __('Email') }}</label>
                                <input type="email"  name="email" value="{{old('email')}}" class="form-control" id="inputemail">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputpassword" class="form-label">{{ __('Password') }}</label>
                                <input type="password"  name="password" value="{{old('password')}}" class="form-control" id="inputpassword">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputconfirmationpassword" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password"  name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="inputconfirmationpassword">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-12">
                            @forelse ($roles as $role)
                            <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                <label class="form-check-label">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @empty
                            ----
                        @endforelse
                        </div>
                    </div>



                <div class=" d-flex justify-content-between">
                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                </form>
            </div>
           </div>
       </div>
    </div>

</x-app-admin-layout>
