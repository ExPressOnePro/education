<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')

<body>
@include('includes.header')
<main class="container">
    @include('pages.product')
</main>
@include('includes.footer')

@include('includes.scripts')
</body>
</html>
