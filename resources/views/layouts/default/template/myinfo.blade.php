 <div class="section">
             
<div class="card  mt-2">
    <div class="card-body">
    
            <ul class="listview simple-listview no-space text-light bg-transparent" style="border: 0px;">
                <li class="listed-bottom">
                    <span>ชื่อ-นามสกุล</span>
                    <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                </li>
               <li class="listed-bottom">
                    <span>เบอร์โทร</span>
                    <strong>{{ $user->phone }}</strong>
                </li>
                <li class="listed-bottom">
                    <span>อีเมล</span>
                    <strong>{{ $user->email }}</strong>
                </li>
                  <li>
                    <span>LINE ID</span>
                    <strong>{{ $user->lineid }}</strong>
                </li>
            </ul>

       
        </div>
        </div>
        </div>