<main class="pt-[110px] md:pt-[160px] mb-20">
    <section class="container mx-auto px-6 md:px-0">
        <h1 class="text-4xl font-bold text-fgb-blue-dark my-10">Marcas</h1>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-2">
            <?php
                foreach($data['brands'] as $key=>$files){
                    if($files === reset($data['brands'])){
                        $firstFile = $files;
                        $brand = $key;
            ?>
            <div class="brand_catalogue w-full rounded shadow-lg p-4 flex flex-col gap-3 lg:gap-5 md:flex-row cursor-pointer hover:bg-fgb-blue-dark [&>div>p.text-lg]:hover:text-fgb-blue-light [&>div>p.text-xs]:hover:text-slate-100 bg-fgb-blue-dark">
                <div class="w-[60px] h-[60px] flex justify-center items-center bg-slate-100 rounded p-2">
                    <img class="object-contain h-full w-full" src="<?= base_url ?>public/images/logo.webp" alt="Logo">
                </div>
                <div>
                    <p class="text-lg font-bold text-fgb-blue-light" data-id="<?= $key ?>"><?= ucfirst($key) ?></p>
                    <p class="text-xs text-slate-100"><?php echo (count($files) > 1) ? count($files) . ' catálogos' : count($files) . ' catálogo' ; ?></p>
                </div>
            </div>
            <?php
                    }else{
            ?>
            <div class="brand_catalogue w-full rounded shadow-lg p-4 flex flex-col gap-3 lg:gap-5 md:flex-row cursor-pointer hover:bg-fgb-blue-dark [&>div>p.text-lg]:hover:text-fgb-blue-light [&>div>p.text-xs]:hover:text-slate-100">
                <div class="w-[60px] h-[60px] flex justify-center items-center bg-slate-100 rounded p-2">
                    <img class="object-contain h-full w-full" src="<?= base_url ?>public/images/logo.webp" alt="Logo">
                </div>
                <div>
                    <p class="text-lg font-bold text-fgb-blue" data-id="<?= $key ?>"><?= ucfirst($key) ?></p>
                    <p class="text-xs text-slate-400"><?php echo (count($files) > 1) ? count($files) . ' catálogos' : count($files) . ' catálogo' ; ?></p>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </section>
    <section class="container mx-auto px-6 md:px-0">
        <p class="text-fgb-blue text-2xl font-medium my-10">Catálogos</p>
        <section id="catalogues">
            <?php
                foreach ($firstFile as $file) {
            ?>
            <div class="rounded shadow-md p-5 mb-10">
                <div class="grid grid-cols-1 md:grid-cols-6 items-center">
                    <div class="flex items-center gap-3 md:col-span-2">
                        <div class="p-2 border-solid border-2 rounded-lg">
                            <svg width="20" height="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#000000" d="M13.156 9.211c-.213-.21-.686-.321-1.406-.331a11.754 11.754 0 0 0-1.69.124c-.276-.159-.561-.333-.784-.542c-.601-.561-1.103-1.34-1.415-2.197c.02-.08.038-.15.054-.222c0 0 .339-1.923.249-2.573a.73.73 0 0 0-.044-.184l-.029-.076c-.092-.212-.273-.437-.556-.425l-.171-.005c-.316 0-.573.161-.64.403c-.205.757.007 1.889.39 3.355l-.098.239c-.275.67-.619 1.345-.923 1.94l-.04.077c-.32.626-.61 1.157-.873 1.607l-.271.144c-.02.01-.485.257-.594.323c-.926.553-1.539 1.18-1.641 1.678c-.032.159-.008.362.156.456l.263.132a.792.792 0 0 0 .357.086c.659 0 1.425-.821 2.48-2.662a24.79 24.79 0 0 1 3.819-.908c.926.521 2.065.883 2.783.883c.128 0 .238-.012.327-.036a.558.558 0 0 0 .325-.222c.139-.21.168-.499.13-.795a.531.531 0 0 0-.157-.271zM3.307 12.72c.12-.329.596-.979 1.3-1.556c.044-.036.153-.138.253-.233c-.736 1.174-1.229 1.642-1.553 1.788zm4.169-9.6c.212 0 .333.534.343 1.035s-.107.853-.252 1.113c-.12-.385-.179-.992-.179-1.389c0 0-.009-.759.088-.759zM6.232 9.961c.148-.264.301-.543.458-.839c.383-.724.624-1.29.804-1.755a5.813 5.813 0 0 0 1.328 1.649c.065.055.135.111.207.166c-1.066.211-1.987.467-2.798.779zm6.72-.06c-.065.041-.251.064-.37.064c-.386 0-.864-.176-1.533-.464c.257-.019.493-.029.705-.029c.387 0 .502-.002.88.095s.383.293.318.333z"/>
                                <path fill="#000000" d="M14.341 3.579c-.347-.473-.831-1.027-1.362-1.558S11.894 1.006 11.421.659C10.615.068 10.224 0 10 0H2.25C1.561 0 1 .561 1 1.25v13.5c0 .689.561 1.25 1.25 1.25h11.5c.689 0 1.25-.561 1.25-1.25V5c0-.224-.068-.615-.659-1.421zm-2.07-.85c.48.48.856.912 1.134 1.271h-2.406V1.595c.359.278.792.654 1.271 1.134zM14 14.75c0 .136-.114.25-.25.25H2.25a.253.253 0 0 1-.25-.25V1.25c0-.135.115-.25.25-.25H10v3.5a.5.5 0 0 0 .5.5H14v9.75z"/>
                            </svg>
                        </div>
                        <p class="text-fgb-blue font-medium truncate pr-5"><?= $file ?></p>
                    </div>
                    <p class="md:col-span-1 lg:col-span-2 my-5 md:my-0 font-medium text-fgb-blue"><?= ucfirst($brand) ?></p>
                    <div class="flex gap-3 md:col-span-2">
                        <a href="<?= base_url ?>public/media/catalogues/<?= $brand ?>/<?= $file ?>" target="_blank" download="<?= $file ?>" class="rounded-md text-fgb-blue border-solid border-2 py-4 px-8">Dercargar catálogo</a>
                        <button data-id="<?= $file ?>" data-brand="<?= $brand ?>" class="viewCatalogue bg-fgb-blue-dark rounded-md text-white py-4 px-8 shadow-md shadow-fgb-blue-dark hover:bg-fgb-blue-light hover:shadow-fgb-blue-light">Ver catálogo</button>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </section>
    </section>
    <!-- Modal -->
    <div id="miModal" class="fixed inset-0 z-50 overflow-auto bg-smoke-dark flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:w-3/4 lg:w-1/2 p-6 rounded drop-shadow-2xl">
            <div class="mb-4 flex justify-between">
                <h3 class="text-2xl font-semibold">Visualizar catálogo</h3>
                <svg class="cursor-pointer" id="closeModal" width="28" height="28" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#000000" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"/>
                </svg>
            </div>
            <div>
            </div>
        </div>
    </div>
</main>