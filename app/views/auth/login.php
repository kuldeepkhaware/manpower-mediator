<?php $_SESSION['csrf']=bin2hex(random_bytes(32)); ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css"></head>
<body class="login-bg"><div class="container"><div class="row min-vh-100 align-items-center justify-content-center"><div class="col-md-5">
<div class="card shadow border-0"><div class="card-body p-5"><h2 class="text-center mb-2">Manpower Mediator</h2><p class="text-center text-muted mb-4">Secure Login</p>
<?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div><?php endif; ?>
<form method="post" action="<?= BASE_URL ?>/login"><input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
<div class="mb-3"><label>Email</label><input class="form-control" type="email" name="email" required></div>
<div class="mb-3"><label>Password</label><input class="form-control" type="password" name="password" required></div>
<button class="btn btn-success w-100">Login</button></form><hr><small></small></div></div></div></div></div></body></html>
