@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Type</h2>

    <form method="post" action="/console/types/edit/{{$type->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $type->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Type</button>

    </form>

    <a href="/console/types/list">Back to Type List</a>

</section>

@endsection