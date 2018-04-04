@extends('layouts.master')

@section('title')
    View All Friends
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <h1 class="text-info">Friends on Friend Finder</h1>
    Search for Friends close by - Abuja, Benue, Lagos, Niger, Rivers


    <p>
    <form class="col-md-6 row" method='GET' action='/'>
        <div class="form-group">
            <label for="formGroupExampleInput">Location</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Location">
        </div>


        <div class="form-group">
            <label for="inputState">Friend's Info</label>
            <select id="inputState" class="form-control">
                <option selected>I Just want a summary</option>
                <option selected>Show me friend's Info</option>
                <option>...</option>
            </select>
        </div>

        <div class="form-check form-group">
            <input class="form-check-input fixCheckPadding" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Load Location Map
            </label>
        </div>


    </form>


    </p>
@endsection