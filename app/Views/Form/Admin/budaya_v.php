<?= $this->extend('Pages/Admin/bungkus') ?>
<?= $this->section('content') ?>


<div class="flex flex-wrap my-6 -mx-3">
    <!-- card 1 -->

    <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
        <div
            class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <div class="flex flex-wrap mt-0 -mx-3">
                    <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                        <h6>
                            <?= $judul ?>

                        </h6>
                    </div>

                </div>
            </div>
            <div class="flex-auto p-6 px-0 pb-2">
                <div class="px-8">
                    <form method="POST" action="<?= base_url("simbudaya") ?>" role="form text-left"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Nama Budaya</label>
                            <input type="text" name="nama"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Nama Budaya"
                                value="<?= isset($data) ? $data['Nama_Budaya'] : old('nama') ?>">
                            <?php
                            if (validation_show_error('nama') != '') { ?>
                                <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                                    <?= validation_show_error('nama'); ?>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Deskripsi Budaya</label>
                            <textarea name="desc" rows="5" placeholder="Isi Tentang Sanggar di sini..."
                                class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"><?= isset($data) ? $data['Ket_Budaya'] : old('desc') ?></textarea>
                            <?php
                            if (validation_show_error('desc') != '') { ?>
                                <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                                    <?= validation_show_error('desc'); ?>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Foto</label>
                            <div class="dropzone" id="dropzone"></div>
                            <input type="text" id="id" name="id" hidden
                                value="<?= isset($data) ? $data['Id_Budaya'] : '' ?>">
                            <input type="text" id="foto" name="foto" hidden
                                value="<?= isset($data) ? $data['Foto_Budaya'] : 'favicon.png' ?>">
                        </div>
                        <div class="text-left">
                            <button id="simpan" type="submit"
                                class="inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#dropzone", {
        url: "<?= base_url("upfotobudaya"); ?>",
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
    if (<?= isset($data['Foto_Sanggar']) ? 'true' : 'false' ?>) {

        var foto = "<?= isset($data) ? $data['Foto_Budaya'] : "favicon.png" ?>";
        console.log(foto);
        let mockFile = { name: "Filename" };
        myDropzone.files.push(mockFile);
        myDropzone.displayExistingFile(mockFile, '<?= base_url("assets/img/Budaya/") ?>' + foto);


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
<script src="<?= base_url() ?>/assets/js/plugins/choices.min.js"></script>
<script src="<?= base_url() ?>/assets/js/choices.js"></script>

<?= $this->endSection() ?>