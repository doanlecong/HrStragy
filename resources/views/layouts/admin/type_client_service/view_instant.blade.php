@if($type != null)
    <h2 class="font-playfair green-text text-shadown-black text-center">{{ $type->name }}</h2>
    <div class="text-center">
        <div class="w-50 ml-auto mr-auto">
            <img class="image-full-width border-around-green box-shadown-light-dark" src="{{ $type->image }}">
        </div>
    </div>

    <div class="padding-around-20">
        {!! strip_tags($type->descript) !!}
    </div>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif