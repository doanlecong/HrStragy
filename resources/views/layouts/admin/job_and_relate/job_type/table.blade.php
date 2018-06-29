<table class="table table-hover table-striped " style="font-size: 0.8rem;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Abbr</th>
        <th>Related Job Categories</th>
        <th>Related Job Levels</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Operations</th>
    </tr>
    </thead>

    <tbody id="databody">
    @if(count($jobTypes) > 0)
        @foreach($jobTypes as $t)
            <tr id="row{{$t->id}}">
                <td>{{ $t->id }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->abbr }}</td>

                <td>
                    {{ $t->jobCates()->count() }} <a title="Manage Belonged Job's Categories" href="{{ route('job_cate.index','jobtype='.$t->id) }}" class="btn btn-green white-text"><i class="fa fa-bars"></i></a>
                </td>
                <td>
                    {{ $t->jobLevels()->count() }} <a title="Manage Belonged Job's Levels" href="{{ route('job_level.index','jobtype='.$t->id) }}" class="btn btn-green white-text"><i class="fa fa-bars"></i></a>
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

                    <a href="{{ route('job_type.edit', $t->id) }}"
                       class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                       style="margin-right: 3px;">Edit</a>
                    <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                            style="margin-right: 3px;"
                            onclick="deleteService('{{ route('job_type.delete', $t->id) }}', {{ $t->id }})">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">
                <h3><i class="fa fa-cube"></i> No Data For Now</h3>
            </td>
        </tr>
    @endif
    </tbody>
</table>
{{ $jobTypes->links() }}