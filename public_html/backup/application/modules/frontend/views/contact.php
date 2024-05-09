

        <!-- =========================
             CONTACT SECTION
        ============================== -->
        <section id="contact3-1" class="p-y-lg contact bg-edit">
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                            <h2>Ready to Get Started?</h2>
                            <p class="lead">Want to hire the best people around to design, develop, and turn your project into reality? Well look no further! Take your business to the next level.</p>    
                        </div>
                    </div>
                </div>

                <div class="row c2">
                    <div class="col-md-6">
                        <!-- Contact Form -->
                        <h4 class="f-w-900 m-b-md">Drop us a line</h4>
                        <form class="form-horizontal" data-toggle="validator" id="contactForm" action="<?= base_url()?>sendcontact" method="post">
                            <!-- Notifications -->
                            <p class="success cf text-center"><i class="fa fa-check"></i> <strong>Your message has successfully been sent.</strong></p>
                            <p class="failed cf text-center"><i class="fa fa-exclamation-circle"></i><strong> Something went wrong!</strong></p>

                            <div class="form-group">
                                <input type="text" class="form-control" id="cfName" placeholder="Name" required="" name="fullname">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="cfEmail" placeholder="Email" required="" name="emailaddress">
                            </div>
                            <div class="form-group">
                                <input type="text" pattern="\d*" minlength="11" maxlength="11" name="phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="cfSubject" placeholder="Subject" required="" name="subject">
                            </div>
                            <div class="form-group">
                                <textarea id="cfMessage" rows="5" class="form-control" placeholder="Your Message" required="" name="message"></textarea>
                            </div> 
                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-green wow pulse" data-wow-iteration="2" style="visibility: visible; animation-iteration-count: 2; animation-name: pulse;">GIVE US A SHOUT</button>
                            </div>
                        </form>
                    </div><!-- /End Col -->

                    <div class="col-md-6">
                        <!-- Map and Contact Info -->
                        <h4 class="f-w-900 m-b-md">Where we are</h4>
                        <div class="m-b-md">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.478809239603!2d90.36184035104147!3d23.76595828450608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c106c641d96f%3A0x9f0fc682d92f6e12!2sTritiyo+Limited!5e0!3m2!1sen!2sbd!4v1549081644781" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col-sm-6 p-l-0 mini-info">
                            <h5 class="f-w-900">Office Address</h5>
                            <p>2/1-A, Block - G, Rabbani House, Lalmatia, Mohammadpur, Dhaka - 1207</p>
                        </div>
                        <div class="col-sm-6 p-l-0 mini-info">
                            <h5 class="f-w-900">Contact Information</h5>
                            <strong>Mobile</strong>: (+880) 1821660066<br>
                            <a href="info@tritiyo.com "><strong>info@tritiyo.com</strong></a></p>
                        </div>
                    </div><!-- /End Col -->
                </div><!-- /End Row -->
            
            </div><!-- /End Container -->
        </section>   

