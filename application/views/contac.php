<main class="pt-[150px] md:pt-[200px] mb-20">
    <section class="container mx-auto px-6 md:px-0 grid grid-cols-2">
        <div class="col-span-2 md:col-span-1">
            <h1 class="text-4xl font-bold text-fgb-blue-dark mb-3">Contacto</h1>
            <p class="text-base">¡Conéctate con nosotros! Estamos aquí para escucharte. Completa este formulario y déjanos saber cómo podemos ayudarte. Tu mensaje es importante para nosotros.</p>
            <h3 class="text-2xl font-medium text-fgb-blue mt-10 mb-2">Telefono</h3>
            <a class="text-base">+52 (222) 231 1972</a>
            <h3 class="text-2xl font-medium text-fgb-blue mt-10 mb-2">Email</h3>
            <a class="text-base">ventas@fgbmexico.com</a>
        </div>
        <div class="col-span-2 md:col-span-1">
            <section id="feedback_error" class="hidden">
                <div class="flex justify-center items-center p-3 mb-8 border border-red-400 rounded">
                    <svg class="text-red-400" width="28" height="28" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17zm0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15z"/>
                        <path fill="currentColor" d="M24 32h2v2h-2zm1.6-2h-1.2l-.4-8v-6h2v6z"/>
                    </svg>
                    <p class="ml-3 font-medium"></p>
                </div>
            </section>
            <form class="mt-10 md:mt-0">
                <div class="mb-4">
                    <label for="nombre" class="block font-bold mb-2">Nombre*</label>
                    <input type="text" name="nombre" class="my-3 block w-full rounded-md border-0 py-3 px-4 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-bold mb-2">Email*</label>
                    <input type="text" name="email" class="my-3 block w-full rounded-md border-0 py-3 px-4 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
                <div class="mb-4">
                    <label for="telefono" class="block font-bold mb-2">Teléfono*</label>
                    <input type="text" name="telefono" class="my-3 block w-full rounded-md border-0 py-3 px-4 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                </div>
                <div class="mb-4">
                    <label for="mensaje" class="block font-bold mb-2">Mensaje*</label>
                    <textarea name="mensaje" class="my-3 block w-full rounded-md border-0 py-3 px-4 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"></textarea>
                </div>
                <button type="submit" id="btn_contac" class="bg-fgb-blue-dark rounded-md text-white py-4 px-8 shadow-lg shadow-fgb-blue-dark hover:bg-fgb-blue-light hover:shadow-fgb-blue-light">Enviar</button>
            </form>
        </div>
    </section>
</main>