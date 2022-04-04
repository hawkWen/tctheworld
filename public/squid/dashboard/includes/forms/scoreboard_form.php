<fieldset>
    <div class="form-group col-md-5">
        <label for="name">Name :</label>
          <input type="text" name="name" value="<?php echo $edit ? $scoreboard['name'] : ''; ?>" placeholder="" class="form-control form-control-sm" required="required" id = "name" >
    </div>

    <div class="form-group col-md-5">
        <label for="email">Email / Phone :</label>
        <input type="email" name="email" value="<?php echo $edit ? $scoreboard['email'] : ''; ?>" placeholder="" class="form-control form-control-sm" required="required" id="email">
    </div>

    <div class="form-group col-md-5">
        <label for="type">Level / Category :</label>
        <input type="type" name="type" value="<?php echo $edit ? $scoreboard['type'] : ''; ?>" placeholder="" class="form-control form-control-sm" id="type">
    </div>

    <div class="form-group col-md-5">
        <label for="score">Score</label>
        <input type="number" name="score" value="<?php echo $edit ? $scoreboard['score'] : ''; ?>" placeholder="" class="form-control form-control-sm" id="score">
    </div>

    <div class="form-group col-md-5">
        <label></label>
        <button type="submit" class="btn btn-success btn-sm" ><span class="fa fa-save fa-fw"></span> Save score</button>
        <a href="scoreboard.php" class="btn btn-secondary btn-sm" ><span class="fa fa-times fa-fw"></span> Cancel</a>
    </div>            
</fieldset>