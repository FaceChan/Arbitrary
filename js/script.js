$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 700) {
            $("#back-to-top").fadeIn(800);
        } else {
            $("#back-to-top").fadeOut(800);
        }
    });
    $('#back-to-top').click( function() { 
        $('html, body').animate({
            scrollTop: $('html, body').offset().top
        }, 800);
        return false;
    });
    $('#mobile-menu').click(function() {
        $('.navbar-inner').toggle();
    });
    $('.new-comment textarea').keydown(function(e) {
        if (e.ctrlKey && e.keyCode == 13 || e.keyCode == 10) {
            $('.new-comment form').submit();
            return false;
        }
    });
    var ajaxed = false;
    var loading = '<span style="margin-left: 10px; color: #999;">Loding hardly. Please wait ~~~</span>';
    $("html, body").on("click", "#comments .page-navigator a", function(e) {
        e.preventDefault();
        var dom = $(this);
        if (dom.parent().hasClass('current') || ajaxed == true)
            return;
        $.ajax({
            url: dom.attr('href'),
            data: "action=ajax_comments",
            beforeSend: function() {
                $('.page-navigator').append(loading);
                ajaxed = true;
            },
            success: function(data) {
                $('#comments').replaceWith(data);
                $('html, body').animate({
                    scrollTop: $(".comments-list").offset().top - 40
                }, 500);
                ajaxed = false;
            }
        });
        return false;
    });
});
