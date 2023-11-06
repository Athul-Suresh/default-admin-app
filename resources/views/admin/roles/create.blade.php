<x-app-admin-layout>
    <x-slot name="header">{{ __('Roles') }}</x-slot>

    <div class="row">
       <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Add Role</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.roles.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputname" class="form-label">{{ __('Role Name') }}</label>
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
                                @forelse ($permissions as $permission)
                                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @empty
                                ----
                            @endforelse
                            </div>
                        </div>
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
