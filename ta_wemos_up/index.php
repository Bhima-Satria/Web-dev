<?php include "header.php"; ?>

<script src="jquery-latest.js"></script> 
<script>
var refreshId = setInterval(function()
{
    $('#responsecontainer').load('data.php');
}, 1000);
</script>
    
<!-- Begin page content -->
<div class="container">

  <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  
  <div id="responsecontainer">
	
  </div>	
</div>


<?php include "footer.php"; ?>
