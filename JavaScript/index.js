$(document).ready(function () {});
$('#navList a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
})