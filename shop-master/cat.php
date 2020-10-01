<?php
include "config/database.php";
include "parts/header.php";
$sql = "SELECT * FROM categories WHERE id=" . $_GET["id"] . "";
$category = mysqli_fetch_assoc(mysqli_query($connect,$sql));
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category["title"]?></li>
  </ol>
</nav>

		<div class="row">
			<?php
				$sql = "SELECT * FROM products WHERE category_id=" . $_GET["id"];
				$result = mysqli_query($connect, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					include "parts/product_card.php";
				}
			?>
	</div><!--row-->
<?php
include "parts/footer.php";
?>