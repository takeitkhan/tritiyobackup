
<div class="row">
    <div class="col-lg-6">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url('images/slides/akm_samsul.jpg'); ?>" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url('images/slides/akm_samsul_1.jpg'); ?>" alt="">
                </div>
                <div class="item active">
                    <img class="img-responsive" src="<?php echo base_url('images/slides/akm_samsul_2.jpg'); ?>" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url('images/slides/akm_samsul_3.jpg'); ?>" alt="">
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="jumbotron">
            <p class="lead">
                প্রতিষ্ঠানের তথ্যাদি দেখার জন্য নিমোক্ত তালিকা থেকে যেকোন প্রতিষ্ঠান নির্বাচন করুন।
            </p>
            <form class="form-inline" action="<?php echo base_url('frontend/index'); ?>" method="post">
                <div class="form-group">
                    <select name="institute" class="form-control">
                        <option value="">প্রতিষ্ঠান নির্বাচন করুন</option>
                        <option value="pakutiacollege" <?php if($institute == 'pakutiacollege') { echo 'selected="selected"'; } ?>>পাকুটিয়া পাবলিক স্কুল এন্ড কলেজ </option>
                        <option value="akanderbaidhighs" <?php if($institute == 'akanderbaidhighs') { echo 'selected="selected"'; } ?>>আকন্দের বাইদ উচ্চ বিদ্যালয় </option>
                        <option value="fulmalirchalafdm" <?php if($institute == 'fulmalirchalafdm') { echo 'selected="selected"'; } ?>>ফুলমালীর চালা ফজরগঞ্জ দাখিল মাদ্রাসা </option>
                        <option value="dighicollege" <?php if($institute == 'dighicollege') { echo 'selected="selected"'; } ?>>সাগরদিঘী কলেজ </option>
                        <option value="sdighimadrasah" <?php if($institute == 'sdighimadrasah') { echo 'selected="selected"'; } ?>>সাগরদিঘী দাখিল মাদ্রাসা </option>
                        <option value="dighigirlshschool" <?php if($institute == 'dighigirlshschool') { echo 'selected="selected"'; } ?>>সাগরদিঘী বালিকা উচ্চ বিদ্যালয় </option>
                        <option value="dighihighsc" <?php if($institute == 'dighihighsc') { echo 'selected="selected"'; } ?>>সাগরদিঘী উচ্চ বিদ্যালয় </option>
                        <option value="shanbandhahighsc" <?php if($institute == 'shanbandhahighsc') { echo 'selected="selected"'; } ?>>সানবান্ধা উচ্চ বিদ্যালয় </option>
                        <option value="akanderbaidmadrasah" <?php if($institute == 'akanderbaidmadrasah') { echo 'selected="selected"'; } ?>>আকন্দের বাইদ ছাবেদীয়া দাখিল মাদ্রাসা </option>
                        <option value="daroghalinagarsp" <?php if($institute == 'daroghalinagarsp') { echo 'selected="selected"'; } ?>>দারগালী নগর সুন্দইল পাড়া উচ্চ বিদ্যালয় </option>
                        <option value="karigoriandbmmoh" <?php if($institute == 'karigoriandbmmoh') { echo 'selected="selected"'; } ?>>কারিগরি ও বি.এম মহাবিদ্যালয় </option>
                        <option value="shaliabahapublic" <?php if($institute == 'shaliabahapublic') { echo 'selected="selected"'; } ?>>শালিয়াবহ চৌরাস্তা পাবলিক উচ্চ বিদ্যালয় </option>
                        <option value="geohsedu" <?php if($institute == 'geohsedu') { echo 'selected="selected"'; } ?>>গৌরাঙ্গী একাশী ওছমানীয়া উচ্চ বিদ্যালয় </option>
                        <option value="bhabandutta" <?php if($institute == 'bhabandutta') { echo 'selected="selected"'; } ?>>ভবনদত্ত গণ উচ্চ বিদ্যালয় </option>
                        <option value="sadhuti" <?php if($institute == 'sadhuti') { echo 'selected="selected"'; } ?>>সাধুটি নজিব উদ্দিন উচ্চ বিদ্যালয় </option>
                        <option value="sunutiaschool" <?php if($institute == 'sunutiaschool') { echo 'selected="selected"'; } ?>>সুনুটিয়া উচ্চ বিদ্যালয়লয় </option>
                        <option value="dholaparacollege" <?php if($institute == 'dholaparacollege') { echo 'selected="selected"'; } ?>>ধলাপাড়া কলেজ </option>
                        <option value="kuriparaganahs" <?php if($institute == 'kuriparaganahs') { echo 'selected="selected"'; } ?>>কুড়িপাড়া গণ উচ্চ বিদ্যালয় </option>
                        <option value="dhalaparasup" <?php if($institute == 'dhalaparasup') { echo 'selected="selected"'; } ?>>ধলাপাড়া এস.ইউ.পি উচ্চ বিদ্যালয় </option>
                        <option value="dsbhighschool" <?php if($institute == 'dsbhighschool') { echo 'selected="selected"'; } ?>>ডাঃ শওকত আলী ভূইয়া উচ্চ বিদ্যালয় </option>
                        <option value="mgidealhighschoo" <?php if($institute == 'mgidealhighschoo') { echo 'selected="selected"'; } ?>>মুরাইদ গারোবাজার আদর্শ উচ্চ বিদ্যালয় </option>
                        <option value="momrejgphs" <?php if($institute == 'momrejgphs') { echo 'selected="selected"'; } ?>>মমরেজ গলগন্ডা পাবলিক উচ্চ বিদ্যালয় </option>
                        <option value="mominpurdsp" <?php if($institute == 'mominpurdsp') { echo 'selected="selected"'; } ?>>মোমিনপুর ডি.এস.পি উচ্চ বিদ্যালয় </option>
                        <option value="sftnessa" <?php if($institute == 'sftnessa') { echo 'selected="selected"'; } ?>>শেখ ফজিলাতুননেছা উচ্চ বিদ্যালয় </option>
                        <option value="bashabaidhschool" <?php if($institute == 'bashabaidhschool') { echo 'selected="selected"'; } ?>>বাসাবাইদ উচ্চ বিদ্যালয় </option>
                        <option value="dhalaparagirls" <?php if($institute == 'dhalaparagirls') { echo 'selected="selected"'; } ?>>ধলাপাড়া চন্দন গণ বালিকা উচ্চ বিদ্যালয় </option>
                        <option value="segirlspilot" <?php if($institute == 'segirlspilot') { echo 'selected="selected"'; } ?>>ঘাটাইল এস.ই পাইলট বালিকা উচ্চ বিদ্যালয় </option>
                        <option value="chantaragan" <?php if($institute == 'chantaragan') { echo 'selected="selected"'; } ?>>চানতারা গণ উচ্চ বিদ্যালয় </option>
                        <option value="pakutiagirls" <?php if($institute == 'pakutiagirls') { echo 'selected="selected"'; } ?>>পাকুটিয়া পাবলিক মডেল হাই স্কুল </option>
                        <option value="satsanga" <?php if($institute == 'satsanga') { echo 'selected="selected"'; } ?>>সৎসঙ্গ তপোবন উচ্চ বিদ্যালয় </option>
                        <option value="chaithattaghs" <?php if($institute == 'chaithattaghs') { echo 'selected="selected"'; } ?>>চৈথট্ট গণ উচ্চ বিদ্যালয় </option>
                    </select>
                </div>
                
                <input name="get_info" type="submit" value="খুঁজুন " class="btn btn-primary" />
            </form>
            <p>
                <small class="small">এই পোর্টালটি ঘাটাইল উপজেলার অন্তর্গত বিভিন্ন প্রতিষ্ঠানের দৈনন্দিন বিভিন্ন তথ্য তড়িৎ গতিতে দেখার নিমিত্তে তৈরি করা হয়েছে। বিশেষ করে উপজেলা মাধ্যমিক শিক্ষা অফিস থেকে এই পোর্টালটি পর্যবেক্ষণ করা হয়ে থাকে। </small>
            </p>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<br/>

