



<form action="/" id="search_form">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
       
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-8 pr-8 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Laravel Jobs..."
        />
      
        <div class="absolute top-2 right-2">
            <!-- Button for larger screens -->
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600 hidden sm:block">
                Search
            </button>
        
            <!-- Icon for smaller screens -->
            <div class="absolute top-3 right-3 sm:hidden" id="search_icon">
                <i
                    class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                ></i>
            </div>
         
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
     
        var form = document.getElementById('search_form');
        var icon = document.getElementById('search_icon'); // Select the icon on smaller screens

        // Add a click event listener to the button
        // button.addEventListener('click', function () {
        //     form.submit(); // Submit the form
        // });

        // Add a click event listener to the icon
        icon.addEventListener('click', function () {
            form.submit(); // Submit the form
        });
    });
</script>