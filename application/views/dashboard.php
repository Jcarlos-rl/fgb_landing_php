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
                <button id="new_catalogue" class="items-center px-4 py-3 rounded-lg text-white bg-blue-700 active dark:bg-blue-600">Nuevo catálogo</button>
                <?php
                if(count($data['files'])>0){
                ?>
                    <div class="overflow-x-auto mt-5">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Marca</th>
                                    <th class="py-2 px-4 border-b">Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['files'] as $key=>$files) {
                                    foreach ($files as $file) {
                                ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= ucfirst($key) ?></td>
                                    <td class="py-2 px-4 border-b"><a href="<?= base_url ?>public/media/catalogues/<?= $key ?>/<?= $file ?>" target="_blank"><?= $file ?></a></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="pages hidden" id="newsletter">
                <h3 class="text-lg font-bold mb-5">Newsletter Tab</h3>
                <?php
                if(count($data['newsletters'])> 0){
                ?>
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['newsletters'] as $newsletter) {
                            ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?= $newsletter ?></td>
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
                <p>Lo sentimos, no existen registros.</p>
                <?php
                }
                ?>
            </div>
            <div class="pages hidden" id="contacto">
                <h3 class="text-lg font-bold mb-5">Contacto Tab</h3>
                <?php
                if(count($data['contacs'])> 0){
                ?>
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nombre</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Teléfono</th>
                                <th class="py-2 px-4 border-b">Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data['contacs'] as $contac) {
                        ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $contac->name ?></td>
                            <td class="py-2 px-4 border-b"><?= $contac->email ?></td>
                            <td class="py-2 px-4 border-b"><?= $contac->phone ?></td>
                            <td class="py-2 px-4 border-b"><?= $contac->message ?></td>
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
                <p>Lo sentimos, no existen registros.</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="miModal" class="fixed inset-0 z-50 overflow-auto bg-smoke-dark flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-3/4 lg:w-1/2 p-6 rounded drop-shadow-2xl">
            <div class="mb-4 flex justify-between">
                <h3 class="text-2xl font-semibold">Nuevo catálogo</h3>
                <svg class="cursor-pointer" id="closeModal" width="28" height="28" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#000000" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"/>
                </svg>
            </div>
            <div>
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
                        <label for="brand" class="block font-bold mb-2">Marca</label>
                        <select id="brand" class="w-full border-2 border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500" name="brand" id="">
                            <option value="" selected disabled>Selecciona una marca</option>
                            <?php
                                foreach ($data['files'] as $brand=>$file) {
                            ?>
                                <option value="<?= $brand ?>"><?= ucfirst($brand) ?></option>
                            <?php
                            }
                            ?>
                                <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div id="contentNewBrand" class="mb-4 hidden">
                        <label for="newBrand" class="block font-bold mb-2">Ingresa la marca</label>
                        <input type="text" name="newBrand" class="w-full border-2 border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-1">
                        <label for="file" class="block font-bold mb-2">Archivo</label>
                        <input type="file" name="file" class="w-full border-2 border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <button type="submit" id="btn_save" class="w-full bg-blue-500 text-white px-4 py-2 rounded focus:outline-none hover:bg-blue-600 mt-7 mb-4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    const selectPages = document.querySelectorAll('.select-page'),
        pages = document.querySelectorAll('.pages'),
        new_catalogue = document.querySelector('#new_catalogue'),
        miModal = document.querySelector('#miModal'),
        closeModal = document.querySelector('#closeModal'),
        brand = document.querySelector('#brand'),
        contentNewBrand = document.querySelector('#contentNewBrand'),
        form = document.querySelector('form'),
        feedback_error = document.querySelector('#feedback_error');

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

    new_catalogue.addEventListener('click', ()=>{
        miModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', ()=>{
        miModal.classList.add('hidden');
    });

    brand.addEventListener('change', ()=>{
        if(brand.value === 'otro'){
            contentNewBrand.classList.remove('hidden');
        }else{
            contentNewBrand.classList.add('hidden');
        }
    });

    btn_save.addEventListener('click', (e)=>{
        e.preventDefault();

        let myFormData = new FormData(form);
        
        if(myFormData.get('brand') === '' || myFormData.get('file').name === ''){
            feedback_error.childNodes[1].childNodes[3].innerText = 'Todos los campos son requeridos.';
            feedback_error.classList.remove('hidden');
            return;
        }

        if(myFormData.get('brand') === 'otro' && myFormData.get('newBrand') === ''){
            feedback_error.childNodes[1].childNodes[3].innerText = 'Todos los campos son requeridos.';
            feedback_error.classList.remove('hidden');
            return;
        }

        for (let i = 0; i < brand.options.length; i++) {
            if(brand.options[i].value !== '' && brand.options[i].value === createSlug(myFormData.get('newBrand'))){
                feedback_error.childNodes[1].childNodes[3].innerText = 'La marca ingresada ya existe.';
                feedback_error.classList.remove('hidden');
                return;
            }
        }
        
        myFormData.append('brand',(myFormData.get('newBrand') === '') ? myFormData.get('brand') : createSlug(myFormData.get('newBrand')));

        feedback_error.classList.add('hidden');
        btn_save.classList.add('cursor-not-allowed');
        btn_save.innerText = 'Guardando...';
        btn_save.disabled = true;

        fetch(`${ base_url }dashboard/create`,{
            method: 'POST',
            body: myFormData
        })
        .then((res) =>{
            if(res.status === 500){
                btn_save.classList.remove('cursor-not-allowed');
                btn_save.innerText = 'Guardar';
                btn_save.disabled = false;
                throw new Error(`${res.statusText}`);
            }

            return res.json();
        })
        .then(data=>{
            if(data.status){
                location.reload();
            }else{
                feedback_error.childNodes[1].childNodes[3].innerText = data.errorMessage;
                feedback_error.classList.remove('hidden');
                btn_save.classList.remove('cursor-not-allowed');
                btn_save.innerText = 'Guardar';
                btn_save.disabled = false;
            }
        })
        .catch(err=>console.log(err))
    });

    function createSlug(text){
        return text
        .toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '_')
        .replace(/--+/g, '_')
        .trim();
    }
</script>