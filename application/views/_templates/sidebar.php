<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-motorcycle"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SIM Bengkel</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php 
			$id_level_user = $user['id_level_user'];
			$query = "SELECT * FROM level_user 
                NATURAL JOIN user_access_menu 
                NATURAL JOIN user_menu 
                WHERE level_user.id_level_user = $id_level_user";
			$menus = $this->db->query($query)->result_array();
		?>
<?php foreach ($menus as $menu) : ?>
  <?php if ($title == $menu['title']): ?>
    <li class="nav-item active">
  <?php else :?>
    <li class="nav-item">
	<?php endif;?>
    <a class="nav-link" href="<?= base_url($menu['url']) ?>">
      <i class="<?= $menu['icon'] ?>"></i>
      <span><?= $menu['title'] ?></span>
    </a>
  </li>
<?php endforeach; ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->