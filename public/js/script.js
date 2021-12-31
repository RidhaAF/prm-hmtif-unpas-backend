// Move active class to the current page
$(document).ready(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('.sidebar-item a[href="' + url + '"]')
        .parent()
        .addClass("active");

    // Will also work for relative and absolute hrefs
    $(".sidebar-item a")
        .filter(function () {
            return this.href == url;
        })
        .parent()
        .addClass("active")
        .parent()
        .addClass("active");
});

// Preview profile photo candidate
$(document).ready(function (e) {
    $("#photo").change(function () {
        let reader = new FileReader();

        reader.onload = (e) => {
            $(".profile-picture-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    });
});
