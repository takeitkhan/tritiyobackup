<style>
    #contact-list {
        padding: 0 !important;
        margin: 0;
    }

    #contact-list li.list-group-item {
        padding: 5px 0px !important;
    }

    li.list-group-item .col-xs-12, li.list-group-item .col-sm-12 {
        padding-left: 0;
    }

    .panel > .list-group .list-group-item:first-child {
        /*border-top: 1px solid rgb(204, 204, 204);*/
    }

    @media (max-width: 767px) {
        .visible-xs {
            display: inline-block !important;
        }

        .block {
            display: block !important;
            width: 100%;
            height: 1px !important;
        }
    }

    .c-search > .form-control {
        border-radius: 0px;
        border-width: 0px;
        border-bottom-width: 1px;
        font-size: 1.3em;
        padding: 12px 12px;
        height: 44px;
        outline: none !important;
    }

    .c-search > .form-control:focus {
        outline: 0px !important;
        -webkit-appearance: none;
        box-shadow: none;
    }

    .c-search > .input-group-btn .btn {
        border-radius: 0px;
        border-width: 0px;
        border-left-width: 1px;
        border-bottom-width: 1px;
        height: 44px;
    }

    ul.c-controls {
        list-style: none;
        margin: 0px;
        min-height: 44px;
    }

    ul.c-controls li {
        margin-top: 8px;
        float: left;
    }

    ul.c-controls li a {
        font-size: 1.7em;
        padding: 11px 10px 6px;
    }

    ul.c-controls li a i {
        min-width: 24px;
        text-align: center;
    }

    ul.c-controls li a:hover {
        background-color: rgba(51, 51, 51, 0.2);
    }

    .name {
        font-size: 15px;
        padding-left: 10px;
        font-weight: 700;
    }

    .c-info {
        padding: 5px 10px;
        font-size: 1.25em;
    }
