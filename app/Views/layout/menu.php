<?php
$this->db = \Config\Database::connect();
$data = $this->db->table('menu')->get()->getResultArray();

$menu = "<li class='nav-item'>
<a class='nav-link ' href='" . base_url() . "'>
    <i class='bi bi-grid'></i>
    <span>Dashboard</span>
</a>
</li>";
foreach ($data as $key => $value) {
    $menu .= "
    <li class='nav-item'>
        <a class='nav-link' href='{$value['url']}'>
            <i class='bi bi-grid'></i>
            <span>{$value['menu_label']}</span>
        </a>
    </li>
    ";
}
?>
<ul class="sidebar-nav" id="sidebar-nav">
    <?= $menu ?>
</ul>