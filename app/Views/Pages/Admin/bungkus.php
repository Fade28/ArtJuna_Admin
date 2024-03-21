<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png" />
    <title>ArtJuna |
        <?= $aktif ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/choices.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://kit.fontawesome.com/85148bfb14.js" crossorigin="anonymous"></script>
    <!-- Main Styling -->
    <link href="<?= base_url() ?>assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        #myDropzoneContainer {
            width: 400px;
            height: 300px;
            border: 2px dashed #ccc;
            position: relative;
            overflow: auto;
            /* Atur sesuai kebutuhan */
        }

        .dz-preview {
            display: block;
            margin: 5px;
        }

        .dz-image {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
                <img src="<?= base_url(); ?>/assets/img/favicon.png"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-bold transition-all duration-200 ease-nav-brand">ArtJuna 2024</span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <!-- Menu Dashboard -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'home' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Admin') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'home' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-house <?= $aktif == 'home' ? "fa-beat" : '' ?>"
                                style="<?= $aktif == 'home' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <!-- Menu Sanggar -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Sanggar' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('data-Sanggar') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Sanggar' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-masks-theater <?= $aktif == 'Sanggar' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Sanggar' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Sanggar</span>
                    </a>
                </li>

                <!-- Menu Pengguna -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Pengguna' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('data-Pengguna') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Pengguna' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-person <?= $aktif == 'Pengguna' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Pengguna' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengguna</span>
                    </a>
                </li>

                <!-- Menu Transaksi -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Transaksi' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('data-Transaksi') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Transaksi' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-regular fa-clipboard <?= $aktif == 'Transaksi' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Transaksi' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Transaksi</span>
                    </a>
                </li>

                <!-- Menu Budaya -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Budaya' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Budaya') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Budaya' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-icons <?= $aktif == 'Budaya' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Budaya' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Budaya</span>
                    </a>
                </li>

                <!-- Menu Settings -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Settings' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('setAdmin') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Settings' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-gear <?= $aktif == 'Settings' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Settings' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Settings</span>
                    </a>
                </li>



            </ul>
        </div>

    </aside>

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="true">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50 text-slate-700" href="javascript:;">ArtJuna</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                            aria-current="page">
                            <?= $aktif ?>
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold capitalize">
                        <?= $judul ?>
                    </h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">

                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;"
                                class="block p-0 transition-all ease-nav-brand text-sm text-slate-500"
                                sidenav-trigger="">
                                <div class="w-4.5 overflow-hidden">
                                    <i
                                        class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                    <i
                                        class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                    <i
                                        class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <!-- Profil -->
                        <li class="relative flex items-center pr-2">
                            <div class="relative">
                                <a href="javascript:;"
                                    class="inline-block px-6 py-3 mr-3 font-bold text-center uppercase align-middle transition-all leading-pro text-sm  active:opacity-85 text-slate-500"
                                    dropdown-trigger aria-expanded="false">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="hidden sm:inline">
                                        <?= $profil['Nama_Sanggar'] ?>
                                    </span>
                                </a>
                                <p class="hidden transform-dropdown-show"></p>
                                <ul dropdown-menu
                                    class="z-100 divide-y-[3px] text-sm transform-dropdown shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 -ml-7 before:text-5.5 pointer-events-none absolute top-0 m-0 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:top-0 before:right-7 before:left-auto before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                                    <li>
                                        <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300"
                                            href="<?= base_url('setAdmin') ?>">Settings</a>
                                    </li>
                                    <li>
                                        <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300"
                                            href="<?= base_url('logout') ?>">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- end Navbar -->



        <?= $this->renderSection('content') ?>

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- end cards -->
    </main>
</body>
<!-- plugin for charts  -->
<script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="<?= base_url() ?>/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>