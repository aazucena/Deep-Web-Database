$(document).ready(function () {
    $("[data-toggle='popover']").popover({
        html: true,
        content: function () {
            return $("#popover-content").html();
        }
    });
    var pathname = window.location.pathname;
    var category = $("#selectCategory").val();
    if (category && pathname == "/update.html") {
        $(".cfield").hide();
        switch (category) {
            case "1":
                $("#hitmen").show();
                $("#post").show();
                $(".wfield").hide();
                break;
            case "2":
                $("#substances").show();
                $("#post").show();
                $(".wfield").hide();
                break;
            case "3":
                $("#exotics").show();
                $("#post").show();
                $(".wfield").hide();
                break;
            case "4":
                $("#weapons").show();
                $("#post").show();
                break;
        }
    } else {
        $(".cfield").hide();
        $(".wfield").hide();
        $("#post").hide();
    }
});
$("#navList a").on("click", function (e) {
    e.preventDefault();
    $(this).tab("show");
});

$("#selectCategory").change(function () {
    var category = $("#selectCategory").val();
    $(".cfield").hide();
    $("#post").hide();
    switch (category) {
        case "1":
            $("#hitmen").show();
            $("#post").show();
            $(".wfield").hide();
            break;
        case "2":
            $("#substances").show();
            $("#post").show();
            $(".wfield").hide();
            break;
        case "3":
            $("#exotics").show();
            $("#post").show();
            $(".wfield").hide();
            break;
        case "4":
            $("#weapons").show();
            $("#post").show();
            break;
    }
});
/** Adding Product Images */
$('#prodImgs').change(function () {

    var countFiles = $(this)[0].files.length;
    var $preview = $('#preview').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (countFiles > 1) {
            $("#pimg").text(countFiles + " Files");
        } else {
            $("#pimg").text("1 File");
        }
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        }

        var reader = new FileReader();

        $(reader).on("load", function () {
            $preview.append('<div class="col-lg-3 col-md-4 col-6' +
                ' align-self-center text-white rounded-top bg-logored p-3 mx-2">' +
                file.name + '<img src="' +
                this.result +
                '" class="img-fluid align-middle"/></div>');
        });

        reader.readAsDataURL(file);

    }

});

$('#addprod').click(function () {
    var type = $('#protypes').val();
    var count = 0;
    if (type != null || type == '') {
        count++;
        $('#ptype').append($('<option>', {
            text: type,
            value: type
        }));
    }
});