<?php include 'includes/header.php'; ?>
<!-- Begin page content -->
<div class="container">
	<div class="row">
		<div class="page-header">
			<h2>Profile Information</h2>
		</div>
		<div class="col-md-6">

			<form class="form-signin" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="displayname">Your name</label>
					<input type="text" id="displayname" name="displayname" class="form-control" placeholder="Your name" required autofocus value="<?php echo isset($user['displayname'])?$user['displayname']:''; ?>">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Username" required value="<?php echo isset($user['username'])?$user['username']:''; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Email" required value="<?php echo isset($user['email'])?$user['email']:''; ?>">
					<p class="text-danger"><?php echo isset($errors['email'])?$errors['email']:''; ?></p>
				</div>
				<div class="form-group">
					<label for="birthday">Birthday</label><em> (The date format is: YYYY-MM-DD)</em>
					<input type="text" id="birthday" name="birthday" class="form-control" placeholder="Birthday" required value="<?php echo isset($user['birthday'])?$user['birthday']:''; ?>">
					<p class="text-danger"><?php echo isset($errors['birthday'])?$errors['birthday']:''; ?></p>
				</div>
				<div class="form-group">
					<input type="radio" name="gender" required value="male" <?php echo (isset($user['gender']) && $user['gender'] == 'male')?'checked':''; ?>><label>Male</label>
					<input type="radio" name="gender" required value="female"  <?php echo (isset($user['gender']) && $user['gender'] == 'female')?'checked':''; ?>><label>Female</label>
				</div>
				<div class="form-group">
					<label for="biography">About me</label>
					<textarea name="biography" class="form-control" rows="6"><?php echo isset($user['biography'])?$user['biography']:''; ?></textarea>
				</div>
				<div class="form-group">
					<label>Profile Picture</label><br>
					<?php if ($user['avatar']): ?>
					<img src="<?php echo $user['avatar']; ?>" width="150">
					<br><br>
					<?php endif; ?>
					<input type="file" name="avatar">
				</div>
				<div class="form-group">
					<label>Distance</label><em> (Distance of people from you to be displayed. Value zero will display all available people.)</em><br>
					<input type="number" name="distance" class="form-control" value="<?php echo isset($user['distance'])?$user['distance']:''; ?>"> <span>Km</span>
				</div>
				<div class="form-group">
					<label for="inputPassword">Password</label><em> (* Leave blank if you don't want to change password.)</em>
					<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="inputRetypePassword">Retype Password</label>
					<input type="password" name="retype_password" id="inputRetypePassword" class="form-control" placeholder="Retype Password">
					<p class="text-danger"><?php echo isset($errors['retype_password'])?$errors['retype_password']:''; ?></p>
				</div>

				<p class="text-danger"><?php if (isset($errors['login'])) echo $errors['login']; ?></p>
				<button class="btn btn-primary" type="submit">Save</button><br><br>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>
