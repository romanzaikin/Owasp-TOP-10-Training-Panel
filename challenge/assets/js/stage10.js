$("#search").click(function () {
	$.ajax({
		url: "stage10.php",
		type: "GET",
		data: {"_":$("#input").val()},
		success: function(data)
		{
			$("#notification").html(" no result for:"+data);
		}
	});
});

$("#file").change(function(){
	if(this.files[0]["type"] != "image/jpeg" || this.files[0]["name"].split('.').pop() != "jpg")
	{
		alert("file type not supported");
		location.reload();
	}
});
