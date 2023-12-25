<x-layout.app :pageHeadings="$pageHeadings">

        <x-cards.form class="form-sm">
            <form action="/authenticate" method="POST">
                
                @csrf

                <div class="field">

                    <label for="email">
                        Email
                    </label>

                    <input 
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{$errors->has('email') ? null : old('email')}}"
                        {{$errors->has('email') ? 'autofocus' : null}}
                    >

                </div>


                <div class="field">

                    <label for="password">
                        Password
                    </label>

                    <input 
                        type="password"
                        name="password"
                        placeholder="Password"
                        {{$errors->has('password') ? 'autofocus' : null}}
                    >

                </div>


                <div class="buttons">

                    <button type="submit" class="btn">
                        Log in
                    </button>

                </div>

            </form>

        </x-cards.form>

</x-layout.app>