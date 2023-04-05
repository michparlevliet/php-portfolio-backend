@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Entry</h2>

    <form method="post" action="/console/entries/add" novalidate class="w3-margin-bottom">

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
            <textarea name="content" id="content" required>{{old('content')}}</textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="learned_at">Learned:</label>
            <input type="date" name="learned_at" id="learned_at" value="{{old('learned_at')}}" required>
            
            @if ($errors->first('learned_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('learned_at')}}</span>
            @endif
        </div>
      

        <button type="submit" class="w3-button w3-green">Add Entry</button>

    </form>

    <a href="/console/entries/list">Back to Entries List</a>

</section>

@endsection