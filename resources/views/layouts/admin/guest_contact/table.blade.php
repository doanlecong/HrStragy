<table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Title</th>
        <th>Content</th>
        <th><button class="btn bg-transparent border-around-green box-shadown-light-dark filterStatusData">Status</button></th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>

    <tbody id="databody">
    @if($count > 0)
        @foreach ($guests as $t)
            <tr id="row{{$t->id}}">
                <td>{{$t->id}}</td>
                <td title="{{ strip_tags($t->name)}}">{{ strip_tags(mb_substr($t->name,0, 100))}}</td>
                <td title="{{ strip_tags($t->address) }}">{{ strip_tags(mb_substr($t->address,0, 50)) }}</td>
                <td>{{ strip_tags(mb_substr($t->email,0, 100)) }}</td>
                <td>{{ strip_tags($t->phone) }}</td>
                <td title="{{ strip_tags($t->title) }}">{{ strip_tags(mb_substr($t->title, 0, 50)) }}</td>
                <td title="{{ strip_tags($t->content) }}">{{ strip_tags(mb_substr($t->content, 0, 50)) }}</td>
                <td id="tdrow{{ $t->id }}">
                    @if($t->status == config('global.statusActive'))
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('guest_contact.toggleRead', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.read'.$t->status) }}</span>
                    @else
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('guest_contact.toggleRead', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.read'.$t->status) }}</span>
                    @endif
                </td>
                <td>{{ $t->created_at->format('F d, Y') }}</td>
                <td>
                    {{--<a href="{{ route('job.createJobForCompany', $t->id) }}" title="Add new job for this Company"--}}
                       {{--class="btn background-green white-text box-shadown-light-dark mr-1 mt-1"--}}
                       {{--style="margin-right: 3px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
                    <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                            data-href="{{ route('guest_contact.viewInstant',$t->id) }}"><i
                                class="fa fa-bolt"></i></button>
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('guest_contact.delete', $t->id) }}', {{ $t->id }})">
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
{{ $guests->links() }}