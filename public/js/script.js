// Move active class to the current page
$(function () {
    $(".sidebar-item").on("click", function (e) {
        $(".sidebar-item").removeClass("active");
        $(this).addClass("active");
    });
});

// Preview profile photo candidate
$(document).ready(function (e) {
    $("#profile_photo_path").change(function () {
        let reader = new FileReader();

        reader.onload = (e) => {
            $(".profile-picture-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    });
});
