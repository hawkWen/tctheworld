   
{!! Form::open(array('url' => 'user/doreset/reset', 'class'=>'form-horizontal form-material sky-form boxed')) !!}

      @if(Session::has('message'))
      <center>
      {!! Session::get('message') !!}
      </center>
    @endif

    <ul class="parsley-error-list">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>  
            <div class="section mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label text-light" for="password4">รหัสผ่านใหม่</label>
                                 {!! Form::password('password',  array('class'=>'form-control', 'placeholder'=>'รหัสผ่านใหม่')) !!} 
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label text-light" for="password4">ยืนยันรหัสผ่านใหม่</label>
                                {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'ยืนยันรหัสผ่านใหม่')) !!}
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="form-group basic mt-2">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">บันทึก</button>
                </div>
        </form>

