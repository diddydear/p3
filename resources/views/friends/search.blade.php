@extends('layouts.master')

@section('title')
    View All Friends
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <h1 class="text-info">Find Friends Nearby </h1>
    Search for Friends close by - Abuja, Benue, Lagos, Niger, Rivers


    <p>
    <form @if($searchMe) class="col-md-3 row" @else class="col-md-6 row" @endif method='GET' action='/friends/search'>
        <div class="form-group">
            <label for="formGroupExampleInput">Location</label>
            <input type="text"
                   name='searchMe'
                   placeholder='Enter Location'
                   value='{{ $searchMe}}'
                   class="form-control"
                   id="formGroupExampleInput"
                   placeholder="Location">
        </div>


        <div class="form-group">
            <label for="inputState">Friend's Info</label>
            <select id="inputState" name='showData' id='showData' class="form-control">
                <option selected>I Just want a summary</option>
                <option selected>Show me friends Info</option>
            </select>
        </div>

        <div class="form-check form-group">
            <input class="form-check-input fixCheckPadding"
                   name='loadMap'
                   type="checkbox" {{ ($loadMap) ? 'CHECKED' : '' }}>
            <label class="form-check-label" for="defaultCheck1">
                Load Location Map
            </label>

            <input type='submit' name='submit' value='Search Friend' class='form-control btn btn-info'>
        </div>


    </form>


    </p>






    <div class='col-md-9'>
        @if($searchMe)
            <h2>Results for query: <em>{{ $searchMe }}</em></h2>

            @if(count($searchResults) == 0)
                No matches found.
            @else
                @foreach($searchResults as $location => $friend)
                    <div class='friend'>
                        <div class='col-md-6'>
                            <h3>{{ $location }}</h3>
                            <h4>I am {{ $friend['name'] }}</h4>
                            Area: {{ $friend['area'] }}<br>
                            I am a {{ $friend['gender'] }}<br>
                            Loves {{ $friend['hobby'] }}<br>


                            @if($showData == 'Show me friends Info')
                                <h4>Me in 30sec.<br></h4>
                                {{ $friend['about'] }}
                            @endif

                        </div>


                        <div class='col-md-4'>
                            <img src='/{{ $friend['display_pic'] }}'
                                 class='img-fluid imgMaxHeight'
                                 alt='Friend picture from {{ $location }}'>
                        </div>

                        @if($loadMap)

                            <div class='col-md-12'>
                                <h4>My Location<br></h4>
                                <iframe src="https://maps.google.com/maps?q={{ $friend['long'] }},{{ $friend['lat'] }}&hl=es;z=14&amp;output=embed"
                                        class="map" width="600" height="600" style="border:0"></iframe>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        @endif
    </div>


    <div class='col-md-12'>
        @if($errors->get('searchMe'))
            <ul class='alert alert-danger' role='alert'>
                @foreach($errors->get('searchMe') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
