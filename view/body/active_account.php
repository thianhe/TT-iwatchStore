<script> document.title = 'Active account'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="jumbotron" id="activeacc_jumbotron">
                <div id="no_product" class=" text-center">
                    <?php
                        //check for any errors
                        if ($msg->hasMessages()) {
                        $msg->display();
                        }
                        ?>
                    <h3 style=margin-bottom:7%;>Please check you email to active your account</h3>
                    <div class="row">
                        <form role="form" class="active_center" method="post" action="<?=Config::BASE_URL?>do_send_active"
                            autocomplete="off">
                            <div class="form-group">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" name="email" id="email" class="form-control input-lg" required
                                    placeholder="Email Address" value="<?php echo $userData['email'];?>" tabindex="2">
                                <div class="g-recaptcha" data-sitekey="6LdlbIQUAAAAAAYd6pVHptc1AtYO4SKrURPeO_qF"></div>
                                <div class="btn-block"><input type="submit" name="submit" value="Send Again"
                                        class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
                            </div>
                        </form>
                    </div>
                    <div class="row" style=margin-top:7%;>
                        <form role="form" class="active_center" method="post" action="<?=Config::BASE_URL?>do_active"
                            autocomplete="off">
                            <div class="form-group">
                                <label for="active"><h4>Activation Code</h4></label>
                                <input type="text" name="active" id="active" class="form-control input-lg" required
                                    placeholder="Activasion Code" value="" tabindex="2">
                                <div class="g-recaptcha" data-sitekey="6LdlbIQUAAAAAAYd6pVHptc1AtYO4SKrURPeO_qF"></div>
                                <div class="btn-block"><input type="submit" name="submit" value="Active"
                                        class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>