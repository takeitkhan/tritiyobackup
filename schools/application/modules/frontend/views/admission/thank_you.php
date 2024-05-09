
<div class="instructionPage">
    <div class="bfullpage">
        <div style="text-align: center; color: green; font-size: 24px; margin: 100px 0;">
            নিচে দেয়া নম্বরটি সংরক্ষণ করুন। পরবর্তী যে কোন স্টেটাস এর জন্য এই নম্বরটির প্রয়োজন হবে। ধন্যবাদ।
            <br/><br/><br/>
            <h1 style="text-align: center; color: red; font-size: 60px;"><?php echo $random; ?></h1>
        </div>
    </div>
    <div class="bfullpage">
        <?php
//        owndebugger($form_data->random_code);
//        owndebugger($settings);
//        owndebugger($form_data->json_data);
//        owndebugger(json_decode($form_data->json_data));
//        owndebugger($form_data->created_on);
//        owndebugger($form_data->userphoto);
//        owndebugger($form_data->addeddate);
        $all_data = json_decode($form_data->json_data);
        ?>
        <a href="javascript:void(0)" onclick="printdiv('printresults')">
            <i class="fa fa-print" style="font-size: 40px;"></i>
        </a>
        <div id="printresults" class="col-md-12" style="background: #F5F5F5;padding: 20px;margin-top: 50px;">
            <table class="tg" style="width: 100%; font-family: 'SolaimanLipi', sans-serif;">
                <tr>
                    <th class="tg-yw4l" colspan="10">
                        <span style="text-align: center; background: #444 none repeat scroll 0 0; color: #fff; display: table; padding: 10px; display: block; font-size: 24px; width: 150px;">ভর্তি ফর্ম </span>
                    </th>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="7" style="min-width: 790px;">
                        ফরমের ক্রমিক নংঃ <input value="<?php echo $all_data->randomcode; ?>" type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px dashed  #ccc;" >
                        তারিখঃ <input value="<?php echo bn2enNumber($all_data->created_on); ?>" type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px dashed  #ccc;"><br/>
                        শ্রেণীঃ <input value="<?php echo bn2enNumber($all_data->class); ?>" type="text" style="margin: 6px 21px;width: 40px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                        শাখাঃ <input value="<?php echo bn2enNumber($all_data->section); ?>" type="text" style="margin: 6px 21px;width: 40px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                        রোলঃ <input value="" type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                    <td class="tg-yw4l" colspan="3" style="max-width: 15px; text-align: right;">
                        <div style="max-width: 150px;">
                            <img src="<?php echo base_url('uploads/pp/' . $form_data->userphoto); ?>" style="max-width: 150px;" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10"><span style="display: block; padding: 5px 0;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10">
                        বরাবর <br>অধ্যক্ষ <br><?php echo $settings->InstituteName; ?> <br><?php echo $settings->InstituteAddress; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10"><span style="display: block; padding: 5px 0;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10">

                        <span class="part_two">
                            জনাব,<br/>
                            সবিনয় নিবেদন এই যে আমি, আপনার শিক্ষা প্রতিষ্টানে
                            <input value="<?php echo bn2enNumber(date('Y')); ?>" type="text" style="margin: 0 16px;width: 100px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                            শিক্ষাবর্ষে <input value="<?php echo bn2enNumber($all_data->class); ?>" type="text" style="margin: 0 16px;width: 40px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                            শ্রেনীতে <input value="<?php echo bn2enNumber($all_data->section); ?>"  type="text" style="margin: 0 16px;width: 40px; background:none;border:0;border-bottom:1px dashed  #ccc;">
                            বিভাগে ভর্তির নিমিত্তে আমার প্রয়োজনীয় তথ্যাবলী আপনার অনুগ্রহ বিবেচনার জন্য নিম্নে উল্লেখ করা হল ।
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10"><span style="display: block; padding: 5px 0;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        ছাত্র/ছাত্রীর নাম (বাংলায়):
                    </td>
                    <td class="tg-yw4l" colspan="8" style="min-width: 800px;">
                        <input type="text" value="<?php echo $all_data->full_name_bn; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        ইংরেজিতে (বড় হাতের অক্ষরে )
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->full_name_en; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>

                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পিতার নাম (বাংলায়)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->father_name_bn; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        ইংরেজিতে (বড় হাতের অক্ষরে )
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->father_name_en; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        মাতার নাম (বাংলায়)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->mother_name_bn; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        ইংরেজিতে (বড় হাতের অক্ষরে )
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->mother_name_en; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        জন্ম তারিখ (জন্ম নিবন্ধন অনুযায়ী)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->dob; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        মোবাইল নং (পিতা ও মাতা)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->phone; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পুর্ন ঠিকানা (বর্তমান)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->present_address; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পুর্ন ঠিকানা (স্থায়ী)
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->permanent_address; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পরবর্তী প্রতিষ্ঠানের নাম
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->study_loc; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>              
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পিতার অবর্তমানে অবিভাবকের নাম
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->absence_father_guardian; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পিতা/অবিভাবকের পেশা
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->guardian_profession; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        বার্ষিক আয়ঃ 
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->annual_income; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        পিতা/অবিভাবকের পেশা
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->guardian_profession; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        সম্পর্কঃ
                    </td>                    
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->relation; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        জাতিয়তা
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->religion; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        ধর্মঃ 
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="text" value="<?php echo $all_data->nationality; ?>" style="background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" style="max-width: 100px; width: 250px;">
                        অধ্যায়নকালীন সমায়ে ছাত্র/ছাত্রীর অবস্থান
                    </td>
                    <td class="tg-yw4l" colspan="8">
                        <input type="radio" style="background:none;border:0;border-bottom:1px dashed  #ccc; width: 30%;"> ছাত্রাবাস 
                        <input type="radio" style="background:none;border:0;border-bottom:1px dashed  #ccc; width: 30%;"> নিজবাড়ী 
                        <input type="radio" style="background:none;border:0;border-bottom:1px dashed  #ccc; width: 30%;"> অন্যান্যঃ      
                        <input type="text" value="<?php echo $all_data->randomcode; ?>" style=" background:none;border:0;border-bottom:1px dashed  #ccc;">
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10"><span style="display: block; padding: 5px 0;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="5">
                        ( অবিভাবকের পূর্ণ স্বাক্ষর ) <br>তারিখঃ
                    </td>
                    <td class="tg-yw4l" colspan="5">
                        ( ছাত্র/ছাত্রীর পূর্ণ স্বাক্ষর )<br>তারিখঃ
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10"><span style="display: block; padding: 5px 0;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td class="tg-yw4l" colspan="10">
                        অধ্যক্ষ <br><?php echo $settings->InstituteName; ?> <br><?php echo $settings->InstituteAddress; ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>
