<?php include 'includes/header.php'; ?>
<!-- Begin page content -->
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="page-header">
				<h2>Profile</h2>
			</div>
			<dl>
				<dt>Name</dt>
				<dd><?php echo $profile['displayname'] ?></dd>
				<dt>Profile Picture</dt>
				<dd><img src="<?php echo $profile['avatar']; ?>" width="150"></dd>
				<dt>Email</dt>
				<dd><a href="mailto:<?php echo $profile['email']; ?>"><?php echo $profile['email']; ?></a></dd>
				<dt>Birthday</dt>
				<dd><?php echo $profile['birthday']; ?></dd>
				<dt>About</dt>
				<dd><?php echo $profile['biography']; ?></dd>
				<dt>Distance to you</dt>
				<dd><?php echo number_format($distance,2). ' Kilometers'; ?></dd>
			</dl>
		</div>
		<div class="col-md-6">
			<div class="page-header">
				<h2>Message</h2>
			</div>
			<dl class="messagebox">
				<?php foreach ($messages as $message): ?>
				<dt><?php echo $message['from_name']; ?></dt>
				<dd><?php echo $message['content'] ?></dd>
				<?php endforeach; ?>
			</dl>
			<form method="post">
				<div class="form-group">
					<textarea class="form-control" name="content" required rows="6"></textarea>
				</div>
				<div class="form-group">
					<input	type="submit" class="btn btn-primary" value="Send">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>
