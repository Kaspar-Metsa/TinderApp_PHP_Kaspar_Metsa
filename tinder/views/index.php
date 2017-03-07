<?php include 'includes/header.php'; ?>
<!-- Begin page content -->
<div class="container">
	<div class="page-header">
		<h1 class="text-center">You may like this person</h1>
	</div>
	<?php if (!$another): ?>
	<p class="text-center bg-danger">No one available now.</p>
	<?php else: ?>
	<div class="row">
		<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
			<img src="<?php echo $another['avatar']; ?>" width="400">
			<p class="bg-success"><?php echo $another['biography']; ?></p>
			<div>
				<a href="javascript:void(0)" class="action" data-action="nope" data-id="<?php echo $another['id']; ?>"><img class="img-thumbnail" src="img/cross.png" width="46"></a>
				<a href="javascript:void(0)" class="action" data-action="like" data-id="<?php echo $another['id']; ?>"><img class="img-thumbnail" src="img/heart.png" width="50"></a>
			</div>
			<br>
		</div>
		<div class="col-md-4">&nbsp;</div>
	</div>
	<script type="text/javascript">
		$('.action').click(function(){
			var id = $(this).data('id');
			var action = $(this).data('action');
			$.ajax({
				type: 'post',
				url: location.href,
				data:{
					id: id,
					action: action
				},
				success: function(response){
					location.reload(true);
				}
			})
		})
	</script>
	<?php endif; ?>
	
</div>
<?php include 'includes/footer.php'; ?>
