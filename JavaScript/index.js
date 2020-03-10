$(document).ready(function () {
    $("[data-toggle='popover']").popover({
        html: true,
        content: function () {
            return $("#popover-content").html();
        }
    });
    $(".cfield").hide();
});
$("#navList a").on("click", function (e) {
    e.preventDefault();
    $(this).tab("show");
});

$("#selectCategory").change(function(){
    var category = $("#selectCategory").val();
    $(".cfield").hide();
    switch (category){
        case "1":
            $("#hitmen").show();
            break;
        case "2":
            $("#substances").show();
            break;
        case "3":
            $("#exotics").show();
            break;
        case "4":
            $("#weapons").show();
            break;
    }
});