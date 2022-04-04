<fieldset>
<div class="form-group col-md-5">
    	<label for="game">Game</label>
    	<select id="game" name="game" placeholder="" class="form-control form-control-sm" >
            <?php foreach ($table_scoreboards as $key=>$table) { ?>
            <option value="<?php echo $table['id']; ?>" <?php echo ($edit && $table['id'] ==$filterUsers['game']) ? "selected": "" ; ?>><?php echo $table['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-5">
        <label for="type">Level / Category :</label>
        <input type="type" name="type" value="<?php echo $edit ? $filterUsers['type'] : ''; ?>" placeholder="" class="form-control form-control-sm" id="type">
    </div>

    <div class="form-group col-md-5">
        <label for="email">Email / Phone :</label>
        <input type="email" name="email" value="<?php echo $edit ? $filterUsers['email'] : ''; ?>" placeholder="" class="form-control form-control-sm" required="required" id="email">
    </div>

    <div class="form-group col-md-5">
    	<label for="status">Active Status :</label>
    	<select id="status" name="status" placeholder="" class="form-control form-control-sm" >
            <option value="1" <?php echo ($edit && $filterUsers['status'] == '1') ? "selected": "" ; ?>>ACTIVE</option>
            <option value="0" <?php echo ($edit && $filterUsers['status'] == '0') ? "selected": "" ; ?>>IN-ACTIVE</option>
        </select>
    </div>

    <div class="form-group col-md-5">
        <label></label>
        <button type="submit" class="btn btn-success btn-sm" ><span class="fa fa-save fa-fw"></span> Save user</button>
        <a href="filter_users.php" class="btn btn-secondary btn-sm" ><span class="fa fa-times fa-fw"></span> Cancel</a>
    </div>            
</fieldset>