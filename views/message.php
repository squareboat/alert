<?php if(session()->has('sweet_alert.alert')) { ?>
    <script>
        if (typeof swal === "function") {
            swal(<?= e(session('sweet_alert.alert')) ?>);
        } else {
            sweet_alert = <?= e(session('sweet_alert.alert')) ?>;
        }
    </script>
<?php } ?>
