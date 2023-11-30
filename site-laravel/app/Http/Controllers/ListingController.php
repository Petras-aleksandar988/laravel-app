<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        return view('listings.index', [

            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // create form for job
    public function create()
    {
        return view('listings.create');
    }

    // store listing data
    public function store()
    {
        $formFields =   request()->validate([

            "title" => "required",
            'company' => ["required", Rule::unique('listings', 'company')],
            'location' => "required",
            'email' => ['required', 'email'],
        ]);
        $formFields['tags'] = request('tags');
        $formFields['description'] = request('description');
        $formFields['website'] = request('website');
        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store("logoImgs", "public");
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created succesfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // store listing data
    public function update(Listing $listing)
    {
        $formFields =   request()->validate([

            "title" => "required",
            'company' => "required",
            'location' => "required",
            'email' => ['required', 'email'],
        ]);
        $formFields['tags'] = request('tags');
        $formFields['description'] = request('description');
        $formFields['website'] = request('website');
        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store("logoImgs", "public");
        }

        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing updated succesfully');
    }
    

    // show single listing
    public function show(Listing $list)
    {
        return view('listings.show', [
            'listing' => $list
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return  redirect('/')->with('message', 'Listing Is Deleted!');
    }
    
    // Manage Listings
    public function manage(){

        $listings = auth()->user()->listings()->get();
       
   return view('listings.manage', ['listings' => $listings]);

    }
    
}
