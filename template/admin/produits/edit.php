<div class="container min-h-100 bg-transparent text-center d-flex flex-column justify-content-center align-items-center">
<link rel="stylesheet" href="<?= $baseurl ?>assets/css/admin-produits/new.css">
<p id="baseurl" class="d-none"><?= $baseurl ?></p>
<form action="" method="post" class="d-flex flex-column align-items-center w-100 p-3">
    <input type="hidden" name="id" value="<?= (isset($_POST['edit']))? $entity->getId() : "" ?>">
    <input type="text" name="titre" placeholder="Description" value="<?= (isset($_POST['edit']))? $entity->getTitre() : "" ?>">
    <div class="d-flex justify-content-center">
        <input type="number" step="0.01" name="mo" placeholder="prix" value="<?= (isset($_POST['edit']))? $entity->getMaindoeuvre() : "" ?>">
        <p>%</p>
    </div>
    <input type="text" name="link" placeholder="Lien" value="<?= (isset($_POST['link']))? $entity->getLink() : "" ?>">
    <br>
    <h3>Fournitures :</h3>
    <div>
        <select id="fournitures">
        <?php foreach ($entity['fournitures'] as $fourniture) { ?>
            <option value="<?= $fourniture->getId() ?>"><?= $fourniture->getTitre() ?></option>
            <?php } ?>
        </select>
        <input id="fournitures-quantity" step="1" min="1" value="1" type="number">
        <button type="button" onclick="addFourniture()">ajouter</button>
    </div>
    <table class="col-10">
        <thead>
            <tr class="border-bottom border-black">
                <th class="p-1" style="width: 60px;">
                    <p class="bg-primary text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">NO.</p>
                </th>
                <th class="p-1">
                    <p class="bg-black text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Titre</p>
                </th>
                <th class="p-1" style="width: 80px;">
                    <p class="bg-black text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Qte.</p>
                </th>
                <th class="p-1" style="width: 120px;">
                    <p class="bg-primary text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Action</p>
                </th>
            </tr>
        </thead>
        <tbody id="fournitures-container">
        </tbody>
        
    </table>
    <br>
    <h3 class="m-2">Images:</h3>
    <div id="preview" class="m-3" style="display: none;">
        <img src="" alt="preview" height="100" width="100">
    </div>
    <div class="d-flex">
        <select id="images-emplacement">
        <option value="0">en bas</option>
        <option value="1">à droite</option>
        <option value="2">en haut</option>
        <option value="3">à gauche</option>
        </select>
        <div>
            <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
            <label for="file-input">
                <div>
                <span class="browse-button p-2 rounded text-white m-2">Browse file</span>
                </div>
                <input id="file-input" type="file" class="d-none" />
            </label>
            <div class="crop-container">
            <img id="image" src="" alt="to crop">
            <button type="button" id="crop-button">Crop</button>
            </div>
            <canvas id="canvas" style="display:none;"></canvas>

            
        </div>
        <button type="button" onclick="addImage()">ajouter</button>

    </div>
    <table class="col-10">
        <thead>
            <tr class="border-bottom border-black">
                <th class="p-1">
                    <p class="bg-black text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Apercu</p>
                </th>
                <th class="p-1" style="width: 120px;">
                    <p class="bg-primary text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Action</p>
                </th>
            </tr>
        </thead>
        <tbody id="images-container">
        </tbody>
        
    </table>
    <br>
    <br>
    <input type="submit" name="return" value="<?= (isset($_POST['edit']))? "edit" : "new" ?>">


</form>
<script src="https://unpkg.com/cropperjs"></script>
<script src="<?= $baseurl ?>assets/js/admin-produits/new.js"></script>
</div>


