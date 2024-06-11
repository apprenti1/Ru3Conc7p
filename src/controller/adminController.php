<?php
session_start();
    if (!isset($_SESSION['login']) || (isset($_SESSION['login']) && $_SESSION['login'] == false)) {
        if (isset($_POST['login']) && isset($_POST['pwd'])){
            if (empty($_POST['login'])) {
                $error = 'L\'E-mail ne peut être vide !!';
            }
            if (empty($_POST['pwd'])) {
                $error = ((isset($error))?$error.'<br>':'').'Login ne peut être vide !!';
            }
            else {
                require_once '../src/repo/UserRepository.php';
                $userRepository = new UserRepository();
                if ($userRepository->connect($_POST['login'], $_POST['pwd'])) {
                    $_SESSION['login'] = true;
                } else {
                    $_SESSION['login'] = false;
                    $error = 'Identifiants incorrect !!';
                }
            }
        }
    }

$entity;
if ( isset($_SESSION['login']) && $_SESSION['login'] == true ) {
    if ($route == 'admin') {
        $template = '../template/admin/index.php';
        $title = 'Principal /!\ Admin /!\ ';
    }
    elseif ($route == 'admin/disconnect') {
        session_destroy();
        $template = '../template/admin/login.php';
        $title = 'Connexion /!\ Admin /!\ ';
    }
    elseif (str_starts_with($route, 'admin/fournitures')) {
        require_once '../src/repo/FournitureRepository.php';
        $fournituresRepository = new FournitureRepository();
        $title = 'Fournitures /!\ Admin /!\ ';
        if ($route == 'admin/fournitures') {
            $entity = $fournituresRepository->getAll();
            $template = '../template/admin/fournitures/index.php';
        }
        elseif ($route == 'admin/fournitures/new') {
            if (isset($_POST['return']) && $_POST['return'] == 'new') {
                $fournituresRepository->create(new Fourniture(null, $_POST['titre'], $_POST['prix']));
                header("Location: ".$baseurl."admin/fournitures");
            }
            else{$template = '../template/admin/fournitures/edit.php';}
        }
        elseif ($route == 'admin/fournitures/edit') {
            if (isset($_POST['return']) && $_POST['return'] == 'edit') {
                $fournituresRepository->update(new Fourniture($_POST['id'], $_POST['titre'], $_POST['prix']));
                header("Location: ".$baseurl."admin/fournitures");
            }
            elseif (isset($_POST['edit'])) {
                $entity = $fournituresRepository->getById($_POST['edit']);
                $template = '../template/admin/fournitures/edit.php';
            }
            else {
                header("Location: ./");
            }
        }
        elseif ($route == 'admin/fournitures/del') {
            if (isset($_POST['del'])) {
                $entity = $fournituresRepository->delete(new Fourniture($_POST['del'], null, null));
                header("Location: ".$baseurl."admin/fournitures");              }
            else {
                header("Location: ./");
            }
        }
    }
    elseif (str_starts_with($route, 'admin/produits')) {
        require_once '../src/repo/ProduitRepository.php';
        require_once '../src/repo/FournitureRepository.php';
        require_once '../src/repo/ImageRepository.php';
        $produitRepository = new ProduitRepository();
        $fournituresRepository = new FournitureRepository();
        $imageRepository = new ImageRepository();
        $title = 'Produits /!\ Admin /!\ ';
        if ($route == 'admin/produits') {
            $entity = $produitRepository->getAll();
            $template = '../template/admin/produits/index.php';
        }
        elseif ($route == 'admin/produits/new') {
            if (isset($_POST['return']) && $_POST['return'] == 'new') {
                $produitRepository->create(new Produit(null, $_POST['titre'], $_POST['mo'], $_POST['link']));
                foreach ($_POST['images'] as $key => $value) {
                    $imageRepository->create(new Image(null, $value, $_POST['images-emplacement'][$key], $produitRepository->getLast()->getId()));
                }
                header("Location: ".$baseurl."admin/produits");
            }
            else{
                $entity['fournitures'] = $fournituresRepository->getAll();
                $template = '../template/admin/produits/edit.php';
            }
        }
        elseif ($route == 'admin/produits/edit') {
            if (isset($_POST['return']) && $_POST['return'] == 'edit') {
                $produitRepository->update(new Produit($_POST['id'], $_POST['titre'], $_POST['mo'], $_POST['link']));
                header("Location: ".$baseurl."admin/produits");
            }
            elseif (isset($_POST['edit'])) {
                $entity = $produitRepository->getById($_POST['edit']);
                $template = '../template/admin/produits/edit.php';
            }
            else {
                header("Location: ./");
            }
        }
        elseif ($route == 'admin/produits/del') {
            if (isset($_POST['del'])) {
                $entity = $produitRepository->delete(new Produit($_POST['del'], null, null, null));
                header("Location: ".$baseurl."admin/produits");              }
            else {
                header("Location: ./");
            }
        }
    }
}
else {
    $template = '../template/admin/login.php';
    $title = 'Connexion /!\ Admin /!\ ';

}
require '../template/base.php';
?>