<?php
    $count = (!empty($rows) ? $rows[0] : NULL);
    $setting = (!empty($settings) ? $settings[0] : NULL);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3><?php echo $setting->InstituteName; ?></h3>
    </div>
    <div class="panel-body">
        <div class="col-lg-7">
            <strong>সংক্ষিপ্ত বিবরণঃ </strong> <br/>
            <p><?php echo $setting->ShortInformation; ?></p><br/>
            <p><a href="#" class="list-group-item"><strong>প্রতিষ্ঠানের নম্বরঃ </strong> <?php echo $setting->InstitutePhone; ?></a></p>
        </div>
        <div class="col-lg-5">
            <div class="list-group">
                <div class="list-group-item"><strong>প্রতিষ্ঠান প্রধানঃ </strong> <?php echo $setting->AdminName; ?></div>
                <div class="list-group-item"><strong>স্থাপিতঃ </strong> <?php echo $setting->InstituteEstablished; ?></div>
                <div class="list-group-item"><strong>ইআইআইএনঃ </strong> <?php echo $setting->InstituteEIIN; ?></div>
                <div class="list-group-item"><strong>প্রতিষ্ঠান প্রধানের নম্বরঃ </strong> <?php echo $setting->AdminPhone; ?></div>
                <div class="list-group-item"><strong>প্রতিষ্ঠানের ইমেইলঃ </strong> <?php echo $setting->InstituteEmail; ?></div>
                <div class="list-group-item"><strong>প্রতিষ্ঠানের ঠিকানাঃ </strong> <?php echo $setting->InstituteAddress; ?></div>
                <div class="list-group-item"><strong>ওয়েবসাইটঃ </strong> <a href="<?php echo $setting->InstituteWebsite; ?>" ><?php echo $setting->InstituteWebsite; ?></a></div>
            </div> 
        </div>
    </div>
