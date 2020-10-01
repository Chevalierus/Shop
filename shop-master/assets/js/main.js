var siteURL = "http://shop-master.local/";

function showMore(btn) {
	var currentPageInput = document.querySelector("#current-page");
	var ajax = new XMLHttpRequest();
	ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
	ajax.send();

	currentPageInput.value = +currentPageInput.value + 1;

	if(ajax.response == ""){
		btnShowMore.style.display = "none";
	}

	var productsBlock = document.querySelector("#products");
		productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;

}

function addToBasket(btn){

var ajax = new XMLHttpRequest();
ajax.open("POST", siteURL + "/modules/basket/addbasket.php", false);
ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
ajax.send("id=" + btn.dataset.id);

var response = JSON.parse(ajax.response);

var btnGoBasket = document.querySelector("#go-basket span");
btnGoBasket.innerText = response.count;
}

function deleteProductBasket(obj, id){

	var ajax = new XMLHttpRequest();
 	ajax.open("POST", siteURL + "modules/basket/delete.php", false);
 	ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
 	ajax.send("id=" + id);

 	alert("Product deleted");

 	//delete row
 	obj.parentNode.parentNode.remove();
}

function countProducts(input, id, cost){
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/modules/basket/count.php", false);
	ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

	ajax.send("id=" + id + "&input=" + input.value + "&cost" + cost);

	input.parentNode.nextElementSibling.innerText = cost * input.value;
}