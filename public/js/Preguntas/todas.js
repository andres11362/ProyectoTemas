$(document).ready(function () {
    $("#select_all").click(function () {
        $(".selected").prop('checked', $(this).prop('checked'));
    });
});
