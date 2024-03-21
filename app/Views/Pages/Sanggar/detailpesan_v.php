<?= $this->extend('pages/Sanggar/bungkus') ?>
<?= $this->section('content') ?>
<!-- cards -->
<div class="w-full max-w-full h-[512px] px-3 flex flex-col justify-between">
    <div
        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex flex-row items-center p-4 bg-white border-b-0 rounded-t-2xl">
            <div
                class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                <img src="<?= base_url('assets/img/profil/' . $pro['foto']); ?>" alt="kal"
                    class="w-full h-full shadow-soft-2xl rounded-xl" />
            </div>
            <div class="flex flex-col items-start justify-center">
                <h6 class="mb-0 leading-normal text-sm">
                    <?= $pro['nama']; ?>
                </h6>
            </div>
        </div>
        <div id="chatMessages" class="flex-1 p-4 overflow-hidden hover:overflow-auto">
            <?php
            foreach ($pesan as $data):
                ?>
                <?php
                if ($data['Pengirim'] == 1):
                    ?>
                    <div class="flex items-start mb-4">
                        <div class="message-bubble bg-gray-300 p-3 rounded-lg shadow">
                            <p class="text-sm">
                                <?= $data['Pesan']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                else:
                    ?>

                    <div class="flex items-end justify-end mb-4">
                        <div class="message-bubble bg-blue-500 text-white p-3 rounded-lg shadow">
                            <p class="text-sm">
                                <?= $data['Pesan']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                endif;
            endforeach;
            ?>
            <!-- Chat messages go here -->

        </div>
        <!-- Input area for new messages -->
        <div class="bg-white p-4 flex items-center">
            <form action="<?= base_url('kirimpesan') ?>" method="post" class="w-full flex items-center">
                <?= csrf_field(); ?>
                <input type="text" id="id" name="id" hidden value="<?= isset($data) ? $data['Id_PesanGrup'] : '' ?>">
                <input type="text" name="pesan" placeholder="Ketik Pesan Anda di sini"
                    class="flex-1 p-2 border rounded-lg mx-2 focus:outline-none focus:ring focus:border-blue-300">
                <button type="submit" class="text-blue-600 hover:text-blue-700 focus:outline-none">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>


</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Scroll to the bottom of the chat messages container
        var chatMessagesContainer = document.getElementById("chatMessages");
        chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
    });
</script>
<?= $this->endSection() ?>