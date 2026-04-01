<?php

function renderNavbar(string $activeMenu = 'home', string $basePath = ''): void
{
    $items = [
        'home' => ['label' => 'Home', 'href' => 'home.php'],
        'cart' => ['label' => 'Cart', 'href' => 'cart.php'],
        'add' => ['label' => 'Add Product', 'href' => '../sesi-9/admin/product/create.php']
    ];
    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Ahsan Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach ($items as $key => $item): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($activeMenu === $key) ? 'active' : ''; ?>" href="<?= $basePath . $item['href'] ?>"><?php echo $item['label']; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
<?php
}   