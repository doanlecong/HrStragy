<table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Email</th>
        <th>Chuyên Ngành</th>
        <th>Location</th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>

    <tbody id="databody">
    @if($count > 0)
        @foreach ($sub as $t)
            <tr id="row{{$t->id}}">
                <td>{{$t->id}}</td>
                <td title="{{ strip_tags($t->email)}}">{{ strip_tags(mb_substr($t->email,0, 100))}}</td>
                <td>{{ $t->jobType->abbr." -- ".strip_tags(mb_substr($t->jobType->name,0, 100)) }}</td>
                <td>{{ $t->province->name." -- ".$t->province->country->name }}</td>

                <td>{{ $t->created_at->format('F d, Y') }}</td>
                <td>
                    {{--<a href="{{ route('job.createJobForCompany', $t->id) }}" title="Add new job for this Company"--}}
                       {{--class="btn background-green white-text box-shadown-light-dark mr-1 mt-1"--}}
                       {{--style="margin-right: 3px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('mailsubscriber.delete', $t->id) }}', {{ $t->id }})">
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
{{ $sub->links() }}