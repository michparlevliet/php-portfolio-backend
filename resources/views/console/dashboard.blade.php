@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <ul id="dashboard">
        <li class="btn"><a href="/console/projects/list">Manage Projects <i class="fa-solid fa-sheet-plastic fa-2xl"></i> </a></li>
        <li class="btn"><a href="/console/types/list">Manage Types <i class="fa-solid fa-laptop-file fa-2xl"></i> </a></li>
        <li class="btn"><a href="/console/experiences/list">Manage Experiences <i class="fa-solid fa-graduation-cap fa-2xl"></i> </a></li>
        <li class="btn"><a href="/console/skills/list">Manage Skills <i class="fa-solid fa-bars-progress fa-2xl"></i> </a></li>
        <li class="btn"><a href="/console/users/list">Manage Users <i class="fa-solid fa-users fa-2xl"></i> </a></li>
        <li class="btn"><a href="/console/logout">Log Out <i class="fa-solid fa-right-from-bracket fa-2xl"></i> </a></li>
    </ul>

</section>

@endsection
