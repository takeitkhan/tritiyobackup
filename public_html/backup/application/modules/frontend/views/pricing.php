<?php
//owndebugger($_POST);

?>

        <!-- =========================
           PRICING
        ============================== -->
        <section id="pricing5-1" class="p-y-lg bg-edit bg-light">
            <div class="container">
                
                    <?php if($this->session->flashdata('message')) {  echo  '<div class="row">'.$this->session->flashdata('message').'</div>';} ?>
                
                <!-- Section Header -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                            <h2>Generate the development cost</h2>
                            <p class="lead">Choose item below and get a immediate quote and inform us</p>
                        </div>
                    </div>
                </div>

                


                <?php
                    //owndebugger($pricings);
                    //owndebugger($default_pricing);
                ?>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 c2">
                        <!-- Dynamic Options -->
                        <div class="col-md-6">
                            <div class="options-table">
                                <?php foreach ($pricings as $pricing): ?>
                                <div class="switch">
                                    <p class="package-title"><?php echo $pricing->name ?><span class="pull-right"><i>&#2547;</i><?php echo $pricing->price ?><span></p>
                                    <input id="package<?php echo $pricing->id ?>" class="package-toggle toggle-round-flat" type="checkbox" data-title="<?php echo $pricing->name ?>" data-price="<?php echo $pricing->price ?>">
                                    <label for="package<?php echo $pricing->id ?>"></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div><!--/End Col Options -->

                        <!-- Dynamic Price -->
                        <div class="col-md-6">
                            <div class="pricing-table">
                                <form class="form-inline" action="<?= base_url()?>send_requirment" method="post" id="sendRequirmentForm">
                                    <ul class="list-unstyled">
                                        <li class="price text-edit">
                                            <i>&#2547;</i><span><?php echo $default_pricing->price ?></span>
                                            <div class="hidden_fields"></div>
                                        </li>
                                        <li class="text-edit">
                                            <?php echo $default_pricing->name ?>
                                            <input type="hidden" name="starting_element" value="<?php echo $default_pricing->name ?>_<?php echo $default_pricing->price ?>">
                                        </li>
                                        <?php foreach ($pricings as $pricing): ?>
                                        <li class="package<?php echo $pricing->id ?> text-edit">
                                            <span class="code-text"> <?php echo $pricing->name ?></span> <span class="code-price"><i>&#2547;</i> <?php echo $pricing->price ?></span>
                                        </li>
                                        <?php endforeach; ?>
                                        <li><label>Name </label><input type="text" required class="form-control" name="client_name"></li>
                                        <li><label>Mobile </label><input type="text" required class="form-control" name="client_phone"></li>
                                        <li><label>Email </label><input type="email" required class="form-control" name="client_email"></li>
                                        <li class="m-t p-b"><input type="submit" name="submit" class="btn btn-shadow btn-blue text-uppercase" value="GET STARTED NOW"></li>
                                    </ul>
                                </form>
                            </div>
                        </div><!-- /End Col Price -->
                    </div><!-- /End Col-10 -->
                </div><!-- /End Row -->
            </div><!-- /End Container -->
        </section>
