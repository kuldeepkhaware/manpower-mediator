<?php require APP_ROOT.'/app/views/layouts/header.php'; ?>

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Add Deployment</h2>

    <a href="<?= BASE_URL ?>/deployments"
       class="btn btn-secondary">
        Back
    </a>
</div>

<form method="post" action="<?= BASE_URL ?>/deployments/store">

<div class="row">

<div class="col-md-6 mb-3">
<label>Client</label>

<select name="client_id" class="form-select" required>

<option value="">Select Client</option>

<?php foreach($clients as $c): ?>

<option value="<?= $c['id']; ?>">
<?= htmlspecialchars($c['company_name']); ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Requirement</label>

<select name="requirement_id" class="form-select" required>

<option value="">Select Requirement</option>

<?php foreach($requirements as $r): ?>

<option value="<?= $r['id']; ?>">
<?= htmlspecialchars($r['manpower_type']); ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Source</label>

<select name="source_type" class="form-select">

<option value="candidate">Candidate</option>

<option value="supplier">Supplier</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Candidate</label>

<select name="candidate_id" class="form-select">

<option value="">Select Candidate</option>

<?php foreach($candidates as $c): ?>

<option value="<?= $c['id']; ?>">
<?= htmlspecialchars($c['name']); ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Supplier</label>

<select name="supplier_id" class="form-select">

<option value="">Select Supplier</option>

<?php foreach($suppliers as $s): ?>

<option value="<?= $s['id']; ?>">
    <?= htmlspecialchars($s['vendor_name']); ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Joining Date</label>

<input
type="date"
name="joining_date"
class="form-control"
value="<?= date('Y-m-d'); ?>">

</div>

<div class="col-md-6 mb-3">

<label>Shift</label>

<input
type="text"
name="shift"
class="form-control"
placeholder="Day / Night">

</div>

<div class="col-md-6 mb-3">

<label>Location</label>

<input
type="text"
name="location"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Supervisor Name</label>

<input
type="text"
name="supervisor_name"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Salary</label>

<input
type="number"
step="0.01"
name="salary"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Status</label>

<select name="status" class="form-select">

<option value="Pending">Pending</option>

<option value="Active">Active</option>

<option value="Completed">Completed</option>

<option value="Cancelled">Cancelled</option>

</select>

</div>

<div class="col-12 mb-3">

<label>Remarks</label>

<textarea
name="remarks"
class="form-control"
rows="3"></textarea>

</div>

</div>

<button class="btn btn-success btn-lg">

Save Deployment

</button>

</form>

</div>

<?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>