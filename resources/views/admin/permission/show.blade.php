<x-app-admin-layout>
    <x-slot name="header">{{ __('Permissions') }}</x-slot>


    <div class="row">
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h5>Permissions</h5>
                <a href="{{route('admin.permissions.index')}}" class="btn btn-primary m-2">list</a>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="permissions">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$permission->name}}</td>
                                </td>
                            </tr>

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
