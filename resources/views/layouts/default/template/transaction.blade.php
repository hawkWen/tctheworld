<div class="section">
             
<div class="card  mt-2">
    <div class="card-body">
    
            <ul class="listview simple-listview no-space text-light bg-transparent" style="border: 0px;">
                <li class="listed-bottom">
                    <span>ช่องทาง</span>
                       <strong>{{ $deposit_data->channel }}</strong>
                    
                </li>
               <li>
                    <span>จากบัญชี</span>
                    <strong>{{ $user->account_number }}</strong>
                </li>
                 <li>
                    <span>ธนาคาร</span>
                    <strong>{{ $bankuser->bank_name }}</strong>
                </li>

                  <li>
                    <span>วันที่</span>
                    <strong>{{ $deposit_data->date_time }}</strong>
                </li>
                  
                 <li>
                    <span>จำนวนที่โอน</span>
                    <strong>{{ $deposit_data->amount }} ฿</strong>
                </li>
                <li>
                    <span>สถานะ</span>
                    <strong>{{ $deposit_data->status }}</strong>
                </li>
     
            </ul>

       
        </div>
        </div>
        </div>