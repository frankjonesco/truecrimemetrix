<x-layout>
    <div class="container">
        <h1>Create a Criminal</h1>

        <div class="form-card">
            <form action="/criminals/store" method="post">
                @csrf
                <label for="first_name">First name</label>
                <input type="text" name="first_name">

                <label for="last_name">Last name</label>
                <input type="text" name="last_name">

                <label>Date of Birth</label>
                <input type="text" name="dob_day" class="w-8 text-center mr-2">
                <span>/</span>
                <input type="text" name="dob_month" class="w-8 text-center mx-2">
                <span>/</span>
                <input type="text" name="dob_year" class="w-14 text-center ml-2">

                <button type="submit" class="block bg-yellow-100 hover:bg-gray-100 text-gray-900 text-sm px-1.5 py-0.5 mt-4">Add criminal</button>
            </form>
        </div>
    </div>
</x-layout>