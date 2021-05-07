$(document).ready(function () {
    $(".nav-link").click(function (event) { 
        var link = $(this).attr("href");
        $.ajax({
            url: link,
        })
        .done(function(html){
            $(".page-content").empty().append(html);
        });
        return false
    });
});