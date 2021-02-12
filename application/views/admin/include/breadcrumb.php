<div class="bg-white">
    <div class="container w-100">
        <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">simpeg</a></li>
            <li class="breadcrumb-item active"><?= 'dashboard '.strtolower(implode(' ', explode('_', $uri1)));?></li>
            <?php if (isset($uri2) && $uri2!='dashboard') { ?>
                <li class="breadcrumb-item active"><?= strtolower(implode(' ', explode('_', $uri2)));?></li>
            <?php }?>
            <?php if (isset($uri3)) { ?>
                <li class="breadcrumb-item active"><?= strtolower(implode(' ', explode('_', $uri3)));?></li>
            <?php }?>
            <?php if (isset($uri4) && !is_numeric($uri4) && $uri2!='master_pegawai' && $uri3!=$uri4) { ?>
                <?php if($uri3=='proses_validasi'){ ?>
                    <li class="breadcrumb-item active"><?= decrypt_url($uri4);?></li>
                <?php }else{?>
                    <li class="breadcrumb-item active"><?= strtolower(implode(' ', explode('_', $uri4)));?></li>
                <?php }?>
            <?php }?>
        </ol>
    </div>
</div>