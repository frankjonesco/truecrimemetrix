{{-- SITE FOOTER --}}


<footer id="siteFooter">


    {{-- SITE LOGO --}}

    <a
        href="/"
        title="Go to True Crime Metrix homepage"
        aria-label="Go to True Crime Metrix homepage"
        class="logo"
    >
        {{config('app.name')}}
    </a>


    {{-- MENU --}}

    <ul class="menu">

        <li>
            <a 
                href="/about"
                title="About {{config('app.name')}}"
                aria-label="About {{config('app.name')}}"
            >
                About
            </a>
        </li>

        <li>
            <a 
                href="/contact-us"
                title="Contact us"
                aria-label="Contact us"
            >
                Contact us
            </a>
        </li>

        <li>
            <a 
                href="/opportunities"
                title="Opportunities at {{config('app.name')}}"
                aria-label="Opportunities at {{config('app.name')}}"
            >
                Opportunities
            </a>
        </li>

        <li>
            <a 
                href="/privacy-policy"
                title="View privacy policy"
                aria-label="View privacy policy"
            >
                Privacy policy
            </a>
        </li>

        <li>
            <a 
                href="/terms-of-use"
                title="View terms of use"
                aria-label="View terms of use"
            >
                Terms of use
            </a>
        </li>

    </ul>


    {{-- SOCIAL NETWORKS --}}

    <ul class="socials">

        <li>
            Stay connected
        </li>

        <li>
            <a 
                href="#"
                title="Follow {{config('app.name')}} on Facebook"
                aria-label="Follow {{config('app.name')}} on Facebook"
            >
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </li>

        <li>
            <a
                href="#"
                title="Follow {{config('app.name')}} on Twitter"
                aria-label="Follow {{config('app.name')}} on Twitter"
            >
                <i class="fa-brands fa-twitter"></i>
            </a>
        </li>

        <li>
            <a
                href="#"
                title="Find {{config('app.name')}} on YouTube"
                aria-label="Find {{config('app.name')}} on YouTube"
            >
                <i class="fa-brands fa-youtube"></i>
            </a>
        </li>

        <li>
            <a
                href="#"
                title="Follow {{config('app.name')}} on Instagram"
                aria-label="Follow {{config('app.name')}} on Instagram"
            >
                <i class="fa-brands fa-instagram"></i>
            </a>
        </li>

    </ul>



    {{-- LEGALS --}}

    <div class="legals">
        <span>
            {{config('app.name')}} Ltd.
        </span>
        <span>
            All rights reserved. &copy; {{date('Y', time())}}
        </span>
        <span>
            Powered by 
            <a 
                href="https://soapboxcoder.com"
                target="_blank"
                title="Go to soapboxcoder.com"
                aria-label="Go to soapboxcoder.com"
            >
                SoapboxCoder
            </a>
        </span>
    </div>
        

</footer>
