<x-layout>
    <div class="container">
        <h1>Sign up</h1>
        <h2 class="text-center">Enter your email & password to log in to True Crime Metrix.</h2>
        <form action="/users/authenticate" method="post" class="mx-auto w-2/5 mt-16 flex flex-col">
            @csrf
            <input type="text" name="first_name" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="First name" autofocus>
            <input type="text" name="last_name" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Last name">
            <input type="text" name="email" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Email">
            <input type="text" name="password" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Password">
            <input type="text" name="password_confirmation" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center " placeholder="Confirm password">
            <div class="flex items-center !mb-10 mx-auto">
                <input type="checkbox" name="agree_terms" value="1" class="mr-5 w-6 h-6 text-lg font-medium !outline-white accent-lime-400 text-gray-900 border-gray-400">
                <span class="block text-gray-500">
                    I agree to the <a href="/terms">terms & conditions</a>.
                </span>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-900 text-white hover:text-gray-900 border border-gray-600 text-3xl px-8 py-3 mb-6 animate-150-in hover:-translate-y-1 hover:shadow-xl hover:shadow-xl hover:bg-amber-300">Sign up</button>
            </div>
            
        </form>
        <div class="flex justify-center">
            <a href="/login" class="bg-white text-center text-gray-900 hover:text-gray-900 border border-gray-600 text-3xl px-8 py-3 mx-auto inline-block no-underline animate-150-in hover:-translate-y-1 hover:shadow-xl hover:bg-amber-300">Go to login</a>
        </div>
        
    </div>
</x-layout>