<div class="row career">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section id="contact3-1" class="p-y-lg contact bg-edit">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="section-header text-center wow fadeIn">
                            <h2 style="text-transform: uppercase;"><?= $project->name; ?></h2>
                            <p class="lead"><?= $project->description; ?></p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= $project->link; ?>" target="_blank">
                                    <img src="<?= base_url('uploads/portfolio/' . $project->img); ?>" alt="<?= $project->name; ?>" class="img-responsive">
                                    <amp-img itemprop="image" src="<?= base_url('uploads/portfolio/' . $project->img); ?>" alt="<?= $project->name; ?>" class="img-responsive"></amp-img>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <?= $project->details; ?>
                                <hr/>
                                <ul>
                                    <li><b>Client Name:</b> <?= $project->name; ?></li>
                                    <li><b>Project Manager:</b> Md. Khalakuzzaman Khan</li>
                                    <li><b>Team Lead:</b> MD.Delowar Gazi</li>
                                    <li><b>Task Category:</b> <?= getCategoriesCommaSep(trim($project->category, ' ,'))->name; ?></li>
                                    <li><b>Task Keywords:</b> <?= $project->seo_keywords; ?></li>
                                </ul>
                                <div class="need-help">
                                    <div class="sn-title help-title">
                                        <h3>Need Our Help</h3>
                                    </div>
                                    <div class="ct-help-left">
                                        <h4><strong>Office Address</strong></h4>
                                        <p>2/1-A, Block - G, Rabbani House, Lalmatia, Mohammadpur, Dhaka - 1207</p>
                                    </div>
                                    <div class="ct-help-right">
                                        <h4><strong>Contact Information</strong></h4>
                                        <p><b>Mobile:</b> (+880) 1821660066</p>
                                        <p><a href="#">info@tritiyo.com</a></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr style="border-bottom: 1px dashed white;"/>
                                    <h5>Quick Navigation</h5>
                                    <a class="btn btn-sm btn-red" href="<?= base_url('portfolio'); ?>">Back to Portfolio</a>
                                    <a class="btn btn-sm btn-blue" href="<?= base_url('page/pricing'); ?>">Quote calculator</a>
                                    <a class="btn btn-sm btn-green" href="<?= base_url('page/contact-us'); ?>">Contact us for your project</a>
                                    <h5>Quick Contact</h5>
                                    <!--Chat button will appear here-->
                                    <div id="MyLiveChatContainer"><a id="MyLiveChatScriptLink" onclick="MyLiveChat_OpenDialog()" title="" style="cursor:pointer;">Click here to chat</a></div>
                                </div>
                                <!--Add the following script at the bottom of the web page (before </body></html>)-->
                                <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatlink.aspx?hccid=84426435"></script>
                            </div>                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="container"><hr style="background: #ddd;"/></div>
                        <div class="row">
                            <div class="container">

                                <h2>Technology</h2>
                                <p class="lead">we have used the following technologies for <a href="<?= $project->link; ?>" target="_blank"><?= $project->name; ?></a></p>                                
                                <div class="row">
                                    <?php foreach ($techs as $tech) : ?>
                                        <div class="col-md-6">
                                            <div class="jumbotron">
                                                <h3><?= $tech->name; ?></h3>
                                                <p><?= $tech->description; ?></p>                                                
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </div>
</div>
<?php
//owndebugger($techs); ?>