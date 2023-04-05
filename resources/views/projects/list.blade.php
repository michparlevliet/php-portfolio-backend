@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Projects</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>
                    @if ($project->image)
                        <img src="{{asset('storage/'.$project->image)}}" width="200">
                    @endif
                </td>
                <td>{{$project->title}}</td>
                <td>
                    <a href="/project/{{$project->slug}}">
                        {{$project->slug}}
                    </a>
                </td>
                <td>{{$project->type->title}}</td>
                <td>{{$project->created_at->format('M j, Y')}}</td>
                <td><a href="/console/projects/image/{{$project->id}}">Image</a></td>
                <td><a href="/console/projects/edit/{{$project->id}}">Edit</a></td>
                <td><a href="/console/projects/delete/{{$project->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/projects/add" class="w3-button w3-green">New Project</a>

</section>

@endsection
