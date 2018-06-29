@if($contactUs != null)
    <h2 class="font-playfair green-text text-shadown-black">Name : {{ $contactUs->name }}</h2>
    <h5>Email : {{ $contactUs->email }}</h5>
    <h5>Phone : {{ $contactUs->phone }}</h5>
    <h5>Address : <br> {{ strip_tags($contactUs->address) }}</h5>
    <h5>Title : {!!  strip_tags($contactUs->title) !!}</h5>
    <p>Description : <br> {{ strip_tags($contactUs->content)}}</p>
    <hr>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif