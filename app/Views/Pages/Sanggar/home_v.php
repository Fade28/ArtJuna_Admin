<?= $this->extend('Pages/Sanggar/bungkus') ?>
<?= $this->section('content') ?>
<div class="w-full px-6 mx-auto">
    <div class="relative flex items-center p-0 mt-2 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
        <span
            class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
    </div>
    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
                <div
                    class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                    <img src="<?= base_url('assets/img/profil/' . $profil['Foto_Sanggar']); ?>" alt="profile_image"
                        class="w-full shadow-soft-sm rounded-xl" />
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1">
                        <?= $profil['Nama_Sanggar'] ?>
                    </h5>
                </div>
            </div>

        </div>
    </div>

    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-8/12">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                <h6 class="mb-0">Tentang Sanggar</h6>
                            </div>
                            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                                <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                                    <i class="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
                                </a>
                                <div data-target="tooltip"
                                    class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm"
                                    role="tooltip">
                                    Edit Profile
                                    <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                        data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <p class="leading-normal text-sm">
                            <?= $profil['Desc_Sanggar'] ?>
                        </p>
                        <hr
                            class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                <strong class="text-slate-700">Alamat Sanggar:</strong> &nbsp;
                                <?= $profil['Alamat_Sanggar'] ?>
                            </li>
                            <li
                                class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">No. Handphone:</strong> &nbsp;
                                <?= $profil['Nohp_Sanggar'] ?>
                            </li>
                            <li
                                class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Email:</strong> &nbsp;
                                <?= $profil['Email_Sanggar'] ?>
                            </li>
                            <li
                                class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                                <strong class="leading-normal text-sm text-slate-700">Social:</strong> &nbsp;
                                <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none"
                                    href="javascript:;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                </a>
                                <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600"
                                    href="javascript:;">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </a>
                                <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900"
                                    href="javascript:;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-0">Pesan</h6>
                    </div>
                    <div class="flex-auto p-4 overflow-hidden hover:overflow-auto">
                        <?php
                        if ($pesan == null):
                            ?>

                            <p class="flex justify-center">Tidak Ada Pesan untuk Anda</p>
                            <?php
                        endif;
                        ?>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <?php
                            foreach ($pesan as $data):
                                ?>
                                <li class="w-full">
                                    <a class="flex items-center my-2 px-2 py-2 border-0 border-t-0 rounded-lg text-inherit bg-gray-100"
                                        href="<?= base_url("detailpesan/{$data['Id_PesanGrup']}") ?>">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                            <img src="<?= base_url('assets/img/profil/' . $data['foto']); ?>" alt="kal"
                                                class="w-full h-full shadow-soft-2xl rounded-xl" />
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <h6 class="mb-0 leading-normal text-sm">
                                                <?= $data['nama']; ?>
                                            </h6>
                                            <p class="mb-0 leading-tight text-xs">
                                                <?= $data['pesan']; ?>
                                            </p>
                                        </div>
                                        <span
                                            class="inline-block py-3 pl-0 pr-2 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100"
                                            href="<?= base_url("detailpesan/{$data['Id_PesanGrup']}") ?>">Balas</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full p-3 lg-max:mt-6">
                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-0">Produk</h6>
                    </div>
                    <div class="flex-auto p-4 overflow-hidden hover:overflow-auto">

                        <ul class="flex flex-col xl:flex-row md:flex-row pl-0 mb-0 rounded-lg">
                            <?php
                            foreach ($produk as $data):
                                ?>

                                <li class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                        <div class="relative">
                                            <a class="block shadow-xl rounded-2xl">
                                                <img src="<?= base_url('assets/img/produk/' . $data['Foto_Produk']); ?>"
                                                    alt="img-blur-shadow" class="w-full h-48 shadow-soft-2xl rounded-2xl" />
                                            </a>
                                        </div>
                                        <div class="flex-auto px-1 pt-6">
                                            <p
                                                class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">
                                                <?= $data['Jenis']; ?>
                                            </p>
                                            <a href="javascript:;">
                                                <h5>
                                                    <?= $data['Nama_Produk']; ?>
                                                </h5>
                                            </a>
                                            <p class="mb-6 leading-normal text-sm">
                                                <?= $data['Desc_Produk']; ?>
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <a type="button" href="<?= base_url("ubproduk/{$data['Id_Produk']}"); ?>"
                                                    class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">Edit
                                                    Produk</a>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="w-full max-w-full px-3 mb-6 xl:mb-0 xl:w-3/12">
                                <div
                                    class="relative flex flex-col h-full min-w-0 break-words bg-transparent border border-solid shadow-none rounded-2xl border-slate-100 bg-clip-border">
                                    <div class="flex flex-col justify-center flex-auto p-6 text-center">
                                        <a href="<?= base_url('tamproduk'); ?>">
                                            <i class="mb-4 fa fa-plus text-slate-400"></i>
                                            <h5 class="text-slate-400">Tambah Produk</h5>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>