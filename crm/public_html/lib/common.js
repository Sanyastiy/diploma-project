$(document).ready(function(){
	$("#form").submit(function(){
	$.ajax({
		type: "POST",
		url: "addgood.php",
		data: "fname="+$(".name_g").val()+"$fcat"+$(".cat").val()+"&fdesc="+$(".desc").val()+"$fcount="+$(".count").val()+"$fprice="+$(".price").val()
	}).done(function(){
		alert("Товар добавлен успешно");
	});
	return true;
	});
});