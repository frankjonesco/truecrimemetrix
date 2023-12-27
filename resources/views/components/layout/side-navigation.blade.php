<div class="side-nav">
    <ul>

        @foreach($navButtons as $button)

            <li>
                <button 
                    class="btn" 
                    scroll-to="{{$button['scroll-to']}}"
                >{{$button['name']}}</button>
            </li>

        @endforeach

    </ul>

</div>

<script>

    function scrollTo(element) {
        window.scroll({
            behavior: 'smooth',
            left: 0,
            top: element.offsetTop - 100
        });
    }

    var buttons = document.querySelectorAll('.btn');

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            scrollTo(document.querySelector('#' + button.getAttribute('scroll-to')));
        });
    });

</script>