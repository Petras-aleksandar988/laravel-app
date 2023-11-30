@if (session()->has('message'))
    <div x-data='{show : true}' x-init ='setTimeout(()=> show = false, 3000)'  x-show='show'  class="fixed top-0 left-0 bg-lime-400 w-full opacity-80">
        <p class="text-black uppercase px-10 py-5 align-center text-center font-bold ">{{session('message')}}</p>
    </div>
@endif