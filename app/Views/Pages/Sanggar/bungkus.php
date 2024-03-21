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
                <!-- Menu Profil -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'home' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Sanggar') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'home' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-house <?= $aktif == 'home' ? "fa-beat" : '' ?>"
                                style="<?= $aktif == 'home' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Profil</span>
                    </a>
                </li>

                <!-- Menu Produk -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Produk' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Produk') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Produk' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-masks-theater <?= $aktif == 'Produk' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Produk' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Produk</span>
                    </a>
                </li>

                <!-- Menu Transaksi -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Transaksi' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="Transaksi">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Transaksi' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-regular fa-clipboard <?= $aktif == 'Transaksi' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Transaksi' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Transaksi</span>
                    </a>
                </li>

                <!-- Menu Pesan -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Pesan' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('Pesan') ?>">
                        <div
                            class="bg-gradient-to-tl <?= $aktif == 'Pesan' ? 'from-blue_uni-50 to-blue_uni-500' : '' ?> shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-icons <?= $aktif == 'Pesan' ? 'fa-beat' : '' ?>"
                                style="<?= $aktif == 'Pesan' ? 'color: #ffffff;' : 'color: #00184f;' ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pesan</span>
                    </a>
                </li>

                <!-- Menu Settings -->
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $aktif == 'Settings' ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 ' : '' ?> text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4  transition-colors"
                        href="<?= base_url('setProfil') ?>">
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
            <div class="flex items-center justify-between w-full px-4  mx-auto flex-wrap-inherit">
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
                                            href="javascript:;">Settings</a>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


<script src="<?= base_url() ?>/assets/js/plugins/choices.min.js"></script>
<script src="<?= base_url() ?>/assets/js/choices.js"></script>

<!-- plugin for charts  -->
<script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="<?= base_url() ?>/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
<script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#dropzone", {
        url: "<?= base_url("upfotoproduk"); ?>",
        method: "POST",
        paramName: "file",
        autoProcessQueue: true,
        acceptedFiles: "image/*",
        maxFiles: 1,
        maxFilesize: 5, // MB
        uploadMultiple: false,
        createImageThumbnails: true,
        thumbnailWidth: 120,
        thumbnailHeight: 120,
        addRemoveLinks: true,
        timeout: 180000,
        dictRemoveFileConfirmation: "Hapus Foto ini ?", // ask before removing file
        // Language Strings
        dictFileTooBig: "File terlalu besar ({{filesize}}mb). Max hanya {{maxFilesize}}mb",
        dictInvalidFileType: "file salah",
        dictRemoveFile: "Hapus",
        dictMaxFilesExceeded: "Hanya {{maxFiles}} files yang di bolehkan",
        dictDefaultMessage: "Drop foto di sini !",

    });
    if (<?= isset($data['Foto_Produk']) ? 'true' : 'false' ?>) {

        var foto = "<?= isset($data) ? $data['Foto_Produk'] : "favicon.png" ?>";
        console.log(foto);
        let mockFile = { name: "Filename" };
        myDropzone.files.push(mockFile);
        myDropzone.displayExistingFile(mockFile, '<?= base_url("assets/img/produk/") ?>' + foto);


    } else console.log("Tambah baru");


    myDropzone.on("addedfile", function (file) {
        console.log(file);
    });

    myDropzone.on("removedfile", function (file) {
        console.log(file);
    });

    myDropzone.on("complete", function (file) {
        console.log("komplit");
        if (file.accepted) {
            console.log(file.name);
            document.getElementById("foto").value = file.name;
        }

        else console.log("bermasalah")
    });

    // Add mmore data to send along with the file as POST data. (optional)
    myDropzone.on("sending", function (file, xhr, formData) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Menyertakan token CSRF ke dalam formData
        formData.append('csrf_token_name', csrfToken);
    });

    myDropzone.on("error", function (file, response) {
        console.log(response);
        document.getElementById("simpan").disabled = true;
    });
    myDropzone.on("maxfilesexceeded", function (file) {
        this.removeAllFiles();
        this.addFile(file);
    });

    // on success
    myDropzone.on("success", function (file, response) {
        // get response from successful ajax request
        console.log("Sukses");
        console.log(response);
        document.getElementById("simpan").disabled = false;
        // submit the form after images upload
        // (if u want yo submit rest of the inputs in the form)
        // document.getElementById("dropzone-form").submit();
    });

    // // button trigger for processingQueue
    // var submitDropzone = document.getElementById("submit-dropzone");
    // submitDropzone.addEventListener("click", function (e) {
    //     // Make sure that the form isn't actually being sent.
    //     e.preventDefault();
    //     e.stopPropagation();

    //     if (myDropzone.files != "") {
    //         // console.log(myDropzone.files);
    //         myDropzone.processQueue();
    //     } else {
    //         // if no file submit the form
    //         document.getElementById("dropzone-form").submit();
    //     }

    // });
</script>

<!-- //datepicker -->
<script>
    var tgl = document.querySelectorAll("#tgl_mulai");
    tgl.forEach(function (e) {
        console.log(e.dataset.tanggal);
        const datepicker = flatpickr("#tgl_mulai", {
            minDate: "today",
            defaultDate: [e.dataset.tanggal]
        });

        // styling the date picker
        const calendarContainer = datepicker.calendarContainer;
        const calendarMonthNav = datepicker.monthNav;
        const calendarNextMonthNav = datepicker.nextMonthNav;
        const calendarPrevMonthNav = datepicker.prevMonthNav;
        const calendarDaysContainer = datepicker.daysContainer;

        calendarContainer.className = `${calendarContainer.className} bg-white p-4 border border-fuchsia-300 rounded-lg shadow-lg shadow-soft-primary-outline font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;

        calendarMonthNav.className = `${calendarMonthNav.className} flex items-center justify-between `;

        calendarNextMonthNav.className = `${calendarNextMonthNav.className} absolute !top-1 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarPrevMonthNav.className = `${calendarPrevMonthNav.className} absolute !top-1 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarDaysContainer.className = `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-lg [&_span.flatpickr-day.selected]:!border-fuchsia-300 [&_span.flatpickr-day.today]:border-fuchsia-300 [&_span.flatpickr-day.selected]:!bg-fuchsia-300`;
    });

    var tgl = document.querySelectorAll("#tgl_akhir");
    tgl.forEach(function (e) {
        console.log(e.dataset.tanggal);
        const datepicker = flatpickr("#tgl_akhir", {
            minDate: "today",
            defaultDate: [e.dataset.tanggal]
        });

        // styling the date picker
        const calendarContainer = datepicker.calendarContainer;
        const calendarMonthNav = datepicker.monthNav;
        const calendarNextMonthNav = datepicker.nextMonthNav;
        const calendarPrevMonthNav = datepicker.prevMonthNav;
        const calendarDaysContainer = datepicker.daysContainer;

        calendarContainer.className = `${calendarContainer.className} bg-white p-4 border border-fuchsia-300 rounded-lg shadow-lg shadow-soft-primary-outline font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;

        calendarMonthNav.className = `${calendarMonthNav.className} flex items-center justify-between `;

        calendarNextMonthNav.className = `${calendarNextMonthNav.className} absolute !top-1 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarPrevMonthNav.className = `${calendarPrevMonthNav.className} absolute !top-1 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

        calendarDaysContainer.className = `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-lg [&_span.flatpickr-day.selected]:!border-fuchsia-300 [&_span.flatpickr-day.today]:border-fuchsia-300 [&_span.flatpickr-day.selected]:!bg-fuchsia-300`;
    });

</script>



</html>