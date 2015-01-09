<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo "<script>window.location = 'index.php'</script>";
}
else{
echo "
<nav class='navbar navbar-default navbar-cls-top ' role='navigation' style='margin-bottom: 0'>
	<div class='navbar-header'>
		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.sidebar-collapse'>
			<span class='sr-only'>Navigasi</span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
		</button>
		<a class='navbar-brand' href='?module=home'>Administrator</a> 
	</div>
		<div class='logout'>
		<a href='logout.php' class='btn btn-primary square-btn-adjust'>Logout</a>&nbsp; <strong>$_SESSION[namauser]</strong>
		</div>
</nav>
";
}
?>