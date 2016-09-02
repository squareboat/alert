<?php if(session()->has('sweet_alert.alert')) { ?>
    <script>
        if (typeof swal === "function") {
            swal(<?= session('sweet_alert.alert') ?>);
        } else {
            sweet_alert = <?= session('sweet_alert.alert') ?>;
        }
    </script>
<?php } ?>
