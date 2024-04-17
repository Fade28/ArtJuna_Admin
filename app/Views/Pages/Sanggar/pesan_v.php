<?= $this->extend('Pages/Sanggar/bungkus') ?>
<?= $this->section('content') ?>
<!-- cards -->
<div class="w-full max-w-full h-[512px] px-3">
    <div
        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <h6 class="mb-0">Pesan</h6>
        </div>
        <div class="flex-auto p-4 overflow-hidden hover:overflow-auto">
            <?php
            if ($table == null):
                ?>

                <p class="flex justify-center">Tidak Ada Pesan untuk Anda</p>
                <?php
            endif;
            ?>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <?php
                foreach ($table as $data):
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
<?= $this->endSection() ?>