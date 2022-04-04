  <style>
  /* Facebook : อดิเทพ เทศเทียน /*
  /* Tel : 063-163-1368 /*
  /* Line : Aditep2541 /*
  /* Date : 25/01/63 */    
  </style>
<style>
.button {
  color: #ffffff;
  border: 2px solid #4CAF50 !important;
  background-color: #4e090e;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<div class="container mt-4">
<div class="col-md-12" style="padding-top:10px">
<div class="row">
    <div class="col-sm">
        <div class="card casino-card">
            <div class="card-body text-center">
            <span class="text-white">ตั้งค่าระบบหลังบ้าน</span>
            <a class="btn btn-side btn-block" href="?page=m_setting">>>เลือก<<</a>
        </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm">
        <div class="card casino-card">
            <div class="card-body text-center">
            <span class="text-white">ตั้งค่าสูตร</span>
            <a class="btn btn-side btn-block" href="?page=m_formula_sagame">SAGAME</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_sexy">SEXY</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_wm">WM</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_dg">Dreamgaming</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_venus">Venus</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_allbet">Allbet</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_gclub">Gclub</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_ebet">Ebet</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_asia">Asia</a>
            <a class="btn btn-side btn-block" href="?page=m_formula_bggaming">BG-gaming</a>
        </div>
        </div>
    </div>
</div>
<!--             <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                        <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดวันนี้<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดสัปดาห์นี้<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดเดือนนี้<br><small>
                            <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                            </small></h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดทั้งหมด<br><small>
                            <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                            </small></h6>
                        </div>
                    </div>
                </div>
            </div> -->
    <?php 
    $O = 0;
    $Query = query("SELECT * FROM user");
    while($User = $Query->fetch()){
       if((time()-$User['online']<60)){
           $O++;

       }
    }
    ?>

<!--             <div class="row mt-4">
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">ผู้ใช้ออนไลน์</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $O ?></b> คน</span>
                    </div>
                    </div>
                </div>
            </div> -->



<!--             <div class="row mt-4">
                <?php 
                $Query = query("SELECT * FROM statisctic_sagame WHERE result = 'win'");
                $Win = $Query->rowCount();
                ?>
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">จำนวนสูตรที่เข้า sagame</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $Win ?></b> ครั้ง</span>
                    </div>
                    </div>
                </div>
                <?php 
                $Query1 = query("SELECT * FROM statisctic_sexy WHERE result = 'win'");
                $Win1 = $Query1->rowCount();
                ?>
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">จำนวนสูตรที่เข้า sexy</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $Win1 ?></b> ครั้ง</span>
                    </div>
                    </div>
                </div>
                <?php 
                $Query1 = query("SELECT * FROM statisctic_wm WHERE result = 'win'");
                $Win1 = $Query1->rowCount();
                ?>
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">จำนวนสูตรที่เข้า wm</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $Win1 ?></b> ครั้ง</span>
                    </div>
                    </div>
                </div>
                <?php 
                $Query1 = query("SELECT * FROM statisctic_dg WHERE result = 'win'");
                $Win1 = $Query1->rowCount();
                ?>
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">จำนวนสูตรที่เข้า dg</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $Win1 ?></b> ครั้ง</span>
                    </div>
                    </div>
                </div>
            </div> -->

<!--             <div class="card casino-card mt-4">
                <div class="card-body">
                <div class="table-responsive">  
                <table class="table table-striped text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ผุ้ใช้</th>
    </tr>
  </thead>
  <tbody>
      <?php 

          echo '    <tr>
          <th scope="row">'.$User['id'].'</th>
          <td>'.$User['user'].'</td>
          <td>'.getwin_sagame($User['user']).'</td>
          <td>'.getlose_sagame($User['user']).'</td>
          <td>'.getwin_sexy($User['user']).'</td>
          <td>'.getlose_sexy($User['user']).'</td>
          <td>'.getwin_wm($User['user']).'</td>
          <td>'.getlose_wm($User['user']).'</td>
          <td>'.getwin_dg($User['user']).'</td>
          <td>'.getlose_dg($User['user']).'</td>
        </tr>';

       $O = 0;
    $Query = query("SELECT * FROM user");
    while($User = $Query->fetch()){
       if((time()-$User['online']<60)){

           echo '<tr>
          <th scope="row">'.$User['id'].'</th>
          <td>'.$User['user'].'</td>
        </tr>';

       }
    }
      ?>

  </tbody>
</table>
</div> -->
            </div>
            </div>

