<div class="auto_profile_datamenu">
    <ul class="personalprofiledata">
        <li>
            <a href="#" class="persoprofileData ">
                <div class="proimg">
                    <?php
                    if (isset($personalinformation->UserPhoto)) {
                        $url = $this->initial->initial_settings()->upload_path . "/pp/" . $personalinformation->UserPhoto;
                    } else {
                        $url = $this->initial->initial_settings()->upload_path . "/pp/blankavatar.jpg";
                    }
                    $id = '';
                    $class = 'avatar img-rounded img-thumbnail fb-image-profile thumbnail';
                    $alt = 'avatar';
                    $w = '80px';
                    __img($url, $id, $class, $alt, $w);
                    ?>
                    <div class="clearfix"></div>
                    <strong><?php __e((isset($userinformation->first_name) ? $userinformation->first_name : '')); ?>
                    <?php __e((isset($userinformation->last_name) ? ' ' . $userinformation->last_name : '')); ?></strong>
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost/ideatweaker/socialnetwork/ecommerce/ecommerce.php" class="persoprofileData ">
                <div class="proimg">
                    <img src="<?php echo base_url() . '/footprints/img/photoLanding.png' ?>" alt="summaryLanding"/>
                    <div class="clearfix"></div>
                    Products
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost/ideatweaker/socialnetwork/events/events.php" class="persoprofileData ">
                <div class="proimg">
                    <img src="<?php echo base_url() . '/footprints/img/honsLanding.PNG' ?>" alt="summaryLanding"/>
                    <div class="clearfix"></div>
                    Events
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost/ideatweaker/socialnetwork/job/jobs.php" class="persoprofileData ">
                <div class="proimg">
                    <img src="<?php echo base_url() . '/footprints/img/honsLanding.PNG' ?>" alt="summaryLanding"/>
                    <div class="clearfix"></div>
                    Jobs
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost/ideatweaker/socialnetwork/crowdfunding/crowdfunding_projects.php"
               class="persoprofileData ">
                <div class="proimg">
                    <img src="<?php echo base_url() . '/footprints/img/summaryLanding.png' ?>" alt="summaryLanding"/>
                    <div class="clearfix"></div>
                    CrowdFunding
                </div>
            </a>
        </li>

    </ul>
    <ul class="othersprofiledata">
        <li><a href="http://localhost/ideatweaker/socialnetwork/radio_show/allradioshows.php">Radio Shows</a></li>
        <li><a href="http://localhost/ideatweaker/socialnetwork/road_shows/road_shows.php">Road Shows</a></li>
        <li><a href="http://localhost/ideatweaker/socialnetwork/green_directory/green_directory.php">Green Directory</a>
        </li>
        <li><a href="http://localhost/ideatweaker/socialnetwork/press_releases/pressreleases.php">Press Release</a></li>
        <li><a href="http://localhost/ideatweaker/socialnetwork/appoinment/appoinment.php">Appointments</a></li>
        <li><a href="http://localhost/ideatweaker/socialnetwork/business_coaching/business_coaching.php">Coaching</a>
        </li>

    </ul>
</div>