<?php
include "config/database.php";
include "parts/header.php";
?>
		<div class="row" id="products">
			<?php
				if(isset($_GET["page"])){
				$page = $_GET["page"];
				}else{
				$page = 0;
				}
				$offset = $page * 6;
				$sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
				$result = mysqli_query($connect, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					include "parts/product_card.php";
				}

				setcookie("basket", "", 0, "/");
				//var_dump($_COOKIE["basket"]);
			?>
	</div><!--row-->
<div class="row">
	<div class="col-4 offset-4">
		<input type="hidden" value="1" id="current-page">
		<button class="btn btn-primary btn-lg" onclick="showMore(this)">ЕЩЕ</button>
	</div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<li class="page-item"><a class="page-link" href="http://shop-master.local/">1</a></li>
  	<li class="page-item"><a class="page-link" href="index.php?page=1">2</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=2">3</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=3">4</a></li>
  </ul>
</nav>

<?php
include "parts/footer.php";
?>