
        <div class="section mt-2">
            <h1>
                {{ $mission_data->promotion_name }}
            </h1>
            <div class="blog-header-info mt-2 mb-2">
                <div>
                   รับไปแล้ว {{ $count_mission }} คน
                </div>
                <div>
                     {{ $mission_data->date_time }}
                </div>
            </div>
           
        </div>

        <div class="section mt-2">
           
            <figure>
                 <img src="/uploads/images/promotions/{{ $mission_data->image }}" alt="image" class="imaged img-fluid">
            </figure>
            <p>
                <?php echo \PostHelpers::formatContent($mission_data->promotion_detail); ?>
            </p>
            <h3>เพียงเท่านี้ก็รับเครดิตฟรีไปเล่นสบายๆ ไม่จำกัดจำนวน ติดต่อเพิ่มเติม  LINE ID <a href="https://buff.ly/3mPOMwg">@Moradok88</a></h3>
           
            
        </div>
        <div class="section mt-2">
            <div class="section-title">อัพโหลดหลักฐาน</div>
            <div class="card">
                <div class="card-body">

                    <form>
                        <div class="custom-file-upload" id="fileUpload1">
                            <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                            <label for="fileuploadInput">
                                <span>
                                    <strong>
                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                        <i>เลือกรูป</i>
                                    </strong>
                                </span>
                            </label>
                        </div>
                    <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text4">ลิ้งค์ที่แชร์</label>
                                <input type="text" class="form-control" id="text4" placeholder="Text Input">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="section">
            <a href="#" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon> แชร์ให้เพื่อน
            </a>
        </div>


      <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แชร์ไปยัง</h5>
                </div>
                <div class="modal-body">
                    <ul class="action-button-list">
                        <li>
                            <a href="#" class="btn btn-list" data-bs-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-facebook"></ion-icon>
                                    Facebook
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-bs-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    Twitter
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-bs-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    Instagram
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-bs-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                    LINE
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    </div>

       
        </div>
        </div>
        </div>