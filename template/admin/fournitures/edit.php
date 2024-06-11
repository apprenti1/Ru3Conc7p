<div class="container h-100 bg-transparent text-center d-flex flex-column justify-content-center align-items-center">

<form action="" method="post">
    <input type="hidden" name="id" value="<?= (isset($_POST['edit']))? $entity->getId() : "" ?>">
    <div></div>
    <input type="text" name="titre" placeholder="Description" value="<?= (isset($_POST['edit']))? $entity->getTitre() : "" ?>">
    <div class="d-flex">
        <input type="number" step="0,01" name="prix" placeholder="prix" value="<?= (isset($_POST['edit']))? $entity->getPrix() : "" ?>">
        <p>€</p>
    </div>
    <input type="submit" name="return" value="<?= (isset($_POST['edit']))? "edit" : "new" ?>">


</form>

</div>