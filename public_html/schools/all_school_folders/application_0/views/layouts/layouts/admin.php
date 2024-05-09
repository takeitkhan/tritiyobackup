<li class="vn">
    <a><i class="fa fa-picture-o"></i> Posts <span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php __menu("addpost") ?>">Add new post</a></li>
        <li><a href="<?php __menu("post") ?>">View Posts</a></li>
    </ul>
</li>
<li class="vn">
    <a><i class="fa fa-credit-card"></i> Payments Manager<span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php __menu("newledgername") ?>">Add Ledger Name</a></li>
        <li><a href="<?php __menu("transactionidadder") ?>">New Transaction ID</a></li>
        <li><a style="color: greenyellow !important;" href="<?php __menu("newcredit") ?>">New Single
                Credit</a></li>
        <li><a style="color: greenyellow !important;" href="<?php __menu("receiveatonce") ?>">Credit
                at once (Receive)</a></li>
        <li><a style="color: greenyellow !important;" href="<?php __menu("getmoneyreceipt") ?>">Print
                Money Receipt</a></li>
        <li><a style="color: orange !important;" href="<?php __menu("newdebit") ?>">New Single
                Debit</a></li>
        <li><a style="color: orange !important;" href="<?php __menu("payatonce") ?>">Debit at once
                (Pay)</a></li>
        <li><a style="color: orange !important;" href="<?php __menu("getpayslip") ?>">Print Pay
                Slip</a></li>
    </ul>
</li>
<li class="vn">
    <a><i class="fa fa-signal"></i> Admission Manager<span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php __menu("admissionrequest") ?>">New Applicants</a></li>
    </ul>
</li>
<li class="vn">
    <a><i class="fa fa-building-o"></i> Attendance Manager<span class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php __menu("generateattendance") ?>">Generate Attendance</a></li>
        <li><a href="<?php __menu("getstdattendancereport") ?>">Get Student Report</a></li>
    </ul>
</li>
<li class="vn"><a><i class="fa fa-asterisk"></i> Results <span
            class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <li><a href="<?php __menu('generateresultview'); ?>">Generate and Edit</a></li>
        <!-- <li><a href="<?php __menu('#'); ?>">Add Single Result</a></li> -->
        <li><a href="<?php __menu('viewresults'); ?>">View Results</a></li>
        <li><a href="<?php __menu('getindividualresult'); ?>">Semester Result By Student</a></li>
        <li><a href="<?php __menu('getallindividualresult'); ?>">All Result By Student</a></li>
        <li><a href="<?php __menu('searchresult'); ?>">Classwise Average Result</a></li>
        <li><a href="<?php __menu('semesterresult'); ?>">Classwise Subjects Result</a></li>
        <li><a href="<?php __menu('resultsettings'); ?>">Result Settings</a></li>
        <li><a href="<?php __menu('resultexport'); ?>">Result Export</a></li>
    </ul>
</li>

<li class="vn"><a><i class="fa fa-asterisk"></i> User Management <span
                class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">
        <!-- <li><a href="<?php __menu('createnew'); ?>">Add New</a></li> -->
        <li><a href="<?php __menu('students'); ?>">Students</a></li>
        <li><a href="<?php __menu('guardians'); ?>">Guardians</a></li>
        <li><a href="<?php __menu('teachers'); ?>">Teachers</a></li>
        <li><a href="<?php __menu('staffs'); ?>">Staffs</a></li>
        <li><a href="<?php __menu('getindividualadmitcart'); ?>">Admit Card / Testimonial</a></li>
    </ul>
</li>
<li class="vn"><a><i class="fa fa-trophy"></i> Students Promotion <span
                class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">

        <li><a href="<?php __menu('promotionAll'); ?>">Promot All Students </a></li>
        <!-- <li><a href="<?php __menu('guardians'); ?>">Guardians</a></li>
        <li><a href="<?php __menu('staffs'); ?>">Staffs</a></li>-->
    </ul>
</li>
<li class="vn"><a><i class="fa fa-cogs"></i> Settings <span
                class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">

        <li><a href="<?php __menu('subjectssettings'); ?>">Subjects</a></li>
        <li><a href="<?php __menu('designationsettings'); ?>">Designation</a></li>
    </ul>
</li>

<li class="vn"><a><i class="fa fa-commenting"></i> SMS <span
                class="fa fa-chevron-down"></span></a>
    <ul style="display: none;" class="nav child_menu">

        <li><a href="<?php __menu('sms'); ?>">Over view</a></li>
        <li><a href="<?php __menu('sms-compose'); ?>">Compose</a></li>
        <li><a href="<?php __menu('sms-archive'); ?>">Archive</a></li>
        <li><a href="<?php __menu('sms-template'); ?>">Template</a></li>
        <li><a href="<?php __menu('sms-transaction'); ?>">Transaction</a></li>
        <?php if($userid == '1357'){ ?>
        <li><a href="<?php __menu('sms-setting'); ?>">Setting</a></li>
      <?php } ?>
    </ul>
</li>
