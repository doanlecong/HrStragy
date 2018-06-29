@if($service != null)
    <h2 class="font-playfair green-text text-shadown-black text-center">{{ $service->title }}</h2>
    <div class="text-center">
        <div class="w-50 ml-auto mr-auto">
            <img class="image-full-width border-around-green box-shadown-light-dark" src="{{ $service->image }}">
        </div>
    </div>

    <div class="padding-around-20">
        {!! $service->content !!}
    </div>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif