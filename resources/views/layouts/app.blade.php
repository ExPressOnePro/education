<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<style>

    /* Стили для обертки картыd */
    .map-container {
        width: 100%;
        height: 400px; /* Высота карты */
        position: relative;
        overflow: hidden;
    }
    /* Стили для iframe с картой */
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    .button2 {
        padding: 12px 30px;
        background: #39d196;
        color: #fff;
        font-size: 13px;
        letter-spacing: 1px;
        border-radius: 1px;
        transition: 0.2s;
        font-weight: 600;
        border: 0;
    }
    ul.hr {
        /* Обнуляем значение отступов и полей */
        margin: 0; padding: 0;
    }
    ul.hr li {
        display: inline-block; /* Строчно-блочный элемент */
        border: 1px solid #000; /* Рамка вокруг текста */
        padding: 3px; /* Поля вокруг текста */
    }


    .img {
        transition: transform 0.3s;
    }
    .img:hover {
        transform: scale(1.02);
    }

    .img:active {
        transform: scale(0.95);
    }

    .carousel {
        margin-bottom: 4rem;
    }
    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
        bottom: 3rem;
        z-index: 10;
    }

    /* Declare heights because of positioning of img element */
    .carousel-item {
        height: 32rem;
    }


    /* Center align the text within the three columns below the carousel */
    .marketing .col-lg-4 {
        margin-bottom: 1.5rem;
        text-align: center;
    }
    /* rtl:begin:ignore */
    .marketing .col-lg-4 p {
        margin-right: .75rem;
        margin-left: .75rem;
    }
    /* rtl:end:ignore */


    .featurette-divider {
        margin: 5rem 0; /* Space out the Bootstrap <hr> more */
    }

    /* Thin out the marketing headings */
    /* rtl:begin:remove */
    .featurette-heading {
        letter-spacing: -.05rem;
    }

    /* rtl:end:remove */


    @media (min-width: 40em) {
        /* Bump up size of carousel content */
        .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        .featurette-heading {
            font-size: 50px;
        }
    }

    @media (min-width: 62em) {
        .featurette-heading {
            margin-top: 7rem;
        }
    }
    .card-img-top {
        width: 100%;
        height: 225px; /* или любая другая фиксированная высота */
        object-fit: cover; /* чтобы изображения заполняли контейнер, сохраняя пропорции */
    }
    .carousel-item img {
        object-fit: cover; /* Масштабирует изображение так, чтобы оно полностью покрывало блок */
        object-position: center; /* Выравнивает изображение по центру блока */
        width: 100%;
        height: 100%;
    }

    .icon-radio {
        display: none;
    }
    .icon-radio + label i {
        font-size: 2em;
        color: #ccc; /* Цвет по умолчанию */
    }
    .icon-radio:checked + label i {
        color: #003cff; /* Цвет при выборе */
    }

    @media print {
        .header {
            display: none;
        }
    }
    .nav-header-link:hover {
        background-color: #e5e5e5;
    }
</style>
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
@include('includes.scripts')
</body>
</html>
