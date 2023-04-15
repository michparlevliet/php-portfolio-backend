@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Experience</h2>

    <form method="post" action="/console/experiences/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea name="content" id="content" value="{{old('content')}}" required></textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="learned_at">Start Date:</label>
            <input type="date" name="learned_at" id="learned_at" value="{{old('learned_at')}}" required>
            
            @if ($errors->first('learned_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('learned_at')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="ended_at">End Date:</label>
            <input type="date" name="ended_at" id="ended_at" value="{{old('ended_at')}}" required>
            
            @if ($errors->first('ended_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('ended_at')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="skill_id">Skill:</label>
            
            @foreach ($skills as $skill)
                <br>    
                <input type="checkbox" value="{{$skill->id}}" name="skills[]"
                        {{$skill->id == old('skill_id') ? 'selected' : ''}}>
                        {{$skill->title}}
                    <br>
            @endforeach

            @if ($errors->first('skill_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('skill_id')}}</span>
            @endif
        </div>
      

        <button type="submit" class="w3-button w3-green">Add Experience</button>

    </form>

    <a href="/console/experiences/list">Back to Experiences List</a>

</section>

@endsection