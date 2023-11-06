<x-app-admin-layout>
    <x-slot name="header">{{ __('Permissions') }}</x-slot>

    <div class="row">
       <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Add Permission</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.permissions.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputname" class="form-label">{{ __('Permission Name') }}</label>
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
                                <label for="inputgroup" class="form-label">{{ __('Group Name') }}</label>
                                <input type="text"  name="group" value="{{old('group')}}" class="form-control" id="inputgroup">
                                @error('group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                <div class=" d-flex justify-content-between">
                    <a href="{{route('admin.permissions.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                </form>
            </div>
           </div>
       </div>
    </div>

</x-app-admin-layout>
