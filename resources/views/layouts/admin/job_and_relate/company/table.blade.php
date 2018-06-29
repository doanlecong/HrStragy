 <table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Image</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Related Jobs</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>

    <tbody id="databody">
    @if($count > 0)
        @foreach ($comps as $t)
            <tr id="row{{$t->id}}">
                <td>{{$t->id}}</td>
                <td title="{{ strip_tags($t->title)}}">{{ strip_tags(mb_substr($t->name,0, 100))}}</td>
                <td title="{{ strip_tags($t->address) }}">{{ strip_tags(mb_substr($t->address,0, 50)) }}</td>
                <td>
                    @if($t->image != null && $t->image!= 'NULL')
                        <div>
                            <img class="box-shadown-darkblue" src="{{$t->image}}"
                                 data-toggle="modal"
                                 data-target="#modalShowImage{{$t->id}}"
                                 style="width: 50px; height: 40px;">
                            <div class="modal" id="modalShowImage{{$t->id}}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg "
                                     role="document">
                                    <div class="modal-content no-border-radius">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLongTitle">Hình Đại Diện
                                                :</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $t->image }}"
                                                 style="width: 100%;height: auto;">
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
                <td>{{ strip_tags(mb_substr($t->email,0, 100)) }}</td>
                <td>{{ strip_tags($t->phone) }}</td>
                <td>{{ $t->jobs()->count() }} <button class="btn background-green white-text box-shadown-light-dark view-relate-content" data-href="{{ route('company_job.relateJob',$t->id) }}"><i class="fa fa-bars" aria-hidden="true"></i></button></td>
                <td id="tdrow{{ $t->id }}">
                    @if($t->status == config('global.statusActive'))
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('company_job.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @else
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('company_job.toggleShow', $t->id) }}"   class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @endif
                </td>
                <td>{{ $t->created_at->format('F d, Y') }}</td>
                <td>
                    <a href="{{ route('job.create') }}" title="Add new job for this Company"
                       class="btn background-green white-text box-shadown-light-dark mr-1 mt-1"
                       style="margin-right: 3px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                            data-href="{{ route('company_job.viewInstant',$t->id) }}"><i
                                class="fa fa-bolt"></i></button>
                    <a href="{{ route('company_job.edit', $t->id) }}"
                       class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                       style="margin-right: 3px;">Edit</a>
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('company_job.delete', $t->id) }}', {{ $t->id }})">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="10" class="text-center">
                <h3><i class="fa fa-cube"></i> No Data For Now</h3>
            </td>
        </tr>
    @endif
    </tbody>
</table>
{{ $comps->links() }}