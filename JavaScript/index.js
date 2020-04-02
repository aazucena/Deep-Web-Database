$(document).ready(function () {
    $("[data-toggle='popover']").popover({
        html: true,
        content: function () {
            return $("#popover-content").html();
        }
    });
    var pathname = window.location.pathname;
    var category = $("#selectCategory").val();
    if (category && pathname == "/update.php") {
        $(".cfield").hide();
        switch (category) {
            case "H":
                $("#hitmen").show();
                $("#post").show();
                $("#hitmen input").prop('required', true);
                $("#hitmen select").prop('required', true);
                $("#hitmen textarea").prop('required', false);
                $(".wfield").hide();
                break;
            case "E":
                $("#exotics").show();
                $("#exotics input").prop('required', true);
                $("#exotics select").prop('required', true);
                $("#exotics textarea").prop('required', false);
                $("#post").show();
                $(".wfield").hide();
                break;
            case "S":
                $("#substances").show();
                $("#substances input").prop('required', true);
                $("#substances select").prop('required', true);
                $("#substances textarea").prop('required', true);
                $("#post").show();
                $(".wfield").hide();
                break;
            case "W":
                $("#weapons").show();
                $("#weapons input").prop('required', true);
                $("#weapons select").prop('required', true);
                $("#weapons textarea").prop('required', true);
                $("#post").show();
                break;
        }
    } else {
        $(".cfield").hide();
        $(".wfield").hide();
        $("#hitmen input").prop('required', false);
        $("#hitmen select").prop('required', false);
        $("#hitmen textarea").prop('required', false);
        $("#exotics input").prop('required', false);
        $("#exotics select").prop('required', false);
        $("#exotics textarea").prop('required', false);
        $("#substances input").prop('required', false);
        $("#substances select").prop('required', false);
        $("#substances textarea").prop('required', false);
        $("#weapons input").prop('required', false);
        $("#weapons select").prop('required', false);
        $("#substances textarea").prop('required', false);
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
    $(".wfield").hide();
    $("#hitmen input").prop('required', false);
    $("#hitmen select").prop('required', false);
    $("#hitmen textarea").prop('required', false);
    $("#exotics input").prop('required', false);
    $("#exotics select").prop('required', false);
    $("#exotics textarea").prop('required', false);
    $("#substances input").prop('required', false);
    $("#substances select").prop('required', false);
    $("#substances textarea").prop('required', false);
    $("#weapons input").prop('required', false);
    $("#weapons select").prop('required', false);
    $("#substances textarea").prop('required', false);
    switch (category) {
        case "H":
            $("#hitmen").show();
            $("#post").show();
            $("#hitmen input").prop('required', true);
            $("#hitmen select").prop('required', true);
            $("#hitmen textarea").prop('required', false);
            $(".wfield").hide();
            break;
        case "E":
            $("#exotics").show();
            $("#exotics input").prop('required', true);
            $("#exotics select").prop('required', true);
            $("#exotics textarea").prop('required', false);
            $("#post").show();
            $(".wfield").hide();
            break;
        case "S":
            $("#substances").show();
            $("#substances input").prop('required', true);
            $("#substances select").prop('required', true);
            $("#substances textarea").prop('required', true);
            $("#post").show();
            $(".wfield").hide();
            break;
        case "W":
            $("#weapons").show();
            $("#weapons input").prop('required', true);
            $("#weapons select").prop('required', true);
            $("#weapons textarea").prop('required', true);
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
            value: type,
            selected: true
        }));
    }
});