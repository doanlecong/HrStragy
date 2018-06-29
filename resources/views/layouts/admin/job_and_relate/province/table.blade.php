<table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Code</th>
        <th>Name</th>
        <th>Related Districts</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>

    <tbody id="databody">
    @if(count($provinces) > 0)
        @foreach($provinces as $t)
            <tr id="row{{$t->id}}">
                <td>{{ $t->id }}</td>
                <td>{{ $t->code }}</td>
                <td>{{ $t->name }}</td>

                <td>
                    {{ $t->districts()->count() }} <a title="Manage Belonged Provinces" href="{{ route('district.index','province='.$t->id) }}" class="btn btn-green white-text"><i class="fa fa-bars"></i></a>
                </td>
                <td id="tdrow{{ $t->id }}">
                    @if($t->status == config('global.statusActive'))
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job_type.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @else
                        <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job_type.toggleShow', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                    @endif
                </td>
                <td>
                    {{ $t->created_at->format('F d, Y') }}
                </td>
                <td>

                    <a href="{{ route('province.edit',$t->id) }}"
                       class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                       style="margin-right: 3px;">Edit</a>
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('province.delete', $t->id) }}', {{ $t->id }})">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">
                <h3><i class="fa fa-cube"></i> No Data For Now</h3>
            </td>
        </tr>
    @endif
    </tbody>
</table>
{{ $provinces->links() }}