<link rel="stylesheet" href="<?= $baseurl ?>assets/css/home.css">
<div class="background">
        <img class="svg-icon" src="assets/img/icon.svg"></img>
    </div>
    <div id="accueil" class="accueil-md d-flex flex-wrap justify-content-start align-items-center mx-2 mx-md-5">
        <div class="ps-0 pe-0 ps-md-5 pe-md-1 col-12 col-md-6 justify-content-md-center align-items-md-center cu-text-md-center">
            <h2 class="orbitron">
                WELCOME
            </h2>
            <p class="">
            Plongez dans l'univers fascinant des accessoires en latex <br>
            pour parfaire votre look fetish chez Ru3conc7p, <br>
            une boutique française fondée par un artisan local. <br>
            Spécialisée dans la création de latex de Light, <br>
            Ru3conc7p propose un style unique mêlant le fetish cyber et <br>
            futuriste. N'oubliez pas de suivre et soutenir la boutique <br>
            sur les réseaux sociaux pour ne manquer <br>
            aucune nouveauté et inspiration excitante !!
            </p>
        </div>
        <div class="col-12 pt-5 pb-3 col-md-6 min-vh-0 min-vh-md-100 pe-1 d-flex flex-column align-items-center justify-content-center">
            <img src="assets/img/collier.png" alt="" class="w-75 p-3 p-md-5">
            <a href="" class="border-white text-white rounded-4 fw-bolder border border-2 px-5 py-3 text-decoration-none">BUY</a>
        </div>

    </div>
<div id="boutique" class="d-flex flex-wrap justify-content-center">

<?php
for ($i=0; $i < 10; $i++) { 
?>

<div class="product-thunmbail overflow-hidden d-flex align-items-center flex-column">
    <img src="assets/img/collier.png" alt="" class="w-100">
    <h3 class="mx-1 mt-2" style="font-size: 1.2rem; color: #fff;">
        Collier en latex
        <p class="mx-1 mt-2" style="font-size: 1rem;">personalisé</p>
        <p class="orbitron mx-1 mt-2" style="font-size: 1.2rem;">150€</p>
    </h3>
</div>


        <?php
}
?>