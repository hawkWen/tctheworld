<fieldset>
    <!-- Text input-->
	
	<div class="form-group col-md-5">
		<label for="user_name">Username :</label>
		  <div class="input-group mb-2 mr-sm-2">
			<div class="input-group-prepend">
			  <div class="input-group-text"><span class="fas fa-user"></span></div>
			</div>
			<input type="text" class="form-control form-control-sm" id="user_name" name="user_name" placeholder="Username" value="<?php echo $edit ? $admin_account['user_name'] : ''; ?>" autocomplete="off" required="required">
		  </div>
	</div>
	
	<div class="form-group col-md-5">
		<label for="passwd">Password :</label>
		  <div class="input-group mb-2 mr-sm-2">
			<div class="input-group-prepend">
			  <div class="input-group-text"><span class="fas fa-lock"></span></div>
			</div>
			<input type="text" class="form-control form-control-sm" id="passwd" name="passwd" placeholder="" autocomplete="off">
		  </div>
	</div>
	
    <!-- radio checks -->
	<div class="form-group col-md-5">
    	<label for="admin_type">Active Status :</label>
    	<select id="admin_type" name="admin_type" placeholder="" class="form-control form-control-sm" >
            <option value="super" <?php echo ($edit && $admin_account['admin_type'] == 'super') ? "selected": "" ; ?>>SUPER ADMIN</option>
            <option value="admin" <?php echo ($edit && $admin_account['admin_type'] == 'admin') ? "selected": "" ; ?>>ADMIN</option>
        </select>
    </div>
	
    <!-- Button -->	
    <div class="form-group col-md-5">
		<button type="submit" class="btn btn-success btn-sm" ><span class="fa fa-save fa-fw"></span> Save admin user</button>
		<a href="admin_users.php" class="btn btn-danger btn-sm" ><span class="fa fa-times fa-fw"></span> Cancel</a>
    </div>
</fieldset>