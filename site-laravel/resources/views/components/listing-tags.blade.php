@props(['tagsCsv'])


@php

    $tags = explode(',' , $tagsCsv);
    $tags = array_map('trim', $tags)
@endphp


<ul class="flex">
    @foreach ($tags as $tag)
        
    <li
    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-1
     mr-2 text-xs w-min"
    >
    <a href="/?tag={{$tag}}">{{$tag}}</a>
</li>

</li>
@endforeach
</ul>