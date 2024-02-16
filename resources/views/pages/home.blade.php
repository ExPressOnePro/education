@extends('layouts.app')
@section('title') Gimnaziul Semeni @endsection
@section('content')


    <div id="preloader" class="text-center" style="display: none;">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">...</span>
        </div>
    </div>
    @if(Request::is('/'))
        <div id="dynamic-content-main"></div>

        <script>
            $(document).ready(function () {
                loadDynamicContent('menu');
            });

            function loadDynamicContent(page) {
                $('#preloader').show();
                $.ajax({
                    url: "{{ route('page.main') }}",
                    type: "GET",
                    success: function (data) {
                        $('#preloader').hide();
                        $('#dynamic-content-main').html(data);
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        console.error(error);
                    }
                });
            }
        </script>
    @elseif(Request::is('contacts*'))
        <div id="dynamic-content-about"></div>

        <script>
            $(document).ready(function () {
                loadDynamicContent('menu');
            });

            function loadDynamicContent(page) {
                $('#preloader').show();
                $.ajax({
                    url: "{{ route('aboutAjax') }}",
                    type: "GET",
                    success: function (data) {
                        $('#preloader').hide();
                        $('#dynamic-content-about').html(data);
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        console.error(error);
                    }
                });
            }
        </script>
    @elseif(Request::is('news*'))
        <div id="dynamic-content-posts"></div>

        <script>
            $(document).ready(function () {
                loadDynamicContent('menu');
            });

            function loadDynamicContent(page) {
                $('#preloader').show();
                $.ajax({
                    url: "{{ route('postsAjax') }}",
                    type: "GET",
                    success: function (data) {
                        $('#preloader').hide();
                        $('#dynamic-content-posts').html(data);
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        console.error(error);
                    }
                });
            }
        </script>
    @elseif(Request::is('post*'))
        <div id="dynamic-content-post"></div>

        <script>
            $(document).ready(function () {
                var url = window.location.href;
                var id = url.substring(url.lastIndexOf('/') + 1);
                loadDynamicContent('menu', id);
            });

            function loadDynamicContent(page, id) {
                $('#preloader').show();
                $.ajax({
                    url: "{{ url('postJs') }}/" + id, // Генерируем URL с id
                    type: "GET",
                    success: function (data) {
                        $('#preloader').hide();
                        $('#dynamic-content-post').html(data);
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        console.error(error);
                    }
                });
            }
        </script>
    @elseif(Request::is('achizition*'))
        <div id="dynamic-content-achizition"></div>

        <script>
            $(document).ready(function () {
                loadDynamicContent('menu', );
            });

            function loadDynamicContent(page) {
                $('#preloader').show();
                $.ajax({
                    url: "{{ route('files.index') }}",
                    type: "GET",
                    success: function (data) {
                        $('#preloader').hide();
                        $('#dynamic-content-achizition').html(data);
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        console.error(error);
                    }
                });
            }
        </script>
    @endif
@endsection
