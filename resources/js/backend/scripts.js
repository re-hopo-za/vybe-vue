(function ($) {
    "use strict";

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }
    });

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $('.sidebar .collapse').collapse('hide');
    }

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        }

        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $('.sidebar .collapse').collapse('hide');
        }
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

    // Trim textarea string
    $('textarea').each(function () {
            $(this).val($(this).val().trim());
        }
    );

    // Data Table
    $("#dataTable").DataTable({
        responsive: true,
        language: {
            paginate: {
                next: "<i class='far fa-angle-right'></i>",
                previous: "<i class='far fa-angle-left'></i>"
            },
            "sEmptyTable": "هیچ داده‌ای در جدول وجود ندارد",
            "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
            "sInfoEmpty": "نمایش 0 تا 0 از 0 ردیف",
            "sInfoFiltered": "(فیلتر شده از _MAX_ ردیف)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "نمایش _MENU_ ردیف",
            "sLoadingRecords": "در حال بارگزاری...",
            "sProcessing": "در حال پردازش...",
            "sSearch": "",
            "sSearchPlaceholder": "جستجو کنید...",
            "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
        }
    });

    // Dropify
    $(".dropify").dropify();

    // SelectPickers
    $('.b-select').selectpicker();
})(jQuery);
