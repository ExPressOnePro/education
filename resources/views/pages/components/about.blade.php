
<div class="container px-4 py-5">
<h2 class="text-center mb-4">CONTACTAŢI-NE</h2>
<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">


    @foreach($contacts as $contact)
        <div class="col text-center align-items-center py-3">
            <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                @if ($loop->iteration === 1)
                    <i class="fa fa-location-dot"></i>
                @elseif ($loop->iteration === 2)
                    <i class="fa fa-phone"></i>
                @elseif ($loop->iteration === 3)
                    <i class="fa fa-solid fa-at"></i>
                @endif
            </div>
            <div>
                <h3 class="fs-2 text-body-emphasis mb-4">{{$contact->name}}</h3>
                <h4>{{$contact->contact}}</h4>
            </div>
            @auth
                @if(Auth::user()->role === 'Admin')
                    <div class="align-items-center mt-3">
                        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $contact->id }}">Editează</button>
                    </div>
                @endif
            @endauth
        </div>
        @auth
            @if(Auth::user()->role === 'Admin')
        <div class="modal fade" id="edit{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel{{ $contact->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $contact->id }}">Editați</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm{{ $contact->id }}" method="post" action="{{ route('contact.update', $contact->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="editTitle{{ $contact->id }}" class="form-label">Titlu</label>
                                <input type="text" class="form-control" id="editTitle{{ $contact->id }}" name="name" value="{{ $contact->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="editContent{{ $contact->id }}" class="form-label">Contact</label>
                                <textarea class="form-control" id="editContent{{ $contact->id }}" name="contact">{{ $contact->contact }}</textarea>
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

    <style>
        /* Стили для обертки карты */
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
    </style>
    <div class="map-container">
        <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=27.74798363183143%2C47.26833891417724%2C27.755799588900828%2C47.27156031342954&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=18/47.26995/27.75283&layers=N">Посмотреть более крупную карту</a></small></iframe>
    </div>
</div>
    <div id="contact" class="contact text-center">
        <div class="container text-center align-items-center">
            <ul>
                <li>
                    <a class="text-center align-items-center" href="https://www.facebook.com/people/Gimnaziul-Semeni/100080282674422/?paipv=0&eav=AfaMRwHR-_hLKHoPO9P_bbGyGpDDZHlLYaVMBuSd5K5s9aw59lfg7o_K_EvMgUaOT08&_rdr">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
