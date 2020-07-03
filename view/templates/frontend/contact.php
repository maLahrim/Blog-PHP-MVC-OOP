<section id="contact" class=" row m-auto contact-section">
    <!--Section: Contact v.2-->
    <div class="col-md-6 mx-auto  py-4 pb-5">
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact</h2>
        <!--Section description-->
        <p class="text-center mx-auto mb-2 mb-md-5">Une question?</p>
        <div class="row">
            <!--Grid column-->
            <div class="col-md-12 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Nom</label>
                            </div>
                        </div>
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">E-mail</label>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Sujet</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea id="message" name="message" rows="2"
                                    class="form-control md-textarea"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                </form>
                <div class="text-center">
                    <a class="btn contact-btn-color"
                        onclick="document.getElementById('contact-form').submit();">Envoyer
                    </a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->
        </div>
    </div>
</section>
<!--Section: Contact v.2-->