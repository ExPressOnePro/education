@foreach($posts as $post)
    <div class="row featurette">
        <div class="col-md-7">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">В воскресенье, 26.11.2023, 10-ые классы имели возможность просмотреть фильм ГОЛДА</h3>
                    <div class="mb-1 text-body-secondary">02.02.2024 16:52 | просмотрено 196</div>
                </div>

            </div>
            <p>{!!$post->content !!}</p>

        </div>
        <div class="col-md-5">
            <img src="{{asset('/1.jpg') }}" alt="Product Image" class="img-fluid">
            {{--            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>--}}
        </div>
    </div>
    <hr>
@endforeach
