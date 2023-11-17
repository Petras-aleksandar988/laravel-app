<h1>{{$heading}}</h1>


@if (count($listings) == 0)
    <p>No Listings found</p>
@endif
@foreach ($listings as $listing)

    <h2>{{$listing['id']}}</h2>
    <a href="listings/{{$listing['id']}}"><p> {{$listing['title']}} </p></a>
    <p>{{$listing['description']}}</p>
@endforeach