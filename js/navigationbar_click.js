$(document).ready(function () {
    $(".nav-link").click(function (event) { 
        var link = $(this).attr("href");
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
        $.ajax({
            url: link,
        })
        .done(function(html){
            $(".page-content").empty().append(html);
        });
        return false
    });
});