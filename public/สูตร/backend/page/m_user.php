  <style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */  
  .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
     color: #333 !important;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
      color: #fff !important;
  }
  .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
      color: #fff !important;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button {
      color: #fff !important;
  }
  </style>
<div class="container">
    <div class="card casino-card">
        <hr style="background-color: white;">
        <a class="btn btn-side btn-block" href="?page=m_adduser">เพิ่มผู้ใช้งาน</a>
        <hr style="background-color: white;">
        <div class="card-body text-center">
<!--  -->
            <span class="text-white">
                จัดการผู้ใช้งาน
            </span>
            <a href="../report/member.php" class="btn btn-info" role="button">Export Excel</a>



                <?php 
                if(isset($_GET['m'])){
                    $Query = query("SELECT * FROM user WHERE id = ?",array($_GET['m']));
                    $Data = $Query->fetch();
                    
                    if(isset($_POST['save'])){
                        $Query = query("UPDATE user SET user = ? , pass = ?, credit = ? WHERE id = ?",array($_POST['user'],$_POST['pass'],$_POST['credit'],$_POST['id']));
                    if($Query){
                        ?>
            <script>Swal.fire(
      'สำเร็จ!',
      'แก้ไขข้อมูลแล้ว',
      'success'
    ).then(function() {
    window.location.href = "?page=m_user";

    });</script>
                             <?php
                    }
                    }
                    ?>
                 <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-md-8">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $Data['id'] ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">ชื่อผู้ใช้</span>
                        </div>
                        <input type="text" name="user" style="width: 40%" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" id="addplususername" value="<?= $Data['user'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">รหัสผ่าน</span>
                        </div>
                        <input type="text" name="pass" style="width: 40%" class="form-control" placeholder="กรุณากรอกรหัสผ่าน" id="addpluspassword" value="<?= $Data['pass'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">เครดิต</span>
                        </div>
                        <input type="number" name="credit" style="width: 40%" class="form-control" placeholder="กรอกจำนวนเครดิต" id="addpluspassword" value="<?= $Data['credit'] ?>">
                    </div>
                    <button type="submit" name="save" class="btn btn-side btn-block">คลิ๊กเพื่อตั้งค่า</button>
                     </form>
                <div class="col-2"></div>

            </div> </div>
                         <?php
                }
                ?>


<!--  -->
   <div class='container mt-5'>
     <!-- Table -->
     <div class="table-responsive-md">
     <table id='userTable' class='display dataTable' width='100%'>
       <thead style="background-color: red;">
         <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>Line</th>
           <th>Phone</th>
           <th>Credit</th>
           <th>Rank</th>
           <th>Action</th>
         </tr>
       </thead>
     </table>
   </div>

   </div>


<script>
$(document).ready(function(){
  // DataTable
  var userDataTable = $('#userTable').DataTable({
     'processing': true,
     'serverSide': true,
     'serverMethod': 'post',
     'ajax': {
        'url':'../ajax/member_show.php'
     },
      //disble_colunmn
      "columnDefs": [{
      "targets": 4,
      "orderable": false
      }],   
     'columns': [
        { data: 'id' },
        { data: 'user' },
        { data: 'email' },
        { data: 'line' },
        { data: 'phone' },
        { data: 'credit' },
        { data: 'rank' },
        { data: 'action' },
     ]
  });

  // Update record
  $('#userTable').on('click','.updateUser',function(){
     var id = $(this).data('id');
     $('#txt_userid').val(id);
     console.log(id);
     window.location.href = '?page=m_user&m=' + id;


  });


  // Delete record
  $('#userTable').on('click','.deleteUser',function(){
     var id = $(this).data('id');
     console.log(id);

     var deleteConfirm = confirm("Are you sure?");
     if (deleteConfirm == true) {
        // AJAX request
        $.ajax({
          url:'../ajax/member_show.php',
          type: 'post',
          data: {request: 4, id: id},
          success: function(response){
             if(response == 1){
                //alert("deleted.");

                // Reload DataTable
                userDataTable.ajax.reload();
             }else{
                alert("Invalid ID.");
             }
          }
        });
     } 

  });
});  
</script>
<!--  -->
    </div>
</div>




