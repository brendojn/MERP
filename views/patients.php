<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">

    <div class="container-fluid">
        <div class="form-group">
            <a href="<?php echo BASE_URL; ?>patient/add" class="btn btn-default">Adicionar Paciente</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Telefone</th>
            <th>Convênio</th>
            <th>N° do convênio</th>
            <th>Ações</th>
        </tr>
        </thead>
        <?php
        foreach ($patients as $patient):
            ?>
            <tr>
                <td><?php echo $patient['name']; ?></td>
                <td><?php echo $patient['cpf']; ?></td>
                <td><?php echo $patient['phone']; ?></td>
                <td><?php echo $patient['health_insurance']; ?></td>
                <td><?php echo $patient['number_covenant']; ?></td>
                <td>
                        <a href="<?php echo BASE_URL; ?>patient/edit/<?php echo $patient['id']; ?>"
                           class="btn btn-default">Editar</a>
                        <a href="<?php echo BASE_URL; ?>patient/delete?patient=<?php echo $patient['id']; ?>"
                           class="btn btn-danger">Excluir</a>
                        <a href="<?php echo BASE_URL; ?>patient/info/<?php echo $patient['id']; ?>"
                           class="btn btn-info">Informações</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <ul class="pagination">
        <?php for ($q = 1; $q <= $total_pages; $q++): ?>
            <li class="<?php echo ($p == $q) ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>tasks?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
        <?php endfor; ?>
    </ul>
</div>