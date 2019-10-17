<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Pacientes - Adicionar Pacientes</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="task">Nome do paciente:</label>
            <input type="text" name="name" id="name" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="task">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control"/>
        </div>

        <div class="form-group">
            <div class="radio">
                <label for="sex">Sexo:</label>
                <label><input type="radio" name="sex"
                              value="0"/>Feminino
                </label>
                <label><input type="radio" name="sex"
                              value="1"/>Masculino
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="task">Data de Nascimento:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="task">Endereço:</label>
            <input type="text" name="address" id="address" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="task">Telefone:</label>
            <input type="text" name="phone" id="phone" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="task">Convênio:</label>
            <input type="text" name="health_insurance" id="health_insurance" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="task">N° do Convênio:</label>
            <input type="text" name="number_covenant" id="number_covenant" class="form-control"/>
        </div>

        <br/>

        <input type="submit" value="Adicionar" class="btn btn-default"/>
    </form>

</div>