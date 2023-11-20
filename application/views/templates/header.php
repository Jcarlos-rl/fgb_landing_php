<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/svg+xml" href="<?= base_url ?>public/images/favicon.webp" />
        <title><?php echo (isset($data['title'])) ? $data['title'] . ' | First Global Broker' : 'First Global Broker'; ?></title>
        <!-- Estilos extra para el apartado en cuestion -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'fgb-blue': {
                                'light': '#42BFEB',
                                DEFAULT: '#2B4272',
                                'dark': '#111A3B'
                            }
                        }
                    }
                }
            }
        </script>
        <?php if (isset($data['extra_css']))  echo $data['extra_css'] ?>
    </head>
    <body>
        <?php if(isset($data['page'])){ ?>
        <section id="sidenav" class="bg-white h-full w-[0px] fixed z-30 top-0 left-0 overflow-x-hidden flex flex-col justify-between pb-[60px]" style="transition: 0.5s;">
            <nav>
                <div class="flex justify-center p-8">
                    <img class="w-[110px] md:w-[180px]" src="<?= base_url ?>public/images/logo.webp" alt="FGB">
                </div>
                <ul class="text-fgb-blue [&>li>a]:font-medium [&>li>a]:px-4 [&>li>a]:py-4 [&>li>a]:block [&>li>a]:w-full">
                    <li class="<?php if($data['page'] == 'index') echo 'bg-fgb-blue' ?>">
                        <a class="<?php if($data['page'] == 'index') echo 'text-slate-100 border-b-4 border-fgb-blue-light' ?>" href="index">Inicio</a>
                    </li>
                    <li class="<?php if($data['page'] == 'catalogue') echo 'bg-fgb-blue' ?>">
                        <a class="<?php if($data['page'] == 'catalogue') echo 'text-slate-100 border-b-4 border-fgb-blue-light' ?>" href="catalogos">Catálogos</a>
                    </li>
                    <li class="<?php if($data['page'] == 'contac') echo 'bg-fgb-blue' ?>">
                        <a class="<?php if($data['page'] == 'contac') echo 'text-slate-100 border-b-4 border-fgb-blue-light' ?>" href="contacto">Contacto</a>
                    </li>
                </ul>
                <div class="p-4 flex items-center gap-2">
                    <svg class="text-fgb-blue-dark" width="30" height="30" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <g fill="currentColor">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                            <path d="M8 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2z"/>
                        </g>
                    </svg>
                    <div>
                        <p class="text-fgb-blue-dark font-medium">Llamanos</p>
                        <p class="text-fgb-blue border-b-2 border-fgb-blue-light">+52 222 2222 222</p>
                    </div>
                </div>
            </nav>
        </section>
        <header class="w-full fixed top-0 z-20">
            <div class="container mx-auto flex items-center bg-white px-10 py-5 rounded-lg mt-8 shadow-lg">
                <div class="flex flex-grow">
                    <img class="w-[110px] md:w-[180px]" src="<?= base_url ?>public/images/logo.webp" alt="FGB">
                </div>
                <nav class="hidden md:block">
                    <ul class="text-fgb-blue flex text-md [&>li>a]:font-medium [&>li>a]:px-4 [&>li>a]:py-2 hover:[&>li>a]:border-b-4 hover:[&>li>a]:border-fgb-blue-light">
                        <li><a class="<?php if($data['page'] == 'index') echo 'border-b-4 border-fgb-blue-light' ?>" href="index">Inicio</a></li>
                        <li><a class="<?php if($data['page'] == 'catalogue') echo 'border-b-4 border-fgb-blue-light' ?>" href="catalogos">Catálogos</a></li>
                        <li><a class="<?php if($data['page'] == 'contac') echo 'border-b-4 border-fgb-blue-light' ?>" href="contacto">Contacto</a></li>
                    </ul>
                </nav>
                <nav class="flex flex-grow items-center justify-end gap-2">
                    <div>
                        <svg id="open_sidenav" class="block sm:hidden mr-4" width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000" d="M3 4h18v2H3V4Zm0 7h18v2H3v-2Zm0 7h18v2H3v-2Z"/>
                        </svg>
                        <svg  id="close_sidenav" class="hidden sm:hidden mr-4" width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"/>
                        </svg>
                    </div>
                    <svg class="hidden sm:block text-fgb-blue-dark" width="30" height="30" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <g fill="currentColor">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                            <path d="M8 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2z"/>
                        </g>
                    </svg>
                    <div class="hidden sm:block">
                        <p class="text-fgb-blue-dark font-medium">Llamanos</p>
                        <p class="text-fgb-blue border-b-2 border-fgb-blue-light">+52 222 2222 222</p>
                    </div>
                </nav>
            </div>
        </header>
        <?php } ?>