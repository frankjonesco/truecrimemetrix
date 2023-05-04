<x-layout>
    <div class="container">
        <h1 class="text-center my-10">Login</h1>
        <h2 class="text-center">Enter your email & password to log in to True Crime Metrix.</h2>
        <form action="/users/authenticate" method="post" class="mx-auto w-2/5 mt-16 flex flex-col">
            @csrf
            <input type="text" name="email" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Email" autofocus>
            <input type="password" name="password" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center !mb-20" placeholder="Password">
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-900 text-white text-3xl px-8 py-3 mb-6">Log in</button>
            </div>
            
        </form>
        <div class="flex justify-center">
            <a href="/" class="bg-white text-center text-gray-900 border border-gray-600 text-3xl px-8 py-3 mx-auto inline-block no-underline">Back to home</a>
        </div>
        
    </div>
</x-layout>