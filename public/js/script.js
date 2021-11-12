$(function () {
    $(".sidebar-item").on("click", function (e) {
        $(".sidebar-item").removeClass("active");
        $(this).addClass("active");
    });
});
