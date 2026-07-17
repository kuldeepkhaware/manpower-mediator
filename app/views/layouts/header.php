<?php $u=Auth::user(); ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars(APP_NAME) ?></title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css"></head><body>
<nav class="navbar navbar-dark bg-dark px-3"><a class="navbar-brand" href="<?= BASE_URL ?>/dashboard"><?= APP_NAME ?></a>
<span class="text-white"><?= htmlspecialchars($u['name']) ?> &nbsp;<a class="btn btn-sm btn-outline-light" href="<?= BASE_URL ?>/logout">Logout</a></span></nav>
<div class="container-fluid"><div class="row">
    
<aside class="col-md-2 sidebar p-3">

<a href="<?= BASE_URL ?>/dashboard">🏠 Dashboard</a>

<a href="<?= BASE_URL ?>/clients">🏢 Clients</a>

<a href="<?= BASE_URL ?>/suppliers">👥 Suppliers</a>

<a href="<?= BASE_URL ?>/requirements">📋 Requirements</a>

<a href="<?= BASE_URL ?>/matching">🎯 Candidate Matching</a>

<a href="<?= BASE_URL ?>/deployments">🚚 Deployments</a>

</aside>

<main class="col-md-10 p-4">
<?php if(!empty($_SESSION['success'])): ?><div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']);unset($_SESSION['success']); ?></div><?php endif; ?>
