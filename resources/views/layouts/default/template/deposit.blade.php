           <!-- Card Overlay Carousel -->
            <div class="cardOverlayCarousel owl-carousel mt-2 mb-4">
                <!-- item -->
                <div class="item">
                    <a href="blog-post.html" class="card card-overlay text-white">
                        <img src="assets/img/sample/photo8.jpg" class="card-img img-fluid" alt="image">
                        <div class="card-img-overlay">
                            <div class="header row">
                                <div class="col-8">TRAVEL</div>
                                <div class="col-4 text-right">
                                    <i class="icon ion-ios-heart"></i> 523
                                </div>
                            </div>
                            <div class="content">
                                <h1>Top 10 Travel Bloggers You Should Already Be Following</h1>
                                <footer>
                                    <div class="author">
                                        <img src="assets/img/sample/avatar3.jpg" alt="avatar">
                                        Marti Valencia
                                    </div>
                                    <div class="date">
                                        5 hours ago
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- * item -->
                <!-- item -->
                <div class="item">
                    <a href="blog-post.html" class="card card-overlay text-white">
                        <img src="assets/img/sample/photo5.jpg" class="card-img img-fluid" alt="image">
                        <div class="card-img-overlay">
                            <div class="header row">
                                <div class="col-8">EVENTS</div>
                                <div class="col-4 text-right">
                                    <i class="icon ion-ios-heart"></i> 12K
                                </div>
                            </div>
                            <div class="content">
                                <h1>The World's Largest Pillow Fight is Also a Festival</h1>
                                <footer>
                                    <div class="author">
                                        <img src="assets/img/sample/avatar.jpg" alt="avatar">
                                        Sofie Fulloway
                                    </div>
                                    <div class="date">
                                        2 hours ago
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- * item -->
                <!-- item -->
                <div class="item">
                    <a href="blog-post.html" class="card card-overlay text-white">
                        <img src="assets/img/sample/photo11.jpg" class="card-img img-fluid" alt="image">
                        <div class="card-img-overlay">
                            <div class="header row">
                                <div class="col-8">SPORTS</div>
                                <div class="col-4 text-right">
                                    <i class="icon ion-ios-heart"></i> 12K
                                </div>
                            </div>
                            <div class="content">
                                <h1>Juxon Julio praises Peri’s resilience after testing week</h1>
                                <footer>
                                    <div class="author">
                                        <img src="assets/img/sample/avatar5.jpg" alt="avatar">
                                        Jackie Pearson
                                    </div>
                                    <div class="date">
                                        2 hours ago
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- * item -->
                <!-- item -->
                <div class="item">
                    <a href="blog-post.html" class="card card-overlay text-white">
                        <img src="assets/img/sample/photo10.jpg" class="card-img img-fluid" alt="image">
                        <div class="card-img-overlay">
                            <div class="header row">
                                <div class="col-8">WORLD</div>
                                <div class="col-4 text-right">
                                    <i class="icon ion-ios-heart"></i> 12K
                                </div>
                            </div>
                            <div class="content">
                                <h1>Best of Skyscrapers in the World</h1>
                                <footer>
                                    <div class="author">
                                        <img src="assets/img/sample/avatar6.jpg" alt="avatar">
                                        Vincent Hunt
                                    </div>
                                    <div class="date">
                                        2 hours ago
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- * item -->
            </div>
            <!-- * Card Overlay Carousel -->


             
       <div class="section">

            
             

            <div class="splash-page mt-5 mb-5">

                        
                <div class="transfer-verification">
                    <div class="transfer-amount">
                        <P class="text-white" style="line-height: 24px;">
                                   ต้องโอนเงินโดยใช้บัญชี  <P class="text-success" style="line-height: 24px;">
                                  {{ $user->account_number }}
                        </p> 
                       
                    </div>
                    <div class="from-to-block mb-5">
                            <div class="item text-start">
                                  <img src="/uploads/images/banks/{{ $bankuser->bank_logo }}" alt="avatar" class="imaged w48">
                     
                            </div>
                        <div class="item text-end">
                                    <img src="{{ asset('img/sample/avatar/avatar3.jpg') }}" alt="avatar" class="imaged w48">
                     

                            
                        </div>
                        <div class="arrow text-light"></div>
                    </div>
                </div>

                    <strong>สุทธิพงศ์ สารชาติ</strong><br>
                            <strong>2982409704</strong>

                <div class="price text-success mb-2 mt-2"> <button id="copy-button" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกหมายเลขบัญชีแล้ว" class="btn btn-outline-white"><i class="ion ion-ios-copy"></i> คัดลอกหมายเลขบัญชี</button></div>
                            <br>เครดิตจะเข้าอัตโนมัติ ภายใน 10 วิ
                </p>
            </div>
             <div class="row">
                <div class="col-6">
                    <a href="app-pages.html" class="btn btn-lg btn-outline-white btn-block">ยกเลิก</a>
                </div>
                <div class="col-6">
                    <a href="app-pages.html" class="btn btn-lg btn-primary btn-block">ตกลง</a>
                </div>
            </div>
            </div>

    </div>
    <!-- * App Capsule -->
<script type="text/javascript">$(function () {
        $("#switch-id").change(function () {
            if ($(this).is(":checked")) {
                $(".contentB").show();
                $(".contentA").hide();
            } else {
                $(".contentB").hide();
                $(".contentA").show();
            }
        });
    });</script>

