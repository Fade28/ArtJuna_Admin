<?= $this->extend('Pages/Sanggar/bungkus') ?>
<?= $this->section('content') ?>


<div class="flex flex-wrap justify-center my-6 -mx-3">
    <!-- card 1 -->
    <div class="w-full m-12 xl:m-3 xl:w-5/12">
        <div
            class="flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-3">Product</h6>
            </div>
            <div
                class="flex flex-row mb-3 px-6 item-center min-w-0 break-words p-2 bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <img src="<?= base_url('assets/img/produk/' . $data['Foto_Produk']); ?>" alt="img-blur-shadow"
                    class="w-1/2 h-40 shadow-soft-2xl rounded-2xl" />
                <div class="flex flex-col ml-3 justify-between">
                    <a href="javascript:;">
                        <h5>
                            <?= $data['Nama_Produk'] ?>
                        </h5>
                    </a>
                    <p class="mb-6 leading-normal text-sm">
                        <?= $data['Desc_Produk'] ?>
                    </p>
                    <div class="flex items-center justify-between">
                        <p
                            class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                            Rp.
                            <?= $data['Harga'] ?>.,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full m-12 xl:m-3 xl:w-5/12">
        <div
            class="flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-3">Pelanggan</h6>
            </div>
            <div
                class="flex flex-row mb-3 px-6 item-center min-w-0 break-words p-2 bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <img src="<?= base_url('assets/img/profil/' . $data['Foto']); ?>" alt="img-blur-shadow"
                    class="w-1/2 h-40 shadow-soft-2xl rounded-2xl" />
                <div class="flex flex-col ml-3 justify-start">
                    <a href="javascript:;">
                        <h5>
                            <?= $data['Nama_Lengkap'] ?>
                        </h5>
                    </a>
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li
                            class="relative block px-4 py-1 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700">Mobile:</strong> &nbsp;
                            <?= $data['Nohp'] ?>
                        </li>
                        <li
                            class="relative block px-4 py-1 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700">Alamat:</strong> &nbsp;
                            <?= $data['Alamat'] ?>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
        <div
            class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">

            <div class="flex-auto p-6 px-0 pb-2">
                <div class="px-8">
                    <form method="POST" action="<?= base_url("simtransaksi") ?>" role="form text-left"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Harga Transaksi</label>
                            <input type="text" name="harga"
                                value="<?= isset($data) ? $data['Harga_Jadi'] : old('harga') ?>"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Harga Produk">
                            <?php
                            if (validation_show_error('harga') != '') { ?>
                                <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                                    <?= validation_show_error('harga'); ?>
                                </label>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Deskripsi Transaksi</label>
                            <textarea name="desc" rows="5" placeholder="Isi Tentang Produk di sini..."
                                class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"><?= isset($data) ? $data['Ket'] : old('desc') ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Tanggal Mulai</label>
                            <input id="tgl_mulai" name="tgl_mulai" data-tanggal="<?= $data['Tgl_Mulai']; ?>"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Tanggal" />
                            <?php
                            if (validation_show_error('tgl_mulai') != '') { ?>
                                <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                                    <?= validation_show_error('tgl_mulai'); ?>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Tanggal Berakhir</label>
                            <input id="tgl_akhir" name="tgl_akhir" data-tanggal="<?= $data['Tgl_Akhir']; ?>"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Tanggal" />
                            <?php
                            if (validation_show_error('tgl_akhir') != '') { ?>
                                <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                                    <?= validation_show_error('tgl_akhir'); ?>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                        <input type="text" id="id" name="id" hidden
                            value="<?= isset($data) ? $data['Id_Transaksi'] : '' ?>">
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
<?= $this->endSection() ?>