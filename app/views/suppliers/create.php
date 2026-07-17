<?php require APP_ROOT.'/app/views/layouts/header.php'; ?><h3 class="mb-3">Add Supplier</h3>
<div class="card"><div class="card-body"><form method="post" action="<?= BASE_URL ?>/suppliers/store"><div class="row g-3">
<div class="col-md-6"><label>Vendor Name</label><input class="form-control" name="vendor_name" required></div><div class="col-md-6"><label>Contact Person</label><input class="form-control" name="contact_person" required></div>
<div class="col-md-6"><label>Mobile</label><input class="form-control" name="mobile" required></div><div class="col-md-6"><label>GST No.</label><input class="form-control" name="gst_no"></div>
<div class="col-12"><label>Services</label><textarea class="form-control" name="services" placeholder="Security Guards, Housekeeping, Drivers..."></textarea></div></div>
<button class="btn btn-success mt-3">Save Supplier</button></form></div></div><?php require APP_ROOT.'/app/views/layouts/footer.php'; ?>