<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($slides as $key => $slide)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('/storage/'. $slide->photo) }}" alt="Product Image" class="img-fluid"  width="100%" height="100%">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h2>{{ $slide->title }}</h2>
                        <p class="opacity-75">{{ $slide->content }}</p>
                        @auth
                            @if(Auth::user()->role === 'Admin')
                                <p><button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $slide->id }}">Editează</button></p>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            @auth
                @if(Auth::user()->role === 'Admin')
            <div class="modal fade" id="editModal{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $slide->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $slide->id }}">Editați diapozitivul</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm{{ $slide->id }}" method="post" action="{{ route('slides.update', $slide->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="editTitle{{ $slide->id }}" class="form-label">Titlu</label>
                                    <input type="text" class="form-control" id="editTitle{{ $slide->id }}" name="title" value="{{ $slide->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="editContent{{ $slide->id }}" class="form-label">Conţinut</label>
                                    <textarea class="form-control" id="editContent{{ $slide->id }}" name="content">{{ $slide->content }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editPhoto{{ $slide->id }}" class="form-label">Selectați <Fotografie></Fotografie></label>
                                    <input type="file" class="form-control" id="editPhoto{{ $slide->id }}" name="photo">
                                </div>
                                <button type="submit" class="btn btn-primary">Salvați</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
               @endif
            @endauth
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<hr class="featurette-divider">

<div class="row featurette row-cols-2 row-cols-sm-2 g-3">
    @foreach($posts as $post)
        <a class="col text-decoration-none" href="{{ route('post',$post->id) }}">
            <div class="card shadow-sm h-100">
                @php
                    $photos = json_decode($post->photos);
                @endphp
                @if (!empty($photos))
                    <img src="{{ asset($photos[0]) }}" alt="First Photo" class="img img-fluid img-cover card-img-top">
                @else
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="No photo" preserveAspectRatio="xMidYMid slice" focusable="false"><title>No photo</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">No photo</text></svg>
                @endif
                <div class="card-body">
                    <h5 class="card-text">{{ $post->title }}</h5>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-body-secondary">{{ $post->created_at }}</small>
                </div>
            </div>
        </a>
    @endforeach
</div>
