<x-app-admin-layout>
    <x-slot name="header">{{ __('Roles') }}</x-slot>


    <div class="row">
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h5>All Roles</h5>
                    <a href="{{route('admin.roles.create')}}" class="btn btn-primary m-2">Add</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="roles">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>#Permission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->permissions()->count()}}</td>
                                <td>
                                    <div class="d-flex align-item-center g-2">
                                        @can('role list')
                                        <a href="{{route('admin.roles.show', $role)}}" class="">
                                            <i class="fas fa-eye text-info mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('role edit')
                                        <a href="{{route('admin.roles.edit', $role)}}" class="">
                                            <i class="fas fa-edit text-warning mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('role delete')
                                        <form method="POST" action="{{ route('admin.roles.destroy', $role) }}">
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
                            <th colspan="2">No Roles</th>
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
            $("#roles").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

        });
    </script>
@endpush
</x-app-admin-layout>
