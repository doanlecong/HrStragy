@if($custStory != null)
    <h3 class="background-green text-center"><a class="btn btn-warning btn-block green-text box-shadown-light-dark" title="Edit this Story" href="{{ route('customer_story.edit', $custStory->id) }}"><i class="fa fa-pencil fa-2x"></i></a></h3>
    <h2 class="font-playfair green-text text-shadown-black text-center">{{ $custStory->title }}</h2>
    <h5>Writer : {{ $custStory->writer }}</h5>
    <p>Description : <br> {{ strip_tags($custStory->description)  }}</p>
    <div class="text-center">
        <div class="w-50 ml-auto mr-auto">
            <img class="image-full-width border-around-green box-shadown-light-dark" src="{{ $custStory->image_thumb }}">
        </div>
    </div>
    <hr>
    <p class="text-20">Content :</p>
    <div class="padding-around-20">
        {!! $custStory->content !!}
    </div>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif