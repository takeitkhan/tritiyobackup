<div class="instructionPage">
    <div class="bfullpage">
        <div style="text-align: center; color: green; font-size: 24px; margin: 100px 0;">
            নিচে দেয়া নম্বরটি সংরক্ষণ করুন। পরবর্তী যে কোন স্টেটাস এর জন্য এই নম্বরটির প্রয়োজন হবে। ধন্যবাদ।
            <br/><br/><br/>
            <h1 style="text-align: center; color: red; font-size: 60px;"><?php __e($_GET['getrandomid']); ?></h1>
        </div>
    </div>
    <div class="bfullpage">
        <div class="form_registration" style="background: #F5F5F5;padding: 20px;margin-top: 50px;">
                       <form action="">
                           <table style="font-family: solaimanlipi;font-size: 18px;">
                              <tr>
                                  <td class="text-center" style= "background: #444 none repeat scroll 0 0; color: #fff; display: table;font-size: 24px; height: 44px;line-height: 42px; margin: 0 auto;width: 111px;">ভর্তি ফর্ম </td>
                              </tr>
                               <tr>
                                   <td><span class="left_img" style="  border: 1px solid #ccc;box-sizing: border-box; float: left; margin-right: 16px;overflow: hidden;padding: 25px 10px;width: 83%; margin-top: 33px;"> 
                                   ফরমের ক্রমিক নংঃ <input type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                   তারিখঃ <input type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                   শ্রনীঃ <input type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                   শাখাঃ <input type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                   রোলঃ <input type="text" style="margin: 6px 21px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                   </span>
                                   <span class="right_img" style="border: 1px solid #ccc;float: right;height: 200px;overflow: hidden;padding: 87px 10px 10px;vertical-align: middle;width: 15%; text-align:center">
                                       এক কপি পাসপোর্ট সাইজের রঙ্গিন ছবি
                                   </span>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="padding: 8px 0">বরাবর <br>অধ্যক্ষ <br>পাকুটিয়া পাবলিক স্কুল এন্ড কলেজ <br>ডি. পাকুটিয়া, ঘাটাইল, টাংগাইল।</td>
                               </tr>
                               <tr>
                                   <td>জনাব</td>
                               </tr>
                               <tr>
                                   <td>
                                   <span class="part_two">
                                       সবিনয় নিবেদন এই যে আমি, আপনার শিক্ষা প্রতিষ্টানে
                                       শিক্ষাবর্ষে <input type="text" style="margin: 0 16px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                       শ্রেনীতে <input type="text" style="margin: 0 16px;width: 189px; background:none;border:0;border-bottom:1px solid #ccc;">
                                       বিভাগে ভর্তির নিমিত্তে আমার প্রয়োজনীয় তথ্যাবলী আপনার অনুগ্রহ বিবেচনার জন্য নিম্নে উল্লেখ করা হল ।
                                   </span>
                                   </td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">ছাত্র/ছাত্রীর নাম (বাংলায়)</span>  <input type="text" value="<?php echo $this->session->userdata('full_name_bn') ?>"style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">ইংরেজিতে (বড় হাতের অক্ষরে )</span>  <input type="text" value="<?php echo $this->session->userdata('full_name_en') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পিতার নাম (বাংলায়)</span>  <input type="text" value="<?php echo $this->session->userdata('father_name_bn') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">ইংরেজিতে (বড় হাতের অক্ষরে )</span>  <input type="text" value="<?php echo $this->session->userdata('father_name_en') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">মাতার নাম (বাংলায়)</span> <input type="text" value="<?php echo $this->session->userdata('mother_name_bn') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">ইংরেজিতে (বড় হাতের অক্ষরে )</span>  <input type="text" value="<?php echo $this->session->userdata('mother_name_en') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">জন্ম তারিখ (জন্ম নিবন্ধন অনুযায়ী)</span>  <input type="text" value="<?php echo $this->session->userdata('dateofbirth') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">মোবাইল নং (পিতা ও মাতা)</span> <input type="text" value="<?php echo $this->session->userdata('phone') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পুর্ন ঠিকানা (বর্তমান)</span> <input type="text" value="<?php echo $this->session->userdata('present_address') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পুর্ন ঠিকানা (স্থায়ী)</span> <input type="text" value="<?php echo $this->session->userdata('permanent_address') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পরবর্তী প্রতিষ্ঠানের নাম</span> <input type="text" value="<?php echo $this->session->userdata('name_institute') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_3">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">ঠিকানা</span> <input type="text" value="<?php echo $this->session->userdata('institute_address') ?>" style="width: 75%;float: right; background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_4">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পিতা/অবিভাবকের পেশা </span><input type="text" value="<?php echo $this->session->userdata('guardian_profession') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"> বার্ষিক আয়ঃ <input type="text" value="<?php echo $this->session->userdata('annual_income') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_4">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">পিতার অবর্তমানে অবিভাবকের নাম </span><input type="text" value="<?php echo $this->session->userdata('absence_father_guardian') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"> সম্পর্কঃ <input type="text" value="<?php echo $this->session->userdata('relation') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_4">
                                   <td style="padding: 8px 0;"><span style="display: inline-block;width: 25%;">জাতিয়তা </span><input type="text" value="<?php echo $this->session->userdata('nationality') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"> ধর্মঃ <input type="text" value="<?php echo $this->session->userdata('Religion') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;"></td>
                               </tr>
                               <tr class="part_5">
                                   <td style="padding: 8px 0"><span style="display: inline-block;width: 25%;">অধ্যায়নকালীন সমায়ে ছাত্র/ছাত্রীর অবস্থান</span>
                                       <input type="radio" name="" style=" background:none;border:0;border-bottom:1px solid #ccc;"> ছাত্রাবাস 
                                       <input type="radio" name="" style=" background:none;border:0;border-bottom:1px solid #ccc;"> নিজবাড়ী 
                                       <input type="radio" name="" style=" background:none;border:0;border-bottom:1px solid #ccc;"> অন্যান্যঃ      
                                       <input type="text" value="<?php echo $this->session->userdata('study_loc') ?>" style=" background:none;border:0;border-bottom:1px solid #ccc;">
                                   </td>
                               </tr> 
                               <tr class="part_6">
                                   <td style="padding: 16px 0;" class="text-center">টাংগাইল জেলার ঘাটাইল থানায় পাকুটিয়া গ্রামে মনোরম পরিবেশে ১৯৫২ ইং সনের ২রা জানুয়ারী এলাকার গণ্যমান্য ব্যক্তিবর্গের ঐকান্তিক প্রচেষ্ঠায় গড়ে উঠেছিল পাকুটিয়া পাবলিক হাই স্কুল। সেই থেকে পথ চলা। </td>
                               </tr>
                               <tr class="part-7">
                                   <td style="border-top: 2px solid #888;" class="pull-left text-center">( অবিভাবকের পূর্ণ স্বাক্ষর ) <br>তারিখঃ</td>
                                   <td style="border-top: 2px solid #888;" class="pull-right text-center">( ছাত্র/ছাত্রীর পূর্ণ স্বাক্ষর )<br>তারিখঃ</td>
                               </tr>
                               <tr class="part-8">
                                   <td class="text-center">অধ্যক্ষ <br>পাকুটিয়া পাবলিক স্কুল এন্ড কলেজ <br>ঘাটাইল, টাংগাইল</td>
                               </tr>
                           </table>
                       </form>
                   </div>
       
    </div>
</div>
<?php 
/*echo $this->session->userdata('full_name_bn');
echo $this->session->userdata('full_name_en');
echo $this->session->userdata('father_name_bn');

echo $this->session->userdata('father_name_en');
echo $this->session->userdata('mother_name_bn');
echo $this->session->userdata('mother_name_en');
echo $this->session->userdata('phone');
echo $this->session->userdata('dateofbirth');*/
?>
<style type="text/css">


    .margin-top-20{
        margin-top: 20px;
    }
    body{
        background:#ddd;
        background-size:100% 100%;
        background-attachment: fixed; 
        background-repeat:no-repeat;
        font-family: 'Open Sans', sans-serif;
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
        border-bottom:1px solid #333!important;
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
        border: 1px solid #ddd;
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
        border: 1px solid #ddd;
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
  border: 1px solid #ccc;
  box-shadow: none !important;
  transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
}
</style>