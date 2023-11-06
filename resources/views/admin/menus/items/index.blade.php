<x-app-admin-layout>
    <x-slot name="header">{{ __('Menus') }}</x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>{{$menu->name}}</h5>
                        <a href="{{ route('admin.menu.items.create', $menu->id) }}" class="btn btn-primary m-2">Add</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="menus">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Uri</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->uri }}</td>
                                        <td>
                                            <div class="d-flex align-item-center g-2">


                                                @can('menu edit')
                                                    <a href="{{ route('admin.menus.edit', $menu) }}" class="">
                                                        <i class="fas fa-edit text-warning mx-2"></i>
                                                    </a>
                                                @endcan

                                                @can('menu delete')
                                                    <form method="POST" action="{{ route('admin.menus.destroy', $menu) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#"
                                                            onclick="event.preventDefault();
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
                                        <th colspan="2">No Menus</th>
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
                $("#menus").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                });

            });
        </script>
    @endpush
</x-app-admin-layout>
