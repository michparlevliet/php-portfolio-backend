@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Experiences</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Title</th>
            <th>Content</th>
            <th>Skills</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($experiences as $experience): ?>
            <tr>
                <td>{{$experience->title}}</td>
                <td>{{$experience->content}}</td>
                <td>
                    <ul>
                <?php foreach ($skills as $skill): ?>
                        <li>{{$skill->title}}
                <?php endforeach; ?>
                    <ul>
                </td>
                <td>{{ \Carbon\Carbon::parse($experience->learned_at)->format('d/m/Y ')}}</td>
                <td>{{ \Carbon\Carbon::parse($experience->ended_at)->format('d/m/Y ')}}</td>
                <td><a href="/console/experiences/edit/{{$experience->id}}">Edit</a></td>
                <td><a href="/console/experiences/delete/{{$experience->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/experiences/add" class="w3-button w3-green">New experience</a>

</section>

@endsection