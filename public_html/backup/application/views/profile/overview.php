<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <?php $this->load->view('profile/layouts/editormenu'); ?>
        <?php echo form_start_divs($title, 'Overview' . (isset($userinformation->full_name_en) ? ' of ' . $userinformation->full_name_en . ', ' . (isset($groupname) ? $groupname : '') : ''), "'biodata'"); ?>
        <a href="javascript:void(0)" onclick="printdiv('biodataen')">
        	<i class="fa fa-print" style="font-size: 22px;"></i>
        </a>
        
        <div id="biodataen">
                    <div style="font-size: 15px; font-family: 'Trebuchet MS', 'kalpurush'; vertical-align: top;">
                        <table style="font-size: 15px; font-family: 'Trebuchet MS', 'kalpurush'; vertical-align: top;">
                            <tr>
                                <td colspan="3">
                                    <hr/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;">
                                    <table style="width: 900px;table-layout:fixed;">
                                        <tr>
                                            <td width="180">
                                                Name
                                            </td>
                                            <td width="10">:</td>
                                            <td>
                                                <?php __e((isset($biodata['englishname']) ? ' ' . $biodata['englishname'] : '')); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="180">
                                                Gender
                                            </td>
                                            <td width="10">:</td>
                                            <td>
                                                <?php __e((isset($biodata['genderen']) ? ' ' . $biodata['genderen'] : '')); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="180">
                                                Date of birth
                                            </td>
                                            <td width="10">:</td>
                                            <td>
                                                <?php __e((isset($biodata['dob']) ? ' ' . $biodata['dob'] : '')); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="180">
                                                Phone
                                            </td>
                                            <td width="10">:</td>
                                            <td>
                                                <?php __e((isset($biodata['phone']) ? ' ' . $biodata['phone'] : '')); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="180">
                                    <?php
                                    if (isset($personalinformation->UserPhoto)) {
                                        $url = base_url() . "/uploads/pp/" . $personalinformation->UserPhoto;
                                    } else {
                                        $url = '';
                                    }
                                    $id = '';
                                    $class = 'img-circle';
                                    $alt = 'avatar';
                                    $w = '150px';
                                    __img($url, $id, $class, $alt, $w);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr/>
                                </td>
                            </tr>
                            <?php
                            if (!empty($biodata['enstdinfo'])) {
                                $bnstdinfo = $biodata['enstdinfo'];
                                $return = explode('|', $bnstdinfo);
                                echo userdetails_by_group($biodata['group_id'], $return);
                            }
                            ?>
                            <tr>
                                <td colspan="3">
                                    <table style="width: 900px;table-layout:fixed;">
                                        <tr>
                                            <td width="180"><?php __e(($biodata['group_id'] != 4) ? 'National ID' : 'Birth Certificate');  ?></td>
                                            <td width="10">:</td>
                                            <td colspan="4"><?php __e((isset($biodata['uniquenumber']) ? ' ' . $biodata['uniquenumber'] : '')); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table style="width: 900px;table-layout:fixed;">
                                        <tr>
                                            <td width="180">Marital Status</td>
                                            <td width="10">:</td>
                                            <td width="260"><?php __e((isset($biodata['maritalstatusen']) ? ' ' . $biodata['maritalstatusen'] : '')); ?></td>
                                            <td width="180">Religion</td>
                                            <td width="10">:</td>
                                            <td width="260"><?php __e((isset($biodata['religion']) ? ' ' . $biodata['religionen'] : '')); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table style="width: 900px;table-layout:fixed;">
                                        <tr>
                                            <td width="180">Father's Name</td>
                                            <td width="10">:</td>
                                            <td width="260"><?php __e((isset($biodata['englishfname']) ? ' ' . $biodata['englishfname'] : '')); ?></td>
                                            <td width="180">Mother's Name</td>
                                            <td width="10">:</td>
                                            <td width="260"><?php __e((isset($biodata['englishmname']) ? ' ' . $biodata['englishmname'] : '')); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr/>
                                </td>
                            </tr>
                            <?php
                            if (!empty($biodata['educationhistory'])) {
                                ?>
                                <tr style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                    <td colspan="3"
                                        style="border-collapse: collapse; border: 0px solid #DDD; padding: 0px;">
                                        <table
                                            style=" width: 100%;font-size: 16px; font-family: 'Trebuchet MS'; vertical-align: top; border-collapse: collapse; border: 1px solid #DDD;">
                                            <tr style="border-collapse: collapse; border: 1px solid #DDD;">
                                                <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"
                                                    colspan="7">Education History
                                                </td>
                                            </tr>
                                            <tr style="border-collapse: collapse; border: 1px solid #DDD;">
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Institute
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Exam
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Group
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    GPA/ Result
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Passing Year
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Board
                                                </th>
                                                <th style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;">
                                                    Session
                                                </th>
                                            </tr>
                                            <?php
                                            $educationhistory = $biodata['educationhistory'];
                                            $return = explode(',', $educationhistory);
                                            //owndebugger($return);
                                            foreach ((array)$return as $his) {
                                                $hist = explode('|', $his);
                                                ?>
                                                <tr style="border-collapse: collapse; border: 1px solid #DDD;">
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[0]) ? $hist[0] : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[1]) ? $hist[1] : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[2]) ? $hist[2] : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[3]) ? $hist[3] : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[4]) ? inttodateYY($hist[4]) : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[5]) ? $hist[5] : ''); ?></td>
                                                    <td style="border-collapse: collapse; border: 1px solid #DDD; padding: 5px;"><?php __e(isset($hist[6]) ? $hist[6] : ''); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>

        <?php
        	echo form_end_divs();
        	//owndebugger($biodata);
        ?>
    </div>
</div>