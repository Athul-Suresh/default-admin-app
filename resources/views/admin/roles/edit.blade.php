<x-app-admin-layout>
    <x-slot name="header">{{ __('Roles') }}</x-slot>

    <div class="row">
       <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit Role</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.roles.update',$role)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputname" class="form-label">{{ __('Role Name') }}</label>
                                <input type="text"  name="name" value="{{old('name',$role->name)}}" class="form-control" id="inputname">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @unless ($role->name == 'super-admin')
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row  g-4">
                                    @forelse ($permissions as $permission)
                                        <div class="col-lg-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} class="">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @empty
                                        ----
                                    @endforelse
                                </div>

                            </div>
                        </div>
                        @endunless
                    </div>
                <div class=" d-flex justify-content-between">
                    <a href="{{route('admin.roles.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                </form>
            </div>
           </div>
       </div>
    </div>

</x-app-admin-layout>
