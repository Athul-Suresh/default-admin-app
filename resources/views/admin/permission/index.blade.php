<x-app-admin-layout>
    <x-slot name="header">{{ __('Permissions') }}</x-slot>


    <div class="row">
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h5>All Permissions</h5>
                    <a href="{{route('admin.permissions.create')}}" class="btn btn-primary m-2">Add</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="permissions">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>
                                    <div class="d-flex align-item-center g-2">
                                        @can('permission list')
                                        <a href="{{route('admin.permissions.show', $permission)}}" class="">
                                            <i class="fas fa-eye text-info mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('permission edit')
                                        <a href="{{route('admin.permissions.edit', $permission)}}" class="">
                                            <i class="fas fa-edit text-warning mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('permission delete')
                                        <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="#" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                <i class="fas fa-trash text-danger mx-2"></i>
                                            </a>
                                        </form>
                                        @endcan
                                </div>

                                </td>
                            </tr>
                           @empty
                           <tr>
                            <th colspan="2">No Permissions</th>
                            </tr>
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
           </div>
       </div>
    </div>
    @push('scripts')
    @include('admin.layouts.partials.datatable')
    <script>
        $(function() {
            $("#permissions").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

        });
    </script>
@endpush
</x-app-admin-layout>
