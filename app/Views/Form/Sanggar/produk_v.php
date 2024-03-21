<?= $this->extend('Pages/Sanggar/bungkus') ?>
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
                    <form method="POST" action="<?= base_url("simproduk") ?>" role="form text-left"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Nama Produk</label>
                            <input type="text" name="nama"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Nama Produk"
                                value="<?= isset($data) ? $data['Nama_Produk'] : old('nama') ?>">
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
                                for="Sizes">Deskripsi Produk</label>
                            <textarea name="desc" rows="5" placeholder="Isi Tentang Produk di sini..."
                                class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"><?= isset($data) ? $data['Desc_Produk'] : old('desc') ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Jenis Produk</label>
                            <select name="jenis" choices-select>
                                <option value="Barang" <?= isset($data) ? ($data['Jenis'] == "Barang" ? "selected" : "") : (old('status') == "Barang" ? "Selected" :
                                    "") ?>>
                                    Barang</option>
                                <option value="Jasa" <?= isset($data) ? ($data['Jenis'] == "Jasa" ? "selected" : "") : (old('status') == "Jasa" ? "Selected" :
                                    "") ?>>
                                    Jasa</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                for="Sizes">Harga Produk</label>
                            <input type="text" name="harga" value="<?= isset($data) ? $data['Harga'] : old('harga') ?>"
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
                                for="Sizes">Foto</label>
                            <div class="dropzone" id="dropzone"></div>
                            <input type="text" id="id" name="id" hidden
                                value="<?= isset($data) ? $data['Id_Produk'] : '' ?>">
                            <input type="text" id="foto" name="foto" hidden
                                value="<?= isset($data) ? $data['Foto_Produk'] : 'favicon.png' ?>">
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
<?= $this->endSection() ?>