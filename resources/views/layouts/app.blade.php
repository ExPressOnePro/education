<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')

<body>
@include('includes.header')
<main class="container">
    @include('includes.preloader')
    @yield('content')
{{--    @if(Request::is('/'))--}}
{{--        <div id="dynamic-content-main"></div>--}}

{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                loadDynamicContent('menu');--}}
{{--            });--}}

{{--            function loadDynamicContent(page) {--}}
{{--                $('#preloader').show();--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('page.main') }}",--}}
{{--                    type: "GET",--}}
{{--                    success: function (data) {--}}
{{--                        $('#preloader').hide();--}}
{{--                        $('#dynamic-content-main').html(data);--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        $('#preloader').hide();--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
{{--    @elseif(Request::is('product/*') || Request::is('product'))--}}
{{--        <div id="dynamic-content-product"></div>--}}

{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                loadDynamicContent('menu');--}}
{{--            });--}}

{{--            function loadDynamicContent(page) {--}}
{{--                $('#preloader').show();--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('page.product', $product->domain_name) }}",--}}
{{--                    type: "GET",--}}
{{--                    success: function (data) {--}}
{{--                        $('#preloader').hide();--}}
{{--                        $('#dynamic-content-product').html(data);--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        $('#preloader').hide();--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endif--}}
</main>
@include('includes.footer')

@include('includes.scripts')
</body>
</html>
