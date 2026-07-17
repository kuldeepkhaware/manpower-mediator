<?php require APP_ROOT.'/app/views/layouts/header.php'; ?><h3 class="mb-3">Add Client</h3>
<div class="card"><div class="card-body"><form method="post" action="<?= BASE_URL ?>/clients/store"><div class="row g-3">
<div class="col-md-6"><label>Company Name</label><input class="form-control" name="company_name" required></div>
<div class="col-md-6"><label>Contact Person</label><input class="form-control" name="contact_person" required></div>
<div class="col-md-6"><label>Mobile</label><input class="form-control" name="mobile" required></div>
<div class="col-12"><label>Address</label><textarea class="form-control" name="address"></textarea></div></div>
<button class="btn btn-success mt-3">Save Client</button></form></div></div><?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>