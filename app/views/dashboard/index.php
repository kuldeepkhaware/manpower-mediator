<?php require APP_ROOT.'/app/views/layouts/header.php'; ?>
<div class="row g-3 mb-4"><div class="col-md-4"><div class="stat-card"><h6>Total Requirements</h6><h2><?= $count ?></h2></div></div>
<div class="col-md-4"><div class="stat-card"><h6>Logged in as</h6><h2><?= htmlspecialchars(Auth::user()['role']) ?></h2></div></div></div>
<div class="card"><div class="card-header"><b>Latest Requirements</b></div><div class="table-responsive"><table class="table mb-0">
<thead><tr><th>ID</th><th>Type</th><th>Location</th><th>Staff</th><th>Status</th></tr></thead><tbody>
<?php foreach($latest as $r): ?><tr><td><?= $r['id'] ?></td><td><?= htmlspecialchars($r['manpower_type']) ?></td><td><?= htmlspecialchars($r['location']) ?></td><td><?= $r['number_of_staff'] ?></td><td><?= htmlspecialchars($r['status']) ?></td></tr><?php endforeach; ?>
<?php if(!$latest): ?><tr><td colspan="5" class="text-center text-muted">No requirements yet</td></tr><?php endif; ?>
</tbody></table></div></div>
<?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>
