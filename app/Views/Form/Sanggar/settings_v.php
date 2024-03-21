<?= $this->extend('Pages/Sanggar/bungkus') ?>
<?= $this->section('content') ?>


<div class="flex flex-wrap my-6 mx-3">
    <!-- card 1 -->
    <div class="mx-auto w-full mt-8 p-6 bg-white rounded-lg shadow-md">
        <!-- Profile Picture -->
        <div class="flex justify-center">
            <div class="relative group">
                <label for="profile_picture" class="cursor-pointer block relative">
                    <img src="<?= base_url('assets/img/profil/' . $profil['Foto_Sanggar']); ?>" alt="Profile Picture"
                        class="w-24 h-24 p-2 bg-gray-50 rounded-full object-cover transition-all duration-100 ease-in-out group-hover:filter group-hover:blur-sm">
                    <form method="POST" id="profileForm" action="<?= base_url("ubahfoto"); ?>" role="form text-left"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="file" id="profile_picture" name="profile_picture" class="hidden"
                            accept="image/*" />
                    </form>
                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-gray-800 text-sm">Ganti Foto</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- Profile Inputs -->
        <form method="POST" action="<?= base_url("ubahprofil") ?>" role="form text-left" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class=" mb-4">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Sizes">Nama
                    Sanggar</label>
                <input type="text" name="nama"
                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                    placeholder="Nama Sanggar" value="<?= $profil['Nama_Sanggar'] ?>">
            </div>
            <div class="mb-4">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Sizes">Alamat
                    Sanggar</label>
                <input type="text" name="alamat" id="alamat" value="<?= $profil['Alamat_Sanggar'] ?>"
                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                    placeholder="Alamat Sanggar">
            </div>
            <div class="mb-4">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Sizes">Email
                    Sanggar</label>
                <input type="email" name="email" value="<?= $profil['Email_Sanggar'] ?>"
                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                    placeholder="Email Sanggar">
                <?php
                if (validation_show_error('email') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('email'); ?>
                    </label>
                    <?php
                }
                ?>

            </div>
            <div class="mb-4">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Sizes">No
                    Handphone</label>
                <input type="text" name="nohp" value="<?= $profil['Nohp_Sanggar'] ?>"
                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                    placeholder="No Handphone Ex : '08xxxxxxxx'">
                <?php
                if (validation_show_error('nohp') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('nohp'); ?>
                    </label>
                    <?php
                }
                ?>

            </div>
            <div class="mb-4">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Sizes">Tentang
                    Sanggar</label>
                <textarea name="desc" rows="5" placeholder="Isi Tentang Produk di sini..."
                    class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"><?= $profil['Desc_Sanggar'] ?></textarea>
            </div>
            <div class="mb-2" x-data="{ show: true }">
                <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</span>
                <div class="relative">
                    <input placeholder="Password" name="pass" :type="show ? 'password' : 'text'"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>
                    </div>
                </div>
                <?php
                if (validation_show_error('pass') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('pass'); ?>
                    </label>
                    <?php
                }
                ?>
            </div>
            <div class="mb-2" x-data="{ show: true }">
                <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Konfirm Password</span>
                <div class="relative">
                    <input placeholder="Konfirm Password" name="co-pass" :type="show ? 'password' : 'text'"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>
                    </div>
                </div>
                <?php
                if (validation_show_error('co-pass') != '') { ?>
                    <label class="ml-1 text-xs text-red-500 dark:text-white/80">
                        <?= validation_show_error('co-pass'); ?>
                    </label>
                    <?php
                }
                ?>
            </div>
            <input type="text" id="id" name="id" hidden value="<?= $profil['Id_Sanggar'] ?>">
            <input type="text" id="id" name="idkey" hidden value="<?= $profil['Id_Userkey'] ?>">
            <div class="text-left">
                <button id="simpan" type="submit"
                    class="inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                    Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('profile_picture').addEventListener('change', function () {
        document.getElementById('profileForm').submit();
    });
</script>
<?= $this->endSection() ?>