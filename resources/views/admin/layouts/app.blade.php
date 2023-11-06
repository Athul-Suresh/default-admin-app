<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('admin.layouts.partials.styles')

    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


        @include('admin.layouts.includes.nav')
        @include('admin.layouts.includes.aside')


          <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if (isset($header))
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> {{ $header }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> {{ $header }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if(session('alert'))
            <x-alert :type="session('alert')['type']">
                {{ session('alert')['message'] }}
            </x-alert>
            @endif
            {{ $slot }}
      </div>
    </section>
  </div>
  @include('admin.layouts.includes.footer')
</div>

@include('admin.layouts.partials.scripts')
</body>

</html>
