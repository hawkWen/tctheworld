<div class="section">
             
<div class="card  mt-2">
    <div class="card-body">
    
            <ul class="listview simple-listview no-space text-light bg-transparent" style="border: 0px;">
                <li class="listed-bottom">
                    <span>ช่องทาง</span>
                       <strong>{{ $deposit_data->channel }}</strong>
                    
                </li>
               <li>
                    <span>โอนจากบัญชี</span>
                    <strong>{{ $user->account_number }}</strong>
                </li>
                 <li>
                    <span>ธนาคาร</span>
                    <strong>{{ $bankuser->bank_name }}</strong>
                </li>

                  <li>
                    <span>เลขบัญชี</span>
                    <strong>{{ $user->account_number }}</strong>
                </li>
     
            </ul>

       
        </div>
        </div>
        </div>