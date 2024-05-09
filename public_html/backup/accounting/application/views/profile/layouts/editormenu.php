<?php
//error_reporting(0);
//owndebugger($userInformation); 
//owndebugger($modifyuserid);
$uri2 = $this->uri->segment(2);
$admin = 'Admin';
$teachers = 'Teachers';
$students = 'Students';
$guardians = 'Guardians';
$staffs = 'Staffs';
$members = 'Members';
?>
<?php
if ($this->ion_auth->in_group($admin) || isset($uri2)) {
    ?>
    <ul class="list-inline">
        
        <li>
            <a href="<?php __menu('basicinformation/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                Basic Information
            </a>
        </li>
        <?php if ($groupname != 'Students') { ?>
        <li>
            <a href="<?php __menu('personalinformation/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                Personal Information
            </a>
        </li>
        <?php } ?>
        <?php
        if ($groupid == 4 || $groupid == 3 || $groupid == 6) { ?>
        <li>
            <a href="<?php __menu('studentpersonalinformation/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                <?php if($groupid == 3 || $groupid == 6 ) { ?>Present Status<?php } else { ?>Academic Information<?php }?>
            </a>
        </li>
        <?php } ?>
        <li>
            <a href="<?php __menu('educationhistory/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                Education History
            </a>
        </li>
        <?php if ($modifyuserid == 1 || $modifyuserid == 3 || $modifyuserid == 6) { ?>
            <li>
                <a href="<?php __menu('workhistory/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                    Work History
                </a>
            </li>
        <?php } ?>
        <li>
            <a href="<?php __menu('overview/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                Overview
            </a>
        </li>
        <li>
            <a href="<?php __menu('changepass/' . (isset($uri2) ? $uri2 : '') . '?userpage=true'); ?>">
                Change Password
            </a>
        </li>
    </ul>
    <?php
} else if ($this->ion_auth->in_group($teachers)
    || $this->ion_auth->in_group($students)
    || $this->ion_auth->in_group($guardians)
    || $this->ion_auth->in_group($staffs)
    || $this->ion_auth->in_group($members)) {
    ?>
    <ul class="list-inline">
        <li><a href="<?php __menu('overview'); ?>">Overview</a></li>
        <li><a href="<?php __menu('changepass'); ?>">Change Password</a></li>
    </ul>
    <?php
}
?>