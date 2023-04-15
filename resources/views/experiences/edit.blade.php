@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit experience</h2>

    <form method="post" action="/console/experiences/edit/{{$experience->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $experience->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{old('content', $experience->content)}}</textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="learned_at">Learned:</label>
            <input type="date" name="learned_at" id="learned_at" value="{{old('learned_at', $experience->learned_at)}}" required>
            
            @if ($errors->first('learned_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('learned_at')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="ended_at">Ended:</label>
            <input type="date" name="ended_at" id="ended_at" value="{{old('ended_at', $experience->ended_at)}}" required>
            
            @if ($errors->first('ended_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('ended_at')}}</span>
            @endif
        </div>
        

        <button type="submit" class="w3-button w3-green">Edit Experience</button>

    </form>

    <a href="/console/experiences/list">Back to Experience List</a>

</section>

@endsection