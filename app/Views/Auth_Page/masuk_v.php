<?= $this->extend('Auth_Page/bungkus_Auth') ?>
<?= $this->section('content') ?>
<div
    class="relative flex flex-col min-w-0 my-[95px] break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
        <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
            ArtJuna</h3>
        <p class="mb-0">Masukkan Email dan Password untuk Masuk</p>
    </div>
    <div class="flex-auto p-6">
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
        <form action="<?= base_url('login') ?>" method="POST" role="form">
            <?= csrf_field() ?>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
            <div class="mb-4">
                <input type="email"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    placeholder="Email" name="email" aria-label="Email" aria-describedby="email-addon"
                    value="<?= old('email') ?>" />
                <?php
                if (validation_show_error('email') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('email'); ?>
                    </label>
                    <?php
                }
                ?>
            </div>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
            <div class="mb-4">
                <input type="password"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    name="pass" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                <?php
                if (validation_show_error('pass') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('pass'); ?>
                    </label>
                    <?php
                }
                ?>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Masuk</button>
            </div>
        </form>
    </div>
    <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
        <p class="mx-auto mb-6 leading-normal text-sm">
            Sanggarnya belum terdaftar ?
            <a href="<?= base_url('daftar') ?>"
                class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Daftar
                di Sini</a>
        </p>
    </div>
</div>
</div>
<?= $this->endSection() ?>