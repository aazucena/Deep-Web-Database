$(document).ready(function () {
    $('[data-toggle="popover"]').popover({
        html: true,
        content: function () {
            return $('#popover-content').html();
        }
    });
});
$('#navList a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
});