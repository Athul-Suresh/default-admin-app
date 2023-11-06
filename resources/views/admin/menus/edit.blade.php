<x-app-admin-layout>
    <x-slot name="header">{{ __('Menus') }}</x-slot>

    <div class="row">
       <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit Menu</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.menus.update',$menu)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputname" class="form-label">{{ __('Menu Name') }}</label>
                                <input type="text"  name="name" value="{{old('name',$menu->name)}}" class="form-control" id="inputname">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputcode" class="form-label">{{ __('Code') }}</label>
                                <input type="text"  name="code" value="{{old('code',$menu->code)}}" class="form-control" id="inputcode">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputdescription" class="form-label">{{ __('Description') }}</label>
                                <textarea  name="description" class="form-control" id="inputdescription">{{old('description',$menu->description)}}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <a href="{{route('admin.menus.index')}}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                    </form>
                </div>
               </div>
           </div>
        </div>

    </x-app-admin-layout>
