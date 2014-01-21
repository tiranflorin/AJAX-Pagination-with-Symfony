/**
 * Created by florin on 1/19/14.
 */
$("#showPaginatedArea").click(function() {

    var url = "http://localhost/projects/Symfony2.4/web/app_dev.php/";

    $.ajax({
        type: "POST",
        url: url,
        data: { "pageId" : 1 },
        success: function(data)
        {
            var elem =  document.getElementById('displayResults');
            elem.innerHTML = "";
            elem.innerHTML = data;
        }
    });
});

function changePagination(pageId){
    /*
    $(".flash").show();
    $(".flash").fadeIn(400).html('Loading <img src="dist/css/images/ajax-loading.gif" />');
    var result = $("input[name=predefinedFilters]:checked").val();
    if(result == undefined){
        result = 'not_predefined';
        var url = "php/RetrieveObjects.php";
    }else{
        var url = "php/RetrieveObjectsPredefined.php";
    }
    var saveData = {};
    saveData.selectedObjectTypesAndConst = $("#saveFiltersFormId").serialize();
    saveData.selectedObjectMagnitude = $( "#slider-range" ).slider( "values" );
    saveData.pageId = pageId;
    saveData.predefinedFilters = result;
    */
    $.ajax({
        type: "POST",
        url: Routing.generate('acme_pagination_test_homepage'),
        data: { "pageId" : pageId },
        cache: false,
        success: function(result){
            var elem =  document.getElementById('displayResults');
            elem.innerHTML = "";
            elem.innerHTML = result;
        }
    });
}