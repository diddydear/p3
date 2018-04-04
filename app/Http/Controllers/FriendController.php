<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    //
    public function index()
    {
        return view('friends.index');
    }

    public function show($location)
    {
        return view('friends.show')->with(['location' => $location]);
    }

    /*
    * GET /friends/search
    * @Todo: 
    */
    public function search(Request $request)
    {
        // 	# ======== Temporary code to explore $request ==========

        // # See all the properties and methods available in the $request object
        // dump($request);

        // # See just the form data from the $request object
        // dump($request->all());

        // # See just the form data for a specific input, in this case a text input
        // dump($request->input('searchMe'));

        // # See just the form data for a specific input, in this case a text input
        // dump($request->input('showData'));

        // # See what the form data looks like for a checkbox
        //dump($request->has('loadMap'));

        // # Boolean to see if the request contains data for a particular field
        // dump($request->has('searchMe')); # Should be true
        // dump($request->has('publishedYear')); # There's no publishedYear input, so this should be false

        // # You can get more information about a request than just the data of the form, for example...
        // dump($request->path()); # "books/search"
        // dump($request->is('friends/search')); # True
        // dump($request->is('search')); # False
        // dump($request->fullUrl()); # http://foobooks.loc/books/search
        // dump($request->method()); # GET
        // dump($request->isMethod('post')); # False

        // # ======== End exploration of $request ==========

        // return view('friends.search');

        # Start with an empty array of search results; friends that
        # match our search query will get added to this array
        $searchResults = [];

        # Store the searchTerm in a variable for easy access
        # The second parameter (null) is what the variable
        # will be set to *if* searchTerm is not in the request.
        $searchMe = $request->input('searchMe', null);

        if ($request->input('submit')) {
            $this->validate($request, [
                'searchMe' => 'required',
                'showData' => 'required',
            ]);
        }
        # Only try and search *if* there's a searchTerm
        if ($searchMe) {
            # Open the books.json data file
            # database_path() is a Laravel helper to get the path to the database folder
            # See https://laravel.com/docs/helpers for other path related helpers
            $friendsRawData = file_get_contents(database_path('/friends.json'));

            # Decode the book JSON data into an array
            # Nothing fancy here; just a built in PHP method
            $friends = json_decode($friendsRawData, true);

            # Loop through all the book data, looking for matches
            # This code was taken from v0 of foobooks we built earlier in the semester
            foreach ($friends as $location => $friend) {
                # Case sensitive boolean check for a match
                // if ($request->has('caseSensitive')) {
                //     $match = $title == $searchTerm;
                // # Case insensitive boolean check for a match
                // } else {
                //This converts search input to lower case
                $match = strtolower($location) == strtolower($searchMe);
                // }

                # If it was a match, add it to our results
                if ($match) {
                    $searchResults[$location] = $friend;
                }
            }
        }

        # Return the view, with the searchTerm *and* searchResults (if any)
        return view('friends.search')->with([
            'searchMe' => $searchMe,
            // 'caseSensitive' => $request->has('caseSensitive'),
            'loadMap' => $request->has('loadMap'),
            'showData' => $request->input('showData'),
            'searchResults' => $searchResults
        ]);
    }

    /*
    * GET /friends/create
    */
    public function create()
    {
        return view('friends.create');
    }

    /*
    * POST /friends/
    */
    public function store(Request $request)
    {
        // dump ($request->all());
        // Eventually Code to create data in database will go here
        //This down here is a redirect 
        redirect('/friends');
    }

}
