<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5" name="footer">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">Nursery</h1>
                        <p class="text-secondary mb-0">Beauty of Earth</p>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mx-auto">
                        <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                            placeholder="Your Email">
                        <button type="submit"
                            class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                            style="top: 0; right: 0;">Subscribe Now</button>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Why People Like us!</h4>
                    <p class="mb-4">We are the gateway between Buyer and Seller. </p>
                    <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Shop Info</h4>
                    <a class="btn-link" href="#footer">About Us</a>
                    <a class="btn-link" href="#contact">Contact Us</a>
                    <a class="btn-link" href="#privacy">Privacy Policy</a>
                    <a class="btn-link" href="#t&c">Terms & Condition</a>
                    <a class="btn-link" href="#refund">Return Policy</a>
                    <a class="btn-link" href="#faq">FAQs & Help</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" id="contact" name="contact">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Contact</h4>
                    <p>Address: Dhaka, Bangladesh</p>
                    <p>Email: mdmeadulislam@gmail.com</p>
                    <p>Phone: +8801862151631</p>
                    <p>Payment Accepted</p>
                    <img src="{{asset('frontend')}}/img/payment.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#">Copyright &copy; Dec-2023 to {{now()->format('M-Y')}}</a><strong> Nursery</strong>. All right reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                Designed By <a class="border-bottom" href="https://www.blooms-ai.com">Blooms-AI</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->