
<style>
    .card.shadow-sm:hover {
        background-color: #e6f7ff; /* Мятный цвет при наведении */
        transition: background-color 0.3s ease; /* Плавное изменение цвета */
        transform: scale(1.05); /* Увеличение при наведении */
    }

    .card.shadow-sm {
        transition: transform 0.3s ease; /* Плавное изменение размера */
    }
</style>

<div class="row product-container">
    @foreach($products as $index => $product)
        <div class="col-lg-3 col-6 mb-2 {{ $index >= 20 ? 'hidden-product' : '' }} {{ $index >= 6 && $index < 20 ? 'd-none d-lg-block' : '' }}">
            <a class="card shadow-sm text-decoration-none" href="{{route('request.product', ['domain_name' => $product->domain_name])}}">
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
                <div class="card-body">
                    <p class="card-text truncated-text">
                        {{ \Illuminate\Support\Str::limit($product->description, 1 * 80, $end='...') }}
                        <span class="full-text" style="display: none;">{{ $product->description }}</span>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary show-more">Показать весь текст</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
<div class="row">
    <button id="showMoreBtn" class="btn btn-outline-primary mt-3">Показать больше <i class="bi bi-chevron-down"></i></button>
</div>

<style>
    .hidden-product {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showMoreBtn = document.getElementById('showMoreBtn');
        const hiddenProducts = document.querySelectorAll('.product-container .hidden-product');

        showMoreBtn.addEventListener('click', function () {
            hiddenProducts.forEach(function (product) {
                product.classList.remove('hidden-product');
            });

            // Скройте кнопку после отображения всех продуктов
            showMoreBtn.style.display = 'none';
        });
    });
</script>
