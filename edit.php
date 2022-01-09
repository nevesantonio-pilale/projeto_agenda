<?php
    include_once("templates/header.php");
?>
    <div class="container" id="edit-form">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title"> Editar contacto </h1>

        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">

            <div class="form-group">
                <label for="name"> Nome do Contacto: </label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Digite o nome" value="<?= $contact['nome'] ?>" required>
            </div>

            <div class="form-group">
                <label for="phone"> Telefone do Contacto: </label>
                <input class="form-control" type="tel" name="phone" id="phone" placeholder="Digite o telefone do contacto" value="<?= $contact['Phone'] ?>" required>
            </div>

            <div class="form-group">
                <label for="descriptions"> Descrição do Contacto: </label>
                <textarea class="form-control" name="descriptions" id="descriptions" rows="3" placeholder="Digite a descrição do contacto"><?= $contact["observations"] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"> Actualizar </button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>