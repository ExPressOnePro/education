@extends('layouts.app')
@section('title') Domain.md @endsection
@section('content')

    <div class="row  border rounded ">
        <div class="col-md-6 p-4 d-flex flex-column position-static">
            <h3 class="mb-0">Заглавный текст</h3>
            <div class="mb-1 text-body-secondary">Второстепенный текст</div>
            <p class="mb-auto">Дополнительный текст</p>
        </div>
        <div class="col-md-6 ">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2 justify-content-center py-5 flex-md-row">
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 1
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 2
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 3
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 4
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 5
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 6
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 7
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 8
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 9
        </a>
        <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
            Категория 10
        </a>

    </div>

    @include('pages.components.products_list')
{{--        <div class="row">--}}
{{--            @foreach($products as $product)--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6 mb-2">--}}
{{--                    <a class="card shadow-sm text-decoration-none" href="{{route('request.product', ['domain_name' => $product->domain_name])}}">--}}
{{--                        @if (isset($product) && count($product->images ?? []) > 0)--}}
{{--                            @foreach ($product->images as $image)--}}
{{--                                <img src="{{asset('/storage/'. $image->image_path) }}" alt="Product Image" width="100%" height="225">--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
{{--                                <title>Placeholder</title>--}}
{{--                                <rect width="100%" height="100%" fill="#55595c"></rect>--}}
{{--                                <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>--}}
{{--                            </svg>--}}
{{--                        @endif--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-text truncated-text">--}}
{{--                                {{ \Illuminate\Support\Str::limit($product->description, 1 * 80, $end='...') }}--}}
{{--                                <span class="full-text" style="display: none;">{{ $product->description }}</span>--}}
{{--                            </p>--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div class="btn-group">--}}
{{--                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
{{--                                    <button type="button" class="btn btn-sm btn-outline-secondary show-more">Показать весь текст</button>--}}
{{--                                </div>--}}
{{--                                <small class="text-body-secondary">9 mins</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

@endsection
