<div class="container h-100 bg-transparent text-center d-flex flex-column justify-content-center align-items-center">
    <a href="<?= $baseurl ?>admin/fournitures/new">new</a>
    <table class="col-10">
        <thead>
            <tr class="border-bottom border-black">
                <th class="p-1" style="width: 60px;">
                    <p class="bg-primary text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">NO.</p>
                </th>
                <th class="p-1">
                    <p class="bg-black text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Description</p>
                </th>
                <th class="p-1" style="width: 80px;">
                    <p class="bg-black text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Prix</p>
                </th>
                <th class="p-1" style="width: 120px;">
                    <p class="bg-primary text-white d-flex justify-content-center align-items-center" style="font-weight: lighter; height: 40px;">Action</p>
                </th>
            </tr>
        </thead>
        <?php foreach ($entity as $value) { ?>
        <tr class="border-bottom border-black">
            <td class="text-primary"><?= $value->getId() ?></td>
            <td class="text-start" style="padding: 0 20px;"><?= $value->getTitre() ?></td>
            <td class="text-primary"><?= $value->getPrix() ?> €</td>
            <td class="text-primary">
            <form action="<?= $baseurl ?>admin/fournitures/edit" method="post">
                    <input type="hidden" name="edit" value="<?= $value->getId() ?>">
                    <input type="submit" value="edit">
                </form>
                <form action="<?= $baseurl ?>admin/fournitures/del" method="post">
                    <input type="hidden" name="del" value="<?= $value->getId() ?>">
                    <input type="submit" value="del">
                </form>
            </td>
        </tr>
        <?php } ?>
        
    </table>
</div>