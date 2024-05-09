<?php
$admin = 1;
if ($this->ion_auth->in_group($admin)) {
    ?>
    <ul class="list-inline">
        <li><a href="<?php __menu('org_informations'); ?>">Organization Informations</a></li>
        <li><a href="<?php __menu('admin_informations'); ?>">Administrator Informations</a></li>
        <li><a href="<?php __menu('social_login'); ?>">Social Login</a></li>
    </ul>
    <?php
} else {
    redirect('dashboard');
}
?>