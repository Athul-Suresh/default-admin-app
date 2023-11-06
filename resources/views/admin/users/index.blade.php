<x-app-admin-layout>
    <x-slot name="header">{{ __('Users') }}</x-slot>


    <div class="row">
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h5>All Users</h5>
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary m-2">Add</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="users">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <ul>
                                        @forelse ($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                        @empty
                                        <li>---</li>
                                        @endforelse
                                    </ul>
                                </td>
                                <td>
                                    <div class="d-flex align-item-center g-2">
                                        @can('user list')
                                        <a href="{{route('admin.users.show', $user)}}" class="">
                                            <i class="fas fa-eye text-info mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('user edit')
                                        <a href="{{route('admin.users.edit', $user)}}" class="">
                                            <i class="fas fa-edit text-warning mx-2"></i>
                                        </a>
                                        @endcan
                                        @can('user delete')
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
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
                            <th colspan="2">No Users</th>
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
            $("#users").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

        });
    </script>
@endpush
</x-app-admin-layout>
