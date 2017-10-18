<section class="pt-page pt-page-5" data-id="contact" style="display: none">
    <div class="section-title-block">
        <h2 class="section-title">Contact</h2>
        <h5 class="section-description">Keep In Touch</h5>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6 subpage-block">

        </div>

        <div class="col-sm-6 col-md-6 subpage-block">
            <div class="block-title">
                <h3>Contact Form</h3>
            </div>
            <form id="contact-form">

                <div class="success" style="display: none">Thank you for messaging me :) </div>
                <div class="errors" style="display: none">Oops ! oops something went wrong :( </div>
                <div class="controls">
                    <div class="form-group">
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Full Name" required="required" data-error="Name is required.">
                        <div class="form-control-border"></div>
                        <i class="form-control-icon fa fa-user"></i>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                        <div class="form-control-border"></div>
                        <i class="form-control-icon fa fa-envelope"></i>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="4" required="required" data-error="Please, leave me a message."></textarea>
                        <div class="form-control-border"></div>
                        <i class="form-control-icon fa fa-comment"></i>
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="g-recaptcha" data-sitekey="6LfB4zQUAAAAABLHEqkt5Zy8RzuRk1dxFXQRVy1g"></div>

                    <input type="submit" class="button btn-send" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</section>