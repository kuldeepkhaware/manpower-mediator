<?php require APP_ROOT.'/app/views/layouts/header.php'; $edit=!empty($requirement); ?>
<h3 class="mb-3"><?= $edit?'Edit':'New' ?> Requirement</h3><div class="card"><div class="card-body">
<form method="post" action="<?= BASE_URL ?><?= $edit?'/requirements/update':'/requirements/store' ?>"><?php if($edit): ?><input type="hidden" name="id" value="<?= $requirement['id'] ?>"><?php endif; ?>
<div class="row g-3"><div class="col-md-6"><label>Client</label><select class="form-select" name="client_id" required><option value="">Select Client</option>
<?php foreach($clients as $c): ?><option value="<?= $c['id'] ?>" <?= $edit&&$requirement['client_id']==$c['id']?'selected':'' ?>><?= htmlspecialchars($c['company_name']) ?></option><?php endforeach; ?></select></div>
<div class="col-md-6"><label>Manpower Type</label><input class="form-control" name="manpower_type" value="<?= htmlspecialchars($requirement['manpower_type']??'') ?>" required></div>
<div class="col-md-6"><label>Location</label><input class="form-control" name="location" value="<?= htmlspecialchars($requirement['location']??'') ?>" required></div>
<div class="col-md-3"><label>Number of Staff</label><input type="number" class="form-control" name="number_of_staff" value="<?= $requirement['number_of_staff']??'' ?>" required></div>
<div class="col-md-3"><label>Budget</label><input type="number" step="0.01" class="form-control" name="budget" value="<?= $requirement['budget']??'' ?>"></div>
<div class="col-md-6"><label>Shift Timing</label><input class="form-control" name="shift_timing" value="<?= htmlspecialchars($requirement['shift_timing']??'') ?>"></div>
<div class="col-md-6"><label>Duration</label><input class="form-control" name="duration" value="<?= htmlspecialchars($requirement['duration']??'') ?>"></div>
<?php if($edit): ?><div class="col-md-6"><label>Status</label><select class="form-select" name="status"><?php foreach(['new','forwarded','quoted','approved','deployed','closed'] as $st): ?><option <?= ($requirement['status']==$st)?'selected':'' ?>><?= $st ?></option><?php endforeach; ?></select></div><?php endif; ?>
<div class="col-12"><label>Description</label><textarea class="form-control" name="description"><?= htmlspecialchars($requirement['description']??'') ?></textarea></div></div>
<button class="btn btn-success mt-3">Save Requirement</button></form></div></div><?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>