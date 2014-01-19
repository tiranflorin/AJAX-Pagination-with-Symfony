/**
 * Created by florin on 1/19/14.
 */
$("#showPaginatedArea").click(function() {

    var url = "http://localhost/projects/Symfony2.4/web/app_dev.php/";

    $.ajax({
        type: "POST",
        url: url,
        data: $("#saveLocationFormId").serialize(),
        success: function(data)
        {
            var elem =  document.getElementById('displayResults');
            elem.innerHTML = "";
            elem.innerHTML = data;
        }
    });
});