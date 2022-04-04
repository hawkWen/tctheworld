<div class="section">
           
    <div class="card">
        <div class="card-header">
             <form>
                        <div class="form-group boxed">
                            <div class="input-wrapper text-white"> <strong> ลิ้งค์สำหรับชวนเพื่อน</strong>
                             <ion-icon name="link-outline"></ion-icon>
                               <div> 

                          <input type="text bg-secondary" class="form-control mt-2" id="ref-copy" value="https://play.onlyfun88.com/user/register?ref={{ $user->id }}" readonly>

                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i></div>
                            </div>

                            <button type="button" id="copy-button-ref" class="btn btn-primary btn-block mt-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="คัดลอกแล้ว">
                        <i class="ion ion-ios-link"></i>
                       คัดลอกลิ้งค์
                    </button>
                        </div>
                                               </div>
                    </form>

         
       
        </div>

         
        <div class="listview-title mt-1"></div>
                  <ul class="listview image-listview">
                  <li>
                     <div class="item text-white">
                        <div class="in">
                        <div class="text-white"> <strong>จำนวนเพื่อนที่แนะนำ</strong></div>
                        <span class="text-muted">{{ $referral_count }} คน</span>
                    </div>
                </a>
            </li>
             
        </ul>
  <!--
<div class="card text-white mt-2 text-center">
                <div class="card-header  text-white">
                   ยอดค่าคอมมิชชั่น
                    <h5 class="card-title mt-2  text-white">159.89฿</h5>
                 <a href="#" class="btn btn-primary mt-2 mb-1">โอนเครดิต</a> <a href="#" class="btn btn-outline-primary mt-2 mb-1">ถอนเงินเข้าบัญชี</a> 

                </div>

            </div>


        <div class="listview-title mt-1"></div>
            <ul class="listview image-listview ">
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="wallet outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>รายชื่อสมาชิก</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="bar-chart-outline" role="img" class="md hydrated" aria-label="card outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>รายได้</div>
                        <span class="badge badge-primary">2</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>ประวัติการถอน</div>
                    </div>
                </a>
            </li>
        </ul>
        -->
        <div class="card mt-2 mb-2">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col" class="text-white"><strong>#</strong></th>
                                <th scope="col" class="text-white"><strong>รายการ</strong></th>
                                <th scope="col" class="text-white text-end"><strong>สถานะ</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($referral_data))
                            <?php $i =1;  ?>
                            @foreach($referral_data as $key => $value)
                            <tr>
                                <th scope="row"><?php echo $i++ ; ?></th>
                                <td><span class="text-end text-light"><i class="ion ion-md-contact"></i> {{ $value->username }}</span><br>{{ $value->created_at }}</td>
                                @if($value->status=='n')
                                <td class="text-end text-light"> <a class="text-light" href="#">รอทำรายการ</a></td>
                                @elseif($value->status=='e')
                                <td class="text-end text-danger"> <a class="text-danger" href="#">ไม่เข้าเงื่อนไข</a></td>
                                @elseif($value->status=='c')
                                <td class="text-end text-warning"> <a  class="text-warning"  href="#">รับไปแล้ว</a><br>{{ number_format($value->amount,2) }}</td>
                                @elseif($value->status=='y')
                                <td class="text-end "> <a href="#" class="text-primary" onclick="addpromotionrefer({{ $value->amount }},{{ $value->user_id }})">กดรับโบนัส</a><br>{{ number_format($value->amount,2) }}</td>
                                @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                            
                    </table>
                </div>

            </div>

    
    </div>

     
</div>



<script type="text/javascript">
    function addpromotionrefer(amount,ref_bonus){
         $.ajax({
                                dataType : "json",
                                type : "POST",
                                data : { "amount":amount,"ref_bonus":ref_bonus }, 
                                url :'{{ secure_url('/affiliate/addpromotionrefer') }}', 
                                success : function(data){
                               //     console.log(data);
                                         
                                       if(data.status=='error'){
                                           $('#noti-error-msg').html(data.message);
                                           notification('notification-11', 3000);
                                        }else if(data.status=='success'){
                                            $('#noti-success-msg').html(data.message);
                                           notification('notification-12', 3000);
                                           setTimeout(function() {
                                                window.location='{{ secure_url('') }}';
                                            }, 3000);
                                        }
                            } 
                        });
    }

document.getElementById('copy-button-ref').onclick = function() {
  copyById('ref-copy');
}
</script>