</style>
<div class="row mainbox">
    <div class="row staticinfos">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php __e((isset($title) ? $title : '')); ?>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <ul>
                        <li>From Computer = Click to Email any contact in your CRM Data Base</li>
                        <li>From Cell Phones = Click to Call or Click to Email any contact in your CRM Data Base</li>
                    </ul>
                    <hr/>
                </div>
                <div class="col-md-4">
                    <input id="searchaddresses" class="form-control" placeholder="Search by name, phone and email"/>

                    <div class="panel panel-default">
                        <div class="controls">
                            <br/>
                            <?php
                            //owndebugger($totalcontacts);
                            ?>
                            You
                            have <?php __e((isset($totalcontacts[0]['TotalAddress']) ? $totalcontacts[0]['TotalAddress'] : '')); ?>
                            contacts
                            <br/>
                        </div>
                        <div id="contact-lists">
                            <ul class="list-group" id="contact-list" style="overflow: scroll; height: 800px;">
                                <?php if (!empty($contacts)) { ?>
                                    <?php foreach ((array)$contacts as $con) { ?>
                                        <li class="list-group-item">
                                            <div class="col-xs-12 col-sm-12">
                                            <span
                                                class="name">
                                                <a href="<?php echo base_url(); ?>crm_panel/<?php __e((isset($con['AddressId']) ? $con['AddressId'] : '')); ?>"><?php __e((isset($con['Name']) ? $con['Name'] : '')); ?></a>
                                            </span>
                                            <span
                                                class="text-muted c-info pull-right"
                                                data-toggle="tooltip"
                                                title="<?php __e((isset($con['Phone']) ? $con['Phone'] : '')); ?>">
                                                <a href="tel:<?php __e((isset($con['Phone']) ? $con['Phone'] : '')); ?>?call">
                                                    <i class="fa fa-phone"></i>
                                                </a>
                                            </span>
                                            <span class="c-info pull-right">
                                                <a class=""
                                                   href="<?php echo base_url(); ?>crm_panel/<?php __e((isset($con['AddressId']) ? $con['AddressId'] : '')); ?>">
                                                    <i class="fa fa-eye fa-fw"></i>
                                                </a>
                                            </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                    <?php } ?>
                                <?php } else { ?>
                                    You have not uploaded any contacts.
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php if (!empty($contact)) { ?>
                    <?php $con = $contact; ?>
                    <div class="panel panel-default staticinfos">
                        <div class="panel-heading">
                            Contact Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="text-transform: uppercase; margin-bottom: 10px;"><?php __e((isset($con['Name']) ? $con['Name'] : '')); ?></h4>
                                </div>
                                <div class="col-md-6 pull-right">
                                        <span
                                            class="text-muted c-info pull-right"
                                            data-toggle="tooltip"
                                            title="<?php __e((isset($con['Phone']) ? $con['Phone'] : '')); ?>">
                                        <a href="tel:<?php __e((isset($con['Phone']) ? $con['Phone'] : '')); ?>?call">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </span>
                                </div>
                                <hr/>

                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <?php echo form_open_multipart('disposition', array('class' => 'form-horizontal', 'id' => 'dispositionForm')); ?>
                                    <?php
                                    $data = array(
                                        'name' => 'addressbookid',
                                        'class' => 'form-control',
                                        'type' => 'hidden',
                                        'value' => (isset($con['AddressId']) ? $con['AddressId'] : 'none')
                                    );
                                    echo form_input($data);
                                    ?>
                                    <div class="form-group">
                                        <div class="col-md-11">
                                            <strong>Next Call Date</strong>
                                            <?php
                                            $data = array(
                                                'name' => 'nextcalldate',
                                                'id' => 'datewithtime',
                                                'class' => 'form-control',
                                                'value' => ''
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-11">
                                            <strong>Interests In Percentage</strong>
                                            <?php echo form_dropdown('interestsrate', $interests, '', array('class' => 'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-11">
                                            <strong>Other Notes</strong>
                                            <?php
                                            $data = array(
                                                'name' => 'othernotes',
                                                'class' => 'form-control',
                                                'rows' => '2',
                                                'value' => ''
                                            );
                                            echo form_textarea($data);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-11">
                                            <input id="dispositionBtn" class="btn btn-success" value="Update"
                                                   type="submit">
                                            <span></span>
                                            <input class="btn btn-default" value="Cancel" type="reset">
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <div style="border-left: 1px solid #DDD;" class="col-md-5">
                                    <address>
                                        <?php __e((isset($con['AddressId']) ? (!empty($con['AddressId'])) ? '<strong>User ID</strong>: ' . $con['AddressId'] . ', ' : '' : '')); ?>
                                        <?php __e((isset($con['Phone']) ? (!empty($con['Phone'])) ? '<strong>Phone</strong>: ' . $con['Phone'] . '<br>' : '' : '')); ?>
                                        <?php __e((isset($biodata['groupname']) ? (!empty($biodata['groupname'])) ? '<strong>User Type</strong><br>' . $biodata['groupname'] . '<br>' : '' : '')); ?>
                                        <?php __e((isset($biodata['address']) ? (!empty($biodata['address'])) ? '<strong>Address</strong><br>' . $biodata['address'] . '<br>' : '' : '')); ?>
                                    </address>
                                    <fieldset>
                                        <legend>Send Custom Message</legend>
                                        <?php echo form_open_multipart('custommessage', array('class' => 'form-horizontal', 'id' => 'customMessageForm')); ?>
                                        <?php
                                        $data = array(
                                            'name' => 'addressbookid',
                                            'class' => 'form-control',
                                            'type' => 'hidden',
                                            'value' => (isset($con['AddressId']) ? $con['AddressId'] : 'none')
                                        );
                                        echo form_input($data);
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                Phone Number
                                            </div>
                                            <div class="col-md-8">
                                                <?php
                                                $data = array(
                                                    'name' => 'phonenumber',
                                                    'class' => 'form-control',
                                                    'type' => 'text',
                                                    'readonly' => 'readonly',
                                                    'value' => (isset($con['Phone']) ? $con['Phone'] : 'none')
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <?php
                                                $data = array(
                                                    'name' => 'message',
                                                    'class' => 'form-control',
                                                    'rows' => '2',
                                                    'value' => ''
                                                );
                                                echo form_textarea($data);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-11">
                                                <input id="customMessageBtn" class="btn btn-success" value="Send"
                                                       type="submit">
                                                <span></span>
                                                <input class="btn btn-default" value="Cancel" type="reset">
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </fieldset>
                                </div>
                                <div class="clearfix"></div>
                                <?php //owndebugger($contact); ?>

                                <div class="col-md-11">
                                    <hr/>
                                    <strong>Call History</strong>
                                    <hr/>
                                    <?php
                                    //owndebugger($callhistory);
                                    ?>
                                    <?php if (!empty($callhistory)) { ?>
                                        <ul class="list-group">
                                            <?php
                                            foreach ((array)$callhistory as $his) {
                                                ?>
                                                <li class="list-group-item">
                                                    <strong>Next Call
                                                        Date:</strong> <?php __e(isset($his['NextCallDate']) ? $his['NextCallDate'] : ''); ?>
                                                    <br/>
                                                    <strong>Interests:</strong> <?php __e(isset($his['Interests']) ? $interests[$his['Interests']] : ''); ?>
                                                    <br/>
                                                    <strong>Previous Call
                                                        Time:</strong> <?php __e(isset($his['CallTime']) ? $his['CallTime'] : ''); ?>
                                                    <br/>
                                                    <strong>Other
                                                        Notes:</strong> <?php __e(isset($his['OtherNotes']) ? $his['OtherNotes'] : ''); ?>
                                                    <br/>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    <?php } else { ?>
                                        <h4>You haven't called yet to this contact</h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <?php
                            //owndebugger($tomorrows);
                            ?>
                            <?php if (!empty($tommorrow) || !empty($nextweek)) { ?>
                                <?php if (!empty($tommorrow)) { ?>
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Appointments for Today and Tomorrow</strong>
                                        </li>
                                        <?php foreach ((array)$tommorrow as $tom) { ?>
                                            <li class="list-group-item">
                                                <?php __e((isset($tom->Name) ? '<strong>Name: </strong><a href="' . base_url() . 'crm_panel/' . $tom->AddressBookId . '">' . $tom->Name . '</a>' : '')); ?>
                                                <?php __e((isset($tom->CallDate) ? ', <strong>Date: </strong>' . $tom->CallDate : '')); ?>
                                                <?php __e((isset($tom->CallTime) ? ', <strong>Time: </strong>' . $tom->CallTime : '')); ?>
                                                <?php __e((isset($tom->Interests) ? ', <strong>Interests: </strong>' . $interests[$tom->Interests] : '')); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <?php if (!empty($nextweek)) { ?>
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Upcoming Appointments</strong>
                                        </li>
                                        <?php foreach ((array)$nextweek as $tom) { ?>
                                            <li class="list-group-item">
                                                <?php __e((isset($tom->Name) ? '<strong>Name: </strong><a href="' . base_url() . 'crm_panel/' . $tom->AddressBookId . '">' . $tom->Name . '</a>' : '')); ?>
                                                <?php __e((isset($tom->CallDate) ? ', <strong>Date: </strong>' . $tom->CallDate : '')); ?>
                                                <?php __e((isset($tom->CallTime) ? ', <strong>Time: </strong>' . $tom->CallTime : '')); ?>
                                                <?php __e((isset($tom->Interests) ? ', <strong>Interests: </strong>' . $interests[$tom->Interests] : '')); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } else { ?>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>You haven't set any schedules yet.</strong></li>
                                </ul>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>