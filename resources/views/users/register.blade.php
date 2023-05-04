<x-layout>
    <div class="container">
        <h1>Sign up</h1>
        <h2 class="text-center">Enter your email & password to log in to True Crime Metrix.</h2>
        <form action="/users/store" method="post" class="mx-auto w-2/5 mt-16 flex flex-col">
            @csrf
            {{-- First name --}}
            @error('first_name')
                <p class="form-error">
                    Enter your first name
                </p>
            @enderror
            <input type="text" name="first_name" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="First name" value="{{old('first_name')}}" autofocus>
            
            {{-- Last name --}}
            @error('last_name')
                <p class="form-error">
                    Enter your last name
                </p>
            @enderror
            <input type="text" name="last_name" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Last name" value="{{old('last_name')}}">
            
            {{-- Email --}}
            @error('email')
                <p class="form-error">
                    Enter your email address
                </p>
            @enderror
            <input type="text" name="email" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Email" value="{{old('email')}}">

            {{-- Password --}}
            @error('password')
                <p class="form-error">
                    {{$message}}
                </p>
            @else
                @error('terms')
                    <p class="form-error">
                        Please re-enter your password
                    </p>
                @enderror
            @enderror
            <input type="password" name="password" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center" placeholder="Password">
            
            {{-- Password confirmation --}}
            @error('password_confirmation')
                <p class="form-error">
                    {{$message}}
                </p>
            @enderror
            <input type="password" name="password_confirmation" class="w-full text-3xl text-thin placeholder-gray-300 placeholder-thin text-center " placeholder="Confirm password">
            
            {{-- Terms & conditions --}}
            @error('terms')
                <p class="form-error mb-6">
                    Agree to the terms & conditions
                </p>
            @enderror
            <div class="flex items-center !mb-10 mx-auto">
                @error('terms')
                    <input type="checkbox" name="agree_terms" value="1" class="!bg-red-50 !border-red-300">
                @else
                    <input type="checkbox" name="agree_terms" value="1" class="">
                @enderror
                <span class="block text-gray-500">
                    I agree to the <a href="/terms">terms & conditions</a>.
                </span>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-900 text-white hover:text-gray-900 border border-gray-600 text-3xl px-8 py-3 mb-6 animate-150-in hover:-translate-y-1 hover:shadow-xl hover:bg-amber-300">Sign up</button>
            </div>
            
        </form>
        <div class="flex justify-center">
            <a href="/login" class="bg-white text-center text-gray-900 hover:text-gray-900 border border-gray-600 text-3xl px-8 py-3 mx-auto inline-block no-underline animate-150-in hover:-translate-y-1 hover:shadow-xl hover:bg-amber-300">Go to login</a>
        </div>
        
    </div>
</x-layout>