<div class="options">
	<div class="menu">
		<a href="index.php"><i class="fa fa-upload"></i> uploader</a>
		<a href="uploads.php"><i class="fa fa-list"></i> uploaded files</a>
	</div>
</div>

<script type="text/javascript">
	var menu = document.querySelector('.menu');
	var thepage = document.title;

	var isuploader = (thepage.indexOf('upload') > 0) ? 0 : 1;
	menu.querySelectorAll('a')[isuploader].className = "current";
</script>