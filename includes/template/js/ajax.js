$(function() {

    $("#post_data").on("submit", function() {

        var data = $("#post_data").serialize();

        // Returns successful data submission message when the entered information is stored in database.
        if (data.post_by == '' || data.post_title == '' || data.post_content == '') {
            alert("Please Fill All Fields");
        } else {
            // AJAX code to submit form.
            $.ajax({
                type: "POST",
                url: "/?action=submit_post",
                data: data,
                success: function(html) {
                    alert("Submitted for Approval");
                }
            });
        }
        return false;

    });

});