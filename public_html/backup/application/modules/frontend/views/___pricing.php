

        <!-- =========================
           PRICING
        ============================== -->
        <section id="pricing5-1" class="p-y-lg bg-edit bg-light">
            <div class="container">
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
                                <form>
                                    <?php foreach ($pricings as $pricing): ?>
                                    <div class="switch">
                                        <p class="package-title"><?php echo $pricing->name ?></p>
                                        <input id="package<?php echo $pricing->id ?>" class="package-toggle toggle-round-flat" type="checkbox" data-price="<?php echo $pricing->price ?>">
                                        <label for="package<?php echo $pricing->id ?>"></label>
                                    </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>
                        </div><!--/End Col Options -->

                        <!-- Dynamic Price -->
                        <div class="col-md-6">
                            <div class="pricing-table">
                                <ul class="list-unstyled">
                                    <li class="price text-edit"><i>&#2547;</i><span><?php echo $default_pricing->price ?></span></li>
                                    <li class="text-edit"><?php echo $default_pricing->name ?></li>
                                    <?php foreach ($pricings as $pricing): ?>
                                    <li class="package<?php echo $pricing->id ?> text-edit"><?php echo $pricing->name ?></li>
                                    <?php endforeach; ?>
                                    <li class="m-t p-b"><a href="" class="btn btn-shadow btn-blue text-uppercase">GET STARTED NOW</a></li>
                                </ul>
                            </div>
                        </div><!-- /End Col Price -->

                    </div><!-- /End Col-10 -->
                </div><!-- /End Row -->
            </div><!-- /End Container -->
      
        </section>
