        <?php if(isset($data['page'])){ ?>
        <footer>
            <div class="container mx-auto py-6 md:py-0">
                <div class="rounded-lg px-10 py-20 flex flex-col md:flex-row justify-between shadow-2xl">
                    <div>
                        <img src="<?= base_url ?>public/images/logo.webp" width="150px" alt="">
                        <div class="flex items-center mt-5 gap-4 text-fgb-blue-dark">
                            <svg width="25" height="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 2h-3a5 5 0 0 0-5 5v3H6v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3V2Z"/>
                            </svg>
                            <svg width="25" height="25" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="m221.59 160.3l-47.24-21.17a14 14 0 0 0-13.28 1.22a4.81 4.81 0 0 0-.56.42l-24.69 21a1.88 1.88 0 0 1-1.68.06c-15.87-7.66-32.31-24-40-39.65a1.91 1.91 0 0 1 0-1.68l21.07-25a6.13 6.13 0 0 0 .42-.58a14 14 0 0 0 1.12-13.27L95.73 34.49a14 14 0 0 0-14.56-8.38A54.24 54.24 0 0 0 34 80c0 78.3 63.7 142 142 142a54.25 54.25 0 0 0 53.89-47.17a14 14 0 0 0-8.3-14.53ZM176 210c-71.68 0-130-58.32-130-130a42.23 42.23 0 0 1 36.67-42h.23a2 2 0 0 1 1.84 1.31l21.1 47.11a2 2 0 0 1 0 1.67l-21.11 25.06a4.73 4.73 0 0 0-.43.57a14 14 0 0 0-.91 13.73c8.87 18.16 27.17 36.32 45.53 45.19a14 14 0 0 0 13.77-1c.19-.13.38-.27.56-.42l24.68-21a1.92 1.92 0 0 1 1.6-.1l47.25 21.17a2 2 0 0 1 1.21 2A42.24 42.24 0 0 1 176 210Z"/>
                            </svg>
                            <svg width="25" height="25" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M28 6H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2Zm-2.2 2L16 14.78L6.2 8ZM4 24V8.91l11.43 7.91a1 1 0 0 0 1.14 0L28 8.91V24Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="my-10 md:my-0">
                        <ul>
                            <li><a class="" href="index">Inicio</a></li>
                            <li><a class="" href="catalogos">Catálogos</a></li>
                            <li><a class="" href="contacto">Contacto</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-medium">Suscribete a nuestro newsletter</p>
                        <input type="email" name="email" class="my-3 block w-full rounded-md border-0 py-3 px-4 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" placeholder="mail@mail.com">
                        <button class="bg-fgb-blue-dark rounded-md text-white py-4 px-8 shadow-lg shadow-fgb-blue-dark hover:bg-fgb-blue-light hover:shadow-fgb-blue-light">Suscribirme</button>
                    </div>
                </div>
                <p class="py-10">© 2023 First Global Broker. Todos los derechos reservados</p>
            </div>
        </footer>
        <?php } ?>
        <script>
            const base_url = '<?= base_url ?>';

            <?php if(isset($data['page'])){ ?>
            const open_sidenav = document.querySelector('#open_sidenav'),
                sidenav = document.querySelector('#sidenav'),
                close_sidenav = document.querySelector('#close_sidenav');

            open_sidenav.addEventListener('click', ()=>{
                sidenav.style.width = '250px';
                open_sidenav.style.display = 'none';
                close_sidenav.style.display = 'block';
            })

            close_sidenav.addEventListener('click', ()=>{
                sidenav.style.width = '0px';
                open_sidenav.style.display = 'block';
                close_sidenav.style.display = 'none';
            })
            <?php } ?>
        </script>
        <?php if (isset($data['extra_js']))  echo $data['extra_js'] ?>
    </body>
</html>