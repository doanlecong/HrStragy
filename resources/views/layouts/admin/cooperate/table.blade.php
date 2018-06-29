@if($count > 0)
    @foreach ($coops as $t)
        <tr id="row{{$t->id}}">
            <td>{{ $t->order }}</td>
            <td title="{{ strip_tags($t->title)}}">{{ strip_tags(mb_substr($t->title,0, 100))}}</td>
            <td>
                @if($t->image_small != null && $t->image_small != 'NULL')
                    <div>
                        <img class="box-shadown-darkblue" src="{{$t->image_small}}" data-toggle="modal"
                             data-target="#modalShowImage{{$t->id}}" style="width: 50px; height: 40px;">
                        <div class="modal" id="modalShowImage{{$t->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                <div class="modal-content no-border-radius">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hình Đại Diện :</h5>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $t->image_small }}" style="width: 100%;height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <img src="{{asset('images/empty.png')}}" class="rounded"
                         style="width: 50px; height: 50px;">
                @endif
            </td>
            <td>
                @if($t->image_big != null && $t->image_big != 'NULL')
                    <div>
                        <img class="box-shadown-darkblue" src="{{$t->image_big}}" data-toggle="modal"
                             data-target="#modalShowImageBig{{$t->id}}" style="width: 50px; height: 40px;">
                        <div class="modal" id="modalShowImageBig{{$t->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                <div class="modal-content no-border-radius">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hình Đại Diện : </h5>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $t->image_big }}" style="width: 100%;height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <img src="{{asset('images/empty.png')}}" class="rounded"
                         style="width: 50px; height: 50px;">
                @endif
            </td>
            <td>{{ strip_tags(mb_substr($t->descript,0, 100)) }}</td>

            <td>
                @if($count != 1)
                    @if($min == $t->order)
                        <span><button class="btn btn-primary changeOrder" title="Move Down" data-href="{{route('cooperate.moveDown',$t->id)}}"><i class="fa fa-arrow-down"></i></button></span>
                    @elseif($max == $t->order)
                        <span><button class="btn btn-primary changeOrder" title="Move Up" data-href="{{ route('cooperate.moveUp',$t->id) }}"><i class="fa fa-arrow-up"></i></button></span>
                    @else
                        <span class="d-inline-block"><button class="btn btn-primary changeOrder mr-1 mt-1" title="Move Up" data-href="{{ route('cooperate.moveUp',$t->id) }}"><i class="fa fa-arrow-up"></i></button> <button class="btn btn-primary changeOrder mt-1" title="Move Down" data-href="{{ route('cooperate.moveDown', $t->id) }}"><i class="fa fa-arrow-down"></i></button></span>
                    @endif
                @endif
            </td>
            <td>
                @if($t->status == config('global.statusActive'))
                    <span style="cursor: pointer;" data-href="{{ route('cooperate.toggleShow', $t->id) }}" title="Click to show or hide this in customer's page" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                @else
                    <span style="cursor: pointer;" data-href="{{ route('cooperate.toggleShow', $t->id) }}" title="Click to show or hide this in customer's page" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                @endif
            </td>
            <td>{{ $t->created_at->format('F d, Y h:ia') }}</td>
            <td>
                <button class="btn btn-primary out-line-blue view-service mt-1 mr-1" title="View" data-href="{{ route('cooperate.viewInstant',$t->id) }}"><i class="fa fa-bolt"></i></button>
                <a href="{{ route('cooperate.edit', $t->id) }}" class="btn btn-info box-shadown-light-dark mt-1 mr-1" style="margin-right: 3px;">Edit</a>
                <button  class="btn btn-danger  box-shadown-light-dark mt-1" style="margin-right: 3px;" onclick="deleteService('{{ route('cooperate.delete', $t->id) }}', {{ $t->id }})"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="9" class="text-center">
            <h3><i class="fa fa-cube"></i> No Data For Now</h3>
        </td>
    </tr>
@endif