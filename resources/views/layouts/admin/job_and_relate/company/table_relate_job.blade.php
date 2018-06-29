<table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Company</th>
        <th>Salary</th>
        <th>Valid In (From - To)</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody id="databody">
    @if($count > 0)
        @foreach ($jobs as $t)
            <tr id="row{{$t->id}}">
                <td>{{$t->id}}</td>
                <td title="{{ strip_tags($t->job_name)}}">{{ strip_tags(mb_substr($t->job_name,0, 100))}}</td>
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
                <td>{{ strip_tags(mb_substr($t->company->name,0, 100)) }}</td>
                <td>{{ strip_tags(mb_substr($t->salary, 0, 30)) }}</td>
                <td>{{ $t->time_from }} -- {{ $t->time_to }}</td>
                <td title="{{ strip_tags($t->description) }}">{{ strip_tags(mb_substr($t->description, 0, 50)) }}</td>
                <td id="tdrow{{ $t->id }}">
                    @if($t->status == config('global.statusActive'))
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @else
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job.toggleShow', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @endif
                </td>
                <td>{{ $t->created_at->format('F d, Y') }}</td>
                <td>
                    <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                            data-href="{{ route('job.viewInstant',$t->id) }}"><i
                                class="fa fa-bolt"></i></button>
                    <a href="{{ route('job.edit', $t->id) }}"
                       class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                       style="margin-right: 3px;">Edit</a>
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('job.delete', $t->id) }}', {{ $t->id }})">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="10" class="text-center">
                <h3 class="green-text"><i class="fa fa-cube"></i> No Data For Now</h3>
            </td>
        </tr>
    @endif
    </tbody>
</table>
{{ $jobs->links() }}