<?= $this->extend('Pages/Admin/bungkus') ?>
<?= $this->section('content') ?>
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap my-6 -mx-3">
        <!-- card 1 -->

        <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
            <div
                class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                    <div class="flex flex-wrap mt-0 -mx-3">
                        <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                            <h6>Budaya</h6>
                            <?php
                            if (session()->getFlashData('sukses')) {
                                ?>
                                <p class="mb-0 text-sm leading-normal">
                                    <i class="fa fa-check text-cyan-500"></i>
                                    <span class="ml-1 font-semibold">Alert</span>
                                    <?= session()->getFlashData('sukses') ?>
                                </p>
                                <?php
                            }
                            ?>
                            <?php
                            if (session()->getFlashData('info')) {

                                ?>
                                <p class="mb-0 text-sm leading-normal">
                                    <i class="fa fa-exclamation text-yellow-500"></i>
                                    <span class="ml-1 font-semibold">Alert</span>
                                    <?= session()->getFlashData('info') ?>
                                </p>
                                <?php
                            }
                            ?>
                            <?php
                            if (session()->getFlashData('gagal')) {
                                ?>
                                <p class="mb-0 text-sm leading-normal">
                                    <i class="fa fa-xmark text-red-500"></i>
                                    <span class="ml-1 font-semibold">Alert</span>
                                    <?= session()->getFlashData('gagal') ?>
                                </p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="flex-none w-5/12 max-w-full px-3 my-auto text-right lg:w-1/2 lg:flex-none">
                            <div class="relative pr-6 lg:float-right">
                                <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                    href="<?= base_url('tambudaya'); ?>"> <i class="fas fa-plus">
                                    </i>&nbsp;&nbsp;Tambah
                                    Budaya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-6 px-0 pb-2">
                    <div class="overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Judul</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Keterangan</th>
                                    <th
                                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($table == null):
                                    ?>
                                    <tr>
                                        <td colspan="4"
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            Data Tidak Ada
                                        </td>
                                    </tr>
                                    <?php
                                endif;
                                foreach ($table as $data) {
                                    ?>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url('assets/img/Budaya/' . $data['Foto_Budaya']); ?>"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                        alt="user1" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">
                                                        <?= $data['Nama_Budaya']; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b  shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $data['Ket_Budaya']; ?>
                                            </p>
                                            <!-- <p class="mb-0 text-xs leading-tight text-slate-400">Organization</p> -->
                                        </td>
                                        <td
                                            class="p-2 align-middle text-right bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                                                id="hapusbtn" data-id="<?= $data['Id_Budaya']; ?>"
                                                data-idkey="<?= $data['Id_Budaya']; ?>"><i
                                                    class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                                            <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                href="<?= base_url("ubbudaya/{$data['Id_Budaya']}"); ?>"><i
                                                    class="mr-2 fas fa-pencil-alt text-slate-700"
                                                    aria-hidden="true"></i>Edit</a>

                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="grid justify-items-end my-8">
                            <?php echo $pager->links('default', 'pager') ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!--Overlay Effect-->
    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <i class="fa-regular fa-circle-question fa-beat fa-lg" style="color: #00184f"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi!</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Anda yakin akan menghapus data ini ?
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <form id="formhap" method="POST" action="<?= base_url('hapbudaya') ?>">
                        <?= csrf_field() ?>
                        <input type="text" id="id" name="id" hidden>
                        <button id="ok-btn" type=submit
                            class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            OK
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("my-modal");

        var btn = document.querySelectorAll("#hapusbtn");
        let id = document.getElementById("id");

        btn.forEach(function (e) {
            e.addEventListener('click', openModal => {
                id.value = e.dataset.id;
                modal.style.display = "block";
            });
        })

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <?= $this->endSection() ?>