<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="{{asset($setting['logo_footer']??"")}}" height="24" alt="">
                </a>
                <p class="mt-4">{{$setting['footer_description']??""}}</p>

            </div><!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Company</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="page-aboutus.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>Home</a></li>
                    <li><a href="page-services.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>About us</a></li>
                    <li><a href="page-team.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>Contact us</a></li>

                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Usefull Links</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="page-terms.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>Jobs</a></li>
                    <li><a href="page-privacy.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>Events</a></li>
                    <li><a href="documentation.html" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i>Blogs</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Newsletter</h5>
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer>



<footer class="footer justify-content-center footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-12 col-12">
                <div class="">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{$setting['copyright']??""}} <i class="mdi mdi-heart text-danger"></i> by <a href="#" target="_blank" class="text-reset">Shehran</a>.</p>
                </div>
            </div><!--end col-->


        </div><!--end row-->
    </div><!--end container-->
</footer>
