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
    <link href="<?= base_url() ?>/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <style>

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
                <img src="<?= base_url(); ?>assets/img/logo_unitama.png"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-bold transition-all duration-200 ease-nav-brand">PKKM UNITAMA 2023</span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <!-- Menu Dashboard -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'home' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'home' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-house <?= $aktif == 'home' ? "fa-beat" : '' ?>"
                                style="<?= $aktif == 'home' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <!-- Menu Peserta -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Peserta' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Peserta') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Peserta' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-users <?= $aktif == 'Peserta' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Peserta' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Peserta</span>
                    </a>
                </li>

                <!-- Menu Kerjasama Industri -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Industri' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Industri' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-building <?= $aktif == 'Industri' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Industri' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Industri</span>
                    </a>
                </li>

                <!-- Menu Praktisi -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Praktisi' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Praktisi' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-chalkboard-user <?= $aktif == 'Praktisi' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Praktisi' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Praktisi</span>
                    </a>
                </li>

                <!-- Menu Lokakarya -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Lokakarya' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Lokakarya' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-people-carry-box <?= $aktif == 'Lokakarya' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Lokakarya' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Lokakarya</span>
                    </a>
                </li>

                <!-- Menu Pelatihan -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Pelatihan' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Pelatihan' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-person-chalkboard <?= $aktif == 'Pelatihan' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Pelatihan' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pelatihan</span>
                    </a>
                </li>

                <!-- Menu Kewirausahaan -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Kewirausahaan' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Kewirausahaan' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-money-bill-trend-up <?= $aktif == 'Kewirausahaan' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Kewirausahaan' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kewirausahaan</span>
                    </a>
                </li>

                <!-- Menu Inovasi -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Inovasi' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="./pages/dashboard.html">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Inovasi' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-lightbulb <?= $aktif == 'Inovasi' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Inovasi' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Inovasi</span>
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
                            <a class="opacity-50 text-slate-700" href="javascript:;">PK-KM</a>
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
                        <!-- online builder btn  -->
                        <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
                        <li class="flex items-center">
                            <a href="./pages/sign-in.html"
                                class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                                <i class="fa fa-user sm:mr-1"></i>
                                <span class="hidden sm:inline">Sign In</span>
                            </a>
                        </li>


                        <!-- notifications -->

                        <li class="relative flex items-center pl-4 pr-2">
                            <p class="hidden transform-dropdown-show"></p>
                            <a href="javascript:;"
                                class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" dropdown-trigger
                                aria-expanded="false">
                                <i class="cursor-pointer fa fa-bell"></i>
                            </a>

                            <ul dropdown-menu
                                class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                <!-- add show class on dropdown open js -->
                                <li class="relative mb-2">
                                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img src="./assets/img/team-2.jpg"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 text-sm font-normal leading-normal"><span
                                                        class="font-semibold">New message</span> from Laur</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative mb-2">
                                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img src="./assets/img/small-logos/logo-spotify.svg"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 text-sm font-normal leading-normal"><span
                                                        class="font-semibold">New album</span> by Travis Scott</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative">
                                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div
                                                class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 text-sm font-normal leading-normal">Payment successfully
                                                    completed</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    <i class="mr-1 fa fa-clock"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
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
    <div fixed-plugin>
        <a fixed-plugin-button
            class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
            <i class="py-2 pointer-events-none fa fa-cog"> </i>
        </a>
        <!-- -right-90 in loc de 0-->
        <div fixed-plugin-card
            class="z-sticky shadow-soft-3xl w-90 ease-soft -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
            <div class="px-6 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <div class="float-left">
                    <h5 class="mt-4 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-right mt-6">
                    <button fixed-plugin-close-button
                        class="inline-block p-0 mb-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 active:opacity-85 text-slate-700">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
            <div class="flex-auto p-6 pt-0 sm:pt-4">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)">
                    <div class="my-2 text-left" sidenav-colors>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-purple-700 to-pink-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            active-color data-color-from="purple-700" data-color-to="pink-500"
                            onclick="sidebarColor(this)"></span>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            data-color-from="gray-900" data-color-to="slate-800" onclick="sidebarColor(this)"></span>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-blue-600 to-cyan-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            data-color-from="blue-600" data-color-to="cyan-400" onclick="sidebarColor(this)"></span>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-green-600 to-lime-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            data-color-from="green-600" data-color-to="lime-400" onclick="sidebarColor(this)"></span>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-500 to-yellow-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            data-color-from="red-500" data-color-to="yellow-400" onclick="sidebarColor(this)"></span>
                        <span
                            class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-600 to-rose-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                            data-color-from="red-600" data-color-to="rose-400" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-4">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm leading-normal">Choose between 2 different sidenav types.</p>
                </div>
                <div class="flex">
                    <button transparent-style-btn
                        class="inline-block w-full px-4 py-3 mb-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border border-transparent border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 bg-fuchsia-500 hover:border-fuchsia-500"
                        data-class="bg-transparent" active-style>Transparent</button>
                    <button white-style-btn
                        class="inline-block w-full px-4 py-3 mb-2 ml-2 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 border-fuchsia-500 bg-none text-fuchsia-500 hover:border-fuchsia-500"
                        data-class="bg-white">White</button>
                </div>
                <p class="block mt-2 text-sm leading-normal xl:hidden">You can change the sidenav type just on desktop
                    view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-4">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="min-h-6 mb-0.5 block pl-0">
                    <input navbarFixed
                        class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                        type="checkbox" />
                </div>
                <hr class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent sm:my-6" />
                <a class="inline-block w-full px-6 py-3 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs hover:scale-102 active:opacity-85 tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" target="_blank">Free
                    Download</a>
                <a class="inline-block w-full px-6 py-3 mb-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none"
                    href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/"
                    target="_blank">View documentation</a>
                <div class="w-full text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-4">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20%40CreativeTim&hashtags=webdesign,dashboard,tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-tailwind"
                        class="inline-block px-6 py-3 mb-0 mr-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                        target="_blank"> <i class="mr-1 fab fa-twitter"></i> Tweet </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind"
                        class="inline-block px-6 py-3 mb-0 mr-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                        target="_blank"> <i class="mr-1 fab fa-facebook-square"></i> Share </a>
                </div>
            </div>
        </div>
    </div>
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