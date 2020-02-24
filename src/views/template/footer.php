    <footer class="footer">
        <span>Desenvolvido com</span>
        <span><i class="icofont-heart text-danger mx-1"></i></span>
        <span>por Eddie</span>
    </footer>
    <script src="assets/js/clock.js">
    </script>
    <script>
        $('.escondedor-btn').on('click', () => {
            if ($('body').hasClass('hidesidebar')) {
                $('body').removeClass('hidesidebar');
                $('.sidebar').show();
            } else {
                $('body').addClass('hidesidebar');
                $('.sidebar').hide();
            }
        });
    </script>
    </body>

    </html>