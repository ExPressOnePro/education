@extends('layouts.app')
@section('title') Domain.md @endsection
@section('content')

    <div class="row">
        <div class="col-lg-2 d-none d-lg-block">
            <div class="position-sticky" style="top: 6rem; height: 100vh;">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary rounded-2">
                    <a href="/" class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4">Категории</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">
                                категория 1
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                                категория 2
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                                категория 3
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                                категория 4
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                                категория 5
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-center align-items-center">
                            <strong class="h2 text-center align-items-center">Продается</strong>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                @if (isset($product) && count($product->images ?? []) > 0)
                                    @foreach ($product->images as $image)
                                        <img src="{{asset('/storage/'. $image->image_path) }}" alt="Product Image" width="100%" height="225">
                                    @endforeach
                                @else
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c"></rect>
                                        <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                                    </svg>
                                @endif

                            </div>
                            <div class="col-3">
                                <div class="row py-4">
                                    <div class="col-12 d-flex justify-content-center align-items-center text-center">
                                        <div class="h6">
                                            <p><i class="fa fa-eye" title="Просмотров" id="eye-icon" tabindex="0" data-bs-toggle="popover" data-bs-placement="bottom"></i>
                                                {{$product->views}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center text-center">
                                        <div class="h6">
                                            <p><i class="fa fa-heart" title="Понравилось" id="eye-icon" tabindex="0" data-bs-toggle="popover" data-bs-placement="bottom"></i>
                                                {{$product->likes}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-4">
                                    <div class="col-12 d-flex justify-content-center align-items-center text-center">
                                        <div class="h6">
                                            <p><i class="fa fa-envelope" title="Заказали" id="eye-icon" tabindex="0" data-bs-toggle="popover" data-bs-placement="bottom"></i>
                                                {{$product->orders}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="image-form" method="post" enctype="multipart/form-data">
                                @csrf

                                <label for="image">Выберите изображение:</label>
                                <input type="file" name="image" id="image" accept="image/*" required>

                                <button type="submit" onclick="imageUpload(event)">Загрузить</button>
                            </form>
                            <script>
                                function imageUpload(event) {
                                    event.preventDefault();

                                    var formElement = document.getElementById('image-form');
                                    var formData = new FormData(formElement);

                                    // Append CSRF token
                                    formData.append('_token', '{{ csrf_token() }}');

                                    $.ajax({
                                        url: '{{ route('product.images.store', $product->id) }}',
                                        type: 'POST',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(response) {
                                            if (response.error) {
                                                console.log('Server error:', response.error);
                                            } else {
                                                console.log('Success:', true);
                                                window.location.reload();
                                            }
                                        },
                                        error: function(xhr) {
                                            var errors = xhr.responseJSON.errors;

                                            $("#error-messages").empty(); // Clear previous error messages

                                            for (error in errors) {
                                                // Handle errors and display messages to the user
                                                var errorMessage = '<span class="form-error">' + errors[error][0] + '</span>';
                                                $("#error-messages").append(errorMessage);
                                            }
                                        }
                                    });
                                }

                            </script>
                        </div>

                        <div class="card-body">
                            <p class="card-text text-center">{{ $product->description }}</p>
                            <div class="mb-1 text-body-secondary">Возраст</div>
                            <p class="card-text">{{$product->age}}</p>
                            <strong class="d-inline-block mb-2 text-primary-emphasis">Преимущества</strong>
                            <div class="row">
                                <p class="card-text text-center">
                                    {{$product->advantages}}
                                </p>
                            </div>


                            <div class="d-flex flex-wrap gap-2 justify-content-center py-5 flex-md-row">
                                @foreach($productCategories as $productCategory)
                                    <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                        {{$productCategory->name}}
                                    </a>
                                @endforeach
                            </div>
                            <div class="d-flex flex-wrap gap-2 justify-content-center flex-md-row">
                                <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-warning-subtle border border-primary-subtle rounded-pill">
                                    Keyword 1
                                </a>
                                <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-warning-subtle border border-primary-subtle rounded-pill">
                                    Keyword 2
                                </a>
                                <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-warning-subtle border border-primary-subtle rounded-pill">
                                    keyword 3
                                </a>
                                <a class="fs-6 badge d-flex text-center text-decoration-none align-items-center p-1 pe-2 text-primary-emphasis bg-warning-subtle border border-primary-subtle rounded-pill">
                                    keyword 4
                                </a>
                            </div>
                            {{--                            <div class="d-flex justify-content-between align-items-center">--}}
                            {{--                                <div class="btn-group">--}}
                            {{--                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                            {{--                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                            {{--                                </div>--}}
                            {{--                                <small class="text-body-secondary">9 mins</small>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header text-center align-items-center">
                            <strong class="h2 text-center align-items-center">text</strong>
                        </div>
                        <div class="card-body justify-content-center align-items-center">
                            <form class="vstack px-5 mx-auto gap-2">
                                <!-- Name input -->
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-2" name="name" id="name" placeholder="Ваше имя">
                                    <label for="floatingInput">Ваше имя</label>
                                </div>
                                <!-- Email input -->
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control rounded-2" name="email" id="email" placeholder="Ваше почта">
                                    <label for="floatingInput">Ваше почта</label>
                                </div>

                                <!-- phone input -->
                                <div class="form-floating mb-2">
                                    <input type="tel" class="form-control rounded-2" name="tel" id="tel" placeholder="Ваш номер телефона">
                                    <label for="floatingInput">Ваш номер телефона</label>
                                </div>

                                <!-- Message input -->
                                <div  class="form-floating mb-2">
                                    <textarea class="form-control" id="form4Example3" rows="2" placeholder="Ваш номер телефона"></textarea>
                                    <label class="form-label" for="form4Example3">Сообщение</label>
                                </div>

                                <button type="button" class="btn btn-primary mb-4">отправить</button>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header text-center align-items-center">
                            <strong class="h2 text-center align-items-center">text</strong>
                        </div>
                        <div class="card-body justify-content-center align-items-center">
                            <div class="row row-cols-1 vstack px-5 mx-auto gap-2">
                                <div class="col d-flex align-items-start">
                                    <i class="bi bi-telegram fs-5 text-body-secondary flex-shrink-0 me-3"></i>
                                    <div>
                                        <p class="fw-bold mb-0 fs-4 text-body-emphasis">Чат телеграм</p>
                                    </div>
                                </div>
                                <div class="col d-flex align-items-start">
                                    <i class="bi bi-instagram fs-5 text-body-secondary flex-shrink-0 me-3" ></i>
                                    <div>
                                        <h3 class="fw-bold mb-0 fs-5 text-body-emphasis">Instagram</h3>
                                    </div>
                                </div>
                                <div class="col d-flex align-items-start">
                                    <i class="bi bi-telephone fs-5 text-body-secondary flex-shrink-0 me-3" ></i>
                                    <div>
                                        <h3 class="fw-bold mb-0 fs-5 text-body-emphasis">Телефон</h3>
                                    </div>
                                </div>
                                <div class="col d-flex align-items-start">
                                    <i class="bi bi-envelope-at fs-5 text-body-secondary flex-shrink-0 me-3" ></i>
                                    <div>
                                        <h3 class="fw-bold mb-0 fs-5 text-body-emphasis">Email</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @include('pages.components.products_list')
            </div>
        </div>
    </div>

@endsection
