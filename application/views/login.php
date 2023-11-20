<section class="container mx-auto px-6 md:px-0 grid grid-cols-12 md:grid-cols-9">
    <div class="col-span-1 md:col-span-2 lg:col-span-3"></div>
    <div class="col-span-10 md:col-span-5 lg:col-span-3">
        <h1 class="text-center text-2xl font-medium my-8">Inicio de sesión</h1>
        <section id="feedback_error" class="hidden">
            <div class="flex justify-center items-center p-3 mb-8 border border-red-400 rounded">
                <svg class="text-red-400" width="28" height="28" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17zm0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15z"/>
                    <path fill="currentColor" d="M24 32h2v2h-2zm1.6-2h-1.2l-.4-8v-6h2v6z"/>
                </svg>
                <p class="ml-3 font-medium"></p>
            </div>
        </section>
        <form>
            <div class="mb-4">
                <label for="email" class="block font-bold mb-2">Correo Electrónico</label>
                <input type="email" name="email" class="w-full border-2 border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-1">
                <label for="password" class="block font-bold mb-2">Contraseña</label>
                <input type="password" name="password" class="w-full border-2 border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" id="btn_login" class="w-full bg-blue-500 text-white px-4 py-2 rounded focus:outline-none hover:bg-blue-600 mt-7 mb-4">Iniciar sesión</button>
        </form>
    </div>
</section>