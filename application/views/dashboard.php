<section class="container mx-auto px-6 md:px-0 mt-10">
    <div class="md:flex">
        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li>
                <button data-id="catalogos" class="select-page inline-flex items-center px-4 py-3 rounded-lg w-full text-white bg-blue-700 active dark:bg-blue-600">
                    Catálogos
                </button>
            </li>
            <li>
                <button data-id="newsletter" class="select-page inline-flex items-center px-4 py-3 rounded-lg w-full hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    Newsletter
                </button>
            </li>
            <li>
                <button data-id="contacto" class="select-page inline-flex items-center px-4 py-3 rounded-lg w-full hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    Contacto
                </button>
            </li>
        </ul>
        <div class="p-6 text-medium rounded-lg w-full">
            <div class="pages" id="catalogos">
                <h3 class="text-lg font-bold mb-2">Catálogos Tab</h3>
                <p class="mb-2">This is some placeholder content the Profile tab's associated content, clicking another tab will toggle the visibility of this one for the next.</p>
                <p>The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
            <div class="pages hidden" id="newsletter">
                <h3 class="text-lg font-bold mb-5">Newsletter Tab</h3>
                <?php
                if(count($data['newsletters'])>0){
                ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Correo Electrónico</th>
                                    <th class="py-2 px-4 border-b">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['newsletters'] as $newsletter) {
                                ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= $newsletter['email'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $newsletter['createdAt'] ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }else{
                ?>
                    <p>Lo sentimos, no existen registros de newsletter.</p>
                <?php
                }
                ?>
            </div>
            <div class="pages hidden" id="contacto">
                <h3 class="text-lg font-bold mb-5">Contacto Tab</h3>
                <?php
                if(count($data['contacs'])>0){
                ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Nombre</th>
                                    <th class="py-2 px-4 border-b">Correo Electrónico</th>
                                    <th class="py-2 px-4 border-b">Teléfono</th>
                                    <th class="py-2 px-4 border-b">Mensaje</th>
                                    <th class="py-2 px-4 border-b">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['contacs'] as $contac) {
                                ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= $contac['name'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $contac['email'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $contac['phone'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $contac['message'] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $contac['createdAt'] ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }else{
                ?>
                    <p>Lo sentimos, no existen registros de contacto.</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<script>
    const selectPages = document.querySelectorAll('.select-page'),
        pages = document.querySelectorAll('.pages');

    selectPages.forEach(element => {
        element.addEventListener('click', ()=>{
            pages.forEach(page => {
                if(page.getAttribute('id') === element.getAttribute('data-id')){
                    page.classList.remove('hidden');
                }else{
                    page.classList.add('hidden');
                }
            });

            selectPages.forEach(pag =>{
                if(pag.getAttribute('data-id') === element.getAttribute('data-id')){
                    pag.setAttribute('class', 'select-page inline-flex items-center px-4 py-3 rounded-lg w-full text-white bg-blue-700 active dark:bg-blue-600');
                }else{
                    pag.setAttribute('class', 'select-page inline-flex items-center px-4 py-3 rounded-lg w-full hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white');
                }
            })

        });
    });

</script>