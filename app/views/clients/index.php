<?php require APP_ROOT.'/app/views/layouts/header.php'; ?>
<div class="d-flex justify-content-between mb-3"><h3>Clients</h3><a class="btn btn-success" href="<?= BASE_URL ?>/clients/create">+ Add Client</a></div>
<div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>ID</th><th>Company</th><th>Contact</th><th>Mobile</th><th>Address</th></tr></thead><tbody>
<?php foreach($clients as $c): ?><tr><td><?= $c['id'] ?></td><td><?= htmlspecialchars($c['company_name']) ?></td><td><?= htmlspecialchars($c['contact_person']) ?></td><td><?= htmlspecialchars($c['mobile']) ?></td><td><?= htmlspecialchars($c['address']) ?></td></tr><?php endforeach; ?>
</tbody></table></div></div><?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>