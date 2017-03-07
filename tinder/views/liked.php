<?php include 'includes/header.php'; ?>
<!-- Begin page content -->
<div class="container">
	<div class="page-header">
		<h1 class="text-center">People you liked and liked you.</h1>
	</div>
	<div class="row">
		<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
			<?php if (!empty($liked_people)): ?>
			<dl>
				<?php foreach ($liked_people as $key => $person) : ?>
				<dt><?php echo $person['displayname']; ?></dt>
				<dd>
					<a href="profile.php?id=<?php echo $person['id']; ?>">
						<img src="<?php echo $person['avatar'] ?>" width="200">
					</a>
				</dd>
				<?php endforeach; ?>
			</dl>
			<?php else: ?>
			<p class="bg-danger">There is no result.</p>
			<?php endif; ?>
		</div>
		<div class="col-md-4">&nbsp;</div>

	</div>
</div>
<?php include 'includes/footer.php'; ?>
