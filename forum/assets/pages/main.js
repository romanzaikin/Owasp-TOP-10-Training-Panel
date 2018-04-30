
$("#page").slideDown("slow");

AjaxMethod({"action":"get_all_posts"},function (data) {
    $("#post_history").html(data.data);
});

$("#logout").click(function () {
    AjaxMethod({"action":"logout"},function () {
        document.location="index.php";
    });
});

$("#send_post").click(function () {
    AjaxMethod({"action":"new_post","data":msg.value},function (data) {
        console.log(data);
    });
});

function post_edit(obj) {
    $(obj.parentNode).html("<input class='full-width' value='"+obj.previousSibling.data+"'/><input type='button' value='save' onclick='post_save(this);'/>");
}

function post_save(obj) {
    AjaxMethod({"action":"edit_post","data":obj.previousSibling.value,"post_id":obj.parentNode.nextSibling.value},function (data) {
		if (data["success"] == true)	location.reload();	
    });
}