</div>

<div class="row marketing">
    <div class="col-lg-6">
    
      <h4 class="text-success">শিক্ষক</h4>
      <p><?php echo $count->teachers; ?></p>
    
      <h4 class="text-success">ছাত্র/ছাত্রী</h4>
      <p><?php echo $count->students; ?></p>
    
      <h4 class="text-success">স্টাফ</h4>
      <p><?php echo $count->staffs; ?></p>
    </div>

    <div class="col-lg-6">
        
      <h4 class="text-success">ছাত্র</h4>
      <p><?php echo $count->boys; ?></p>
    
      <h4 class="text-success">ছাত্রী </h4>
      <p><?php echo $count->girls; ?></p>
    
      <h4 class="text-success">অভিভাবক </h4>
      <p><?php echo $count->guardians; ?></p>
      
    </div>
    
    <div class="col-lg-6">
        
      <h4 class="text-success">কম্পিউটার অপারেটর </h4>
      <p><?php echo $count->operators; ?></p>
    
      <h4 class="text-success">প্রাক্তন ছাত্র/ছাত্রী </h4>
      <p><?php echo $count->alumnis; ?></p>
    
      <h4 class="text-success">মোট স্লাইড </h4>
      <p><?php echo $count->slideshows; ?></p>
      
    </div>
    <div class="col-lg-6">
        
      <h4 class="text-success">মোট ফটো </h4>
      <p><?php echo $count->photos; ?></p>
    
      <h4 class="text-success">মোট ওয়েবপেইজ </h4>
      <p><?php echo $count->webpages; ?></p>
    
      <h4 class="text-success">আজকের উপস্থিতি</h4>
      <p><?php echo $count->presents; ?></p>
      
    </div>
</div>
