$(function() {
    $(".delbutton").click(function() {
        //Save the link in a variable called element
        var element = $(this);
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        //Built a url to send
        var info = 'id=' + del_id;
        if (confirm("Are you sure you want to deactivate this account? You can't undo this action.")) {
            $.ajax({
                type: "GET",
                url: "../../server/admin/deactivate.php",
                data: info,
                success: function(data) {
                    alert(data);
                }
            });
            $(this).parents(".record").animate({
                    backgroundColor: "#fbc7c7"
                }, "fast")
                .animate({
                    opacity: "hide"
                }, "slow");
            $.ajax({
                type: "GET",
                url: "../../server/admin/deactivate.php",
                data: info,
                success: function(data) {
                    window.location="account-reports.php";
                }
            });
        }
        return false;
    });
});