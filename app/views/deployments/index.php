<?php require APP_ROOT.'/app/views/layouts/header.php'; ?>

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2 class="mb-0">Deployment List</h2>

    <a href="<?= BASE_URL ?>/deployments/create"
       class="btn btn-success">
       <i class="fa fa-plus"></i> Add Deployment
    </a>

</div>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Client</th>
<th>Requirement</th>
<th>Status</th>

</tr>

<?php foreach($deployments as $d): ?>

<tr>

<td><?= $d['id']; ?></td>

<td><?= $d['company_name']; ?></td>

<td><?= $d['manpower_type']; ?></td>

<td><?= $d['status']; ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

<?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>