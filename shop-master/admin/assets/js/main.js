var siteURL = "http://shop-master.local/";

function statusOrder(obj, id) {
	var ajax = new XMLHttpRequest();
 	ajax.open("POST", siteURL + "/admin/options/modules/status.php", false);
 	ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
 	ajax.send("id=" + id + "&obj=" + obj.value);
}