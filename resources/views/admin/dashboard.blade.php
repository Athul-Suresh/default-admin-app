<x-app-admin-layout>
    <x-slot name="header">{{ __(' Dashboard') }}</x-slot>

    <div class="row">
        <div class="col-lg-12">


           <h4> Welcome back {{Auth::user()->name}} ! </h4>

        </div>

    </div>
</x-app-admin-layout>
