@if($coop != null)
<h2 class="font-playfair green-text text-shadown-black text-center">{{ $coop->title }}</h2>
<p class="text-18 font-roboto-light text-justify">
    {{ strip_tags($coop->descript) }}
</p>
<h5 class="font-roboto-light green-text">
    Link : <a href="{{ $coop->link }}" class="btn btn-round text-15 btn-green box-shadown-light-dark white-text">{{ $coop->link }}</a>
</h5>
<div class="text-center background-litle-white padding-around">
    {{--<div class="w-50 ml-auto mr-auto">--}}
        {{--<img class="image-full-width border-around-green box-shadown-light-dark" src="{{ $coop->image_small }}">--}}
    {{--</div>--}}
    <div class="w-75 ml-auto mr-auto mt-4">
        <img class="image-full-width shadow-lg" src="{{ $coop->image_big }}">
    </div>
</div>
<hr>
<h5 class="text-center font-playfair green-text ">Giới Thiệu</h5>
<div class="padding-around-20  background-litle-white">
    {!! $coop->content !!}
</div>
@else
<h5>Somethings went wrong ! May be is has been delete !</h5>
@endif