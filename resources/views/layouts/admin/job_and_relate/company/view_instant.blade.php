@if($comp != null)
    <h2 class="font-playfair green-text text-shadown-black text-center">{{ $comp->name }}</h2>
    <h5>Email : {{ $comp->email }}</h5>
    <h5>Phone : {{ $comp->phone }}</h5>
    <p>Address : <br> {{ strip_tags($comp->address)  }}</p>
    <p>Description : <br> {{ strip_tags($comp->description)  }}</p>
    <div class="text-center">
        <div class="w-50 ml-auto mr-auto">
            <img class="image-full-width border-around-green box-shadown-light-dark" src="{{ $comp->image }}">
        </div>
    </div>
    <hr>
    <div class="padding-around-20">
        {!! $comp->content !!}
    </div>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif