<div class="navbar">
<link rel="stylesheet" href="<?= $baseurl ?>assets/css/navbar.css">
    <div class="deco d-none d-sm-block">
        
    </div>
    <div class="content w-100 h-100 d-flex flex-wrap text-white">
        <div class="col-12 col-sm-6 col-md-3 h-100 d-flex justify-content-center align-items-center justify-content-sm-start">
            <a class="h-100" href="<?= $baseurl ?>">
                <img src="<?= $baseurl ?>assets/img/brand.svg" alt="Ru3Conc7p" class="h-100 p-3 inverted">
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-8 h-100 d-flex align-items-center p-3 justify-content-center">
            <a href="<?= $baseurl.((str_starts_with($route, 'home'))?'#boutique':'') ?>" class="<?= ($route == "home")? "everunderlined " : "" ?>p-2 text-decoration-none d-flex align-items-center justify-content-center containerUnderlined animpadding" style="border-radius: 100px; height: 60px; color: #fff;">
                <p class="m-0 p-2 text-center underlined"> <img class="icon inverted" style="height: 30px;" src="<?= $baseurl ?>assets/img/boutique.png" alt=""> Boutique</p>
            </a>
            <a href="<?= $baseurl ?>info<?= (str_starts_with($route, 'info'))?'#info':'' ?>" class="<?= ($route == "info")? "everunderlined " : "" ?>p-2 text-decoration-none d-flex align-items-center justify-content-center containerUnderlined animpadding" style="border-radius: 100px; height: 60px; color: #fff;">
                <p class="m-0 p-2 text-center underlined"> <img class="icon inverted" style="height: 30px;" src="<?= $baseurl ?>assets/img/info.png" alt=""> Info</p>
            </a>
            <?php if (str_starts_with($route, 'admin')) { ?>
            <a href="<?= $baseurl ?>admin<?= (str_starts_with($route, 'admin'))?'#admin':'' ?>" class="<?= (str_starts_with($route, 'admin'))? "everunderlined " : "" ?>p-2 text-decoration-none d-flex align-items-center justify-content-center containerUnderlined animpadding" style="border-radius: 100px; height: 60px; color: #fff;">
                <p class="m-0 p-2 text-center underlined"> <img class="icon inverted" style="height: 30px;" src="<?= $baseurl ?>assets/img/admin.png" alt=""> Admin</p>
            </a>
            <?php } ?>
        </div>
    </div>
</div>