<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')

<body>
@include('includes.header')

<div class="intro">
    <main class="d-flex justify-content-center">
        <div class="col-10">
            @include('includes.preloader')
            @yield('content')
        </div>
    </main>
</div>

{{--@include('includes.footer')--}}

@include('includes.scripts')
</body>
</html>