</div>
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border: none;}
    .tg td{font-family: "SolaimanLipi", sans-serif; font-size: 14px; padding: 2px 5px; border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border: none;}
    .tg th{font-family: "SolaimanLipi", sans-serif;font-size: 14px; padding: 2px 5px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border: none;}
    .tg .tg-yw4l{vertical-align:middle;}
    .tg-yw4l input {width: 100%; }

    .margin-top-20{
        margin-top: 20px;
    }
    body{                
        background-size:100% 100%;
        background-attachment: fixed; 
        background-repeat:no-repeat;
        font-family: "SolaimanLipi", sans-serif;
        padding-bottom: 40px;
    }

    @media(max-width:460px){
        .auth .auth-box{
            margin:0 10px;
        }
    }

    .auth .auth-box input::-webkit-input-placeholder { /* WebKit browsers */
        color:    #333;
        font-weight:300;
    }
    .auth .auth-box input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #333;
        font-weight:300;
    }
    .auth .auth-box input::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #333;
        font-weight:300;
    }
    .auth .auth-box input:-ms-input-placeholder { /* Internet Explorer 10+ */
        color:    #333;
        font-weight:300;
    }
    .auth span.input-group-addon,
    .input-group-btn button{
        border:none;
        background: #333!important;
        color:#000!important;
    }
    .auth form{
        font-weight:300!important;
    }
    .auth form input[type="text"],
    .auth form input[type="password"],
    .auth form input[type="email"],
    .auth form input[type="search"]{
        border:none;
        padding:10px 0 10px 0;
        background-color: rgba(255, 255, 255, 0)!important;
        background: rgba(255, 255, 255, 0);
        color:#333;
        font-size:16px;
        border-bottom:1px dotted #333;
        border-radius:0;
        box-shadow:none!important;
        height:auto;
    }
    .auth textarea{
        background-color: rgba(255, 255, 255, 0)!important;
        color:#333!important;
    }
    .auth input[type="file"] {
        color:#333;
    }
    .auth form label{
        color:#333;
        font-size:21px;
        font-weight:300;
    }
    /*for radios & checkbox labels*/
    .auth .radio label,
    .auth label.radio-inline,
    .auth .checkbox label,
    .auth label.checkbox-inline{
        font-size: 14px;    
    }

    .auth form .help-block{
        color:#333;
    }
    .auth form select{
        background-color: rgba(255, 255, 255, 0)!important;
        background: rgba(255, 255, 255, 0);
        color:#333!important;
        border-bottom:1px dashed  #333!important;
        border-radius:0;
        box-shadow:none;
    }
    .auth form select option{
        color:#000;
    }
    /*multiple select*/
    .auth select[multiple] option, 
    .auth select[size] {
        color:#333!important;
    }

    /*Form buttons*/
    .auth form .btn{
        background:none;
        -webkit-transition: background 0.2s ease-in-out;
        -moz-transition: background 0.2s ease-in-out;
        -ms-transition: background 0.2s ease-in-out;
        -o-transition: background 0.2s ease-in-out;
        transition: background 0.2s ease-in-out;
    }
    .auth form .btn-default{
        color:#333;
        border-color:#333;
    }
    .auth form .btn-default:hover{
        background:rgba(225, 225, 225, 0.3);
        color:#333;
        border-color:#333;
    }
    .auth form .btn-primary:hover{
        background:rgba(66, 139, 202, 0.3);
    }
    .auth form .btn-success:hover{
        background:rgba(92, 184, 92, 0.3);
    }
    .auth form .btn-info :hover{
        background:rgba(91, 192, 222, 0.3);
    }
    .auth form .btn-warning:hover{
        background:rgba(240, 173, 78, 0.3);
    }
    .auth form .btn-danger:hover{
        background:rgba(217, 83, 79, 0.3);
    }
    .auth form .btn-link{
        border:none;
        color:#333;
        padding-left:0;
    }
    .auth form .btn-link:hover{
        background:none;
    }

    legend {
        border: medium none;
        text-align: center;
    }
    .mid {
        background: #333 none repeat scroll 0 0;
        color: #fff;
        font-size: 17px;
        padding: 8px;
    }
    .auth label.label-floatlabel {
        font-weight: 300;
        font-size: 11px;
        color:#333;
        left:0!important;
        top: 1px!important;
    }

    .head_box {
        float: left;
        width: 100%;
    }
    .top_box {
        border: 1px dashed  #ddd;
        float: left;
        margin-bottom: 15px;
        padding: 20px;
    }
    .title_box {
        color: #333;
        font-size: 20px;
        font-weight: bold;
        padding: 0 0 10px;
        text-align: center;
        width: 100%;
    }
    .dotted {
        float: left;

    }
    .middile_box {
        float: left;
    }
    .left_labe.control-label {
        background-image: url("../images/Capture.PNG");
        background-position: right 7px;
        background-repeat: no-repeat;
        float: left;
        font-size: 16px;
        width: 25%;
        background-size: 6px  ;
        text-align: left !important;
    }
    .form-group {
        float: left;
        width: 100%;
    }
    .form-name {
        float: left;
        font-size: 16px !important;
    }
    .dotted .form-control.input-md {
        height: 20px;
        margin: 0 !important;
        padding-bottom: 0 !important;
        padding-left: 5px;
        padding-right: 0 !important;
        padding-top: 0 !important;
    }
    .text-image {
        border: 1px dashed  #ddd;
        color: #333;
        float: right;
        font-size: 15px;
        height: 210px;
        margin-top: -24px;
        padding: 90px 9px;
        text-align: center;
        width: 80%;
    }
    .text-image a {
        text-decoration: none;
    }
    .student {
        color: #333;
        float: right;
        font-size: 16px;
        font-weight: bold;
        margin-right: 40px;
    }
    .col-md-9 > p {
        font-size: 15px !important;
        margin: 0;
        padding: 2px 0;
    }
    .bottm_box {
        float: left;
        margin-top: 15px;
        width: 100%;
    }
    .middile_box > p {
        color: #333;
        float: left;
        font-size: 16px !important;
    }
    p{
        color:#333;
    }
    .bottom_box {
        float: left;
        width: 100%;
    }
    .left_labe.control-label {
        float: left;
        font-size: 16px;
        width: 25%;
    }
    .right_input {
        float: right;
        width: 74.7%;
    }
    .right_input .form-control.input-md {
        height: 20px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .mid-lable {
        float: left;
        width: 45%;
    }
    .lablemid.control-label {
        float: left;
        font-size: 16px;
        text-align: center;
        width: 10%;
    }
    .mid-lable2 {
        float: left;
        width: 46.5%;
    }
    .lablemid2.control-label {
        float: left;
        font-size: 17px;
        text-align: center;
        width: 7%;
    }
    .mid-lable3 {
        float: left;
        width: 48%;
    }
    .lablemid3.control-label {
        float: left;
        font-size: 18px;
        text-align: center;
        width: 4%;
    }
    .left_labe1.control-label {
        float: left;
        font-size: 16px;
        width: 31%;
    }
    .right_input1 {
        float: right;
        width: 69%;
    }
    .right_input1 .form-control.input-md {
        height: 18px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .left_labe2.control-label {
        float: left;
        font-size: 17px;
        width: 28%;
    }
    .checkbox {
        float: left;
        margin: 0;
        padding: 0;
        width: 9%;
    }
    .checkbox1 {
        float: left;
        margin: 0;
        padding: 0;
        width: 7%;
    }

    .right_checkdot .form-control.input-md {
        height: 18px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .checkbox1 > label {
        font-size: 16px !important;
    }
    .right_checkdot {
        float: right;
        height: unset;
        width: 51%;
    }
    .bottm_box > p {
        color: #333;
        float: left;
        font-size: 16px !important;
    }
    .bottm_box > p {
        color: #333;
        float: left;
        font-size: 16px !important;
    }
    .permission {
        margin-top: 15px;
        text-align: center;
        width: 100%;
    }

    .left_signature {
        float: left;
        margin-left: 15px;
        margin-top: -10px;
        width: 16%;
    }
    .left_signature .form-control.input-md {
        height: 10px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .left_signature > p {
        font-size: 16px !important;
        margin-top: 6px;
        color:#333;
    }
    .right_signature {
        float: right;
        margin-right: 20px;
        margin-top: -10px;
        width: 16%;
    }
    .checkbox + .checkbox, .radio + .radio {
        margin-top: 0 !important;
    }
    .checkbox {
        width: 7%;
    }
    .right_signature .form-control.input-md {
        height: 10px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .right_signature > p {
        font-size: 16px !important;
        margin-top: 6px;
        color:#333;
    }
    .head {
        font-size: 16px !important;
        margin-bottom: 0;
        margin-top: 5px;
        text-align: center;
        width: 100%;
    }
    textarea, input[type="text"], input[type="password"], input[type="file"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
        background-color: #fff;
        border: 1px dashed  #ccc;
        box-shadow: none !important;
        transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
    }
</style>