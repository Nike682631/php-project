$(document).ready(function () {
    $("[data-trigger]").on("click", function(){
        var trigger_id =  $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    });

    // close if press ESC button
    $(document).on('keydown', function (event) {
        if (event.keyCode === 27) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("overlay-active");
        }
    });

    // close button
    $(".btn-close").click(function (e) {
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });



    $(".subnav-toggle").on('click', function () {
        $(this).toggleClass('change');
        $('.header-links').slideToggle();
    });

    $(".submenu-indicator").on('click', function () {
        console.log('tes');
        var submenu = $(this).parent().find('.submenu').eq(0);
        submenu.toggleClass('expanded');

        if ($(this).text() == '+') {
            $(this).text('-');
        } else {
            $(this).text('+');
        }

    });

    $(".submenu-trigger").on('click', function () {
        console.log($(this).closest('.submenu'));
        //  $(this).find('>.submenu').addClass('expanded');
    });


    assignBuying();
    assignSelling();
    initialListOptions();


    $("input[name='productCategories[]']").on('change', function () {
        var submenu = $(this).parent().find('.submenu').eq(0);
        submenu.addClass('expanded');
    });

    $("input[name='serviceCategories[]']").on('change', function () {
        var submenu = $(this).parent().find('.submenu').eq(0);
        submenu.addClass('expanded');
    });

    if ($('.home-category-slider').length > 0) {
        // Slick Slider
        $('.home-category-slider').slick({
            dots: true
        });
    }

    if($('.product-images').length > 0) {
        $('.product-images').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4
        });
    }

    // Custom Country Select
    $('#select-countries').select2({
        templateResult: function(item) {
            return format(item);
        }
    });
    
    $('select.countries').select2({
        templateResult: formatState,
    });
    
    
});

function formatState (state) {
    if (!state.id) { return state.text; }
    var $state = $(
        '<span><img style="display: inline; width: 12px; height: 12px;" src="' + '../images/flags/' + state.element.value.toLowerCase() + '.png"/> ' + state.text + '</span>'
    );
    return $state;
};




/* Functionn to expand selected items in tree list*/
function initialListOptions() {
    $.each($(".buy-form input[name='productCategories[]']:checked"), function () {
        $(this).parent().find('>.submenu').addClass('expanded');
    });

    $.each($(".sell-form input[name='productCategories[]']:checked"), function () {
        $(this).parent().find('>.submenu').addClass('expanded');
    });

    $.each($(".buy-form input[name='serviceCategories[]']:checked"), function () {
        $(this).parent().find('>.submenu').addClass('expanded');
    });

    $.each($(".sell-form input[name='serviceCategories[]']:checked"), function () {
        $(this).parent().find('>.submenu').addClass('expanded');
    });
}

function assignBuying() {
    $(".buy-form form").on('change', function () {
        console.log('change');
        let form_url = $(this).attr('action');
        var categories = [];
        $.each($(".buy-form input[name='productCategories[]']:checked"), function () {
            categories.push($(this).val());
            $(this).parent().find('>.submenu').addClass('expanded');
        });

        $.each($(".buy-form input[name='serviceCategories[]']:checked"), function () {
            categories.push($(this).val());
            $(this).parent().find('>.submenu').addClass('expanded');
        });

        $.ajax({
            url: form_url,
            type: 'post',
            data: {
                'productCategories': categories,
                "_token": $('#csrf-token')[0].content  //pass the CSRF_TOKEN()
            },
            success: function (result) {
                console.log(result);
            }
        });
    });
}

function assignSelling() {
    $(".sell-form form").on('change', function () {
        console.log('change');
        let form_url = $(this).attr('action');
        var categories = [];
        $.each($(".sell-form input[name='productCategories[]']:checked"), function () {
            categories.push($(this).val());
            $(this).parent().find('>.submenu').addClass('expanded');
        });

        $.each($(".sell-form input[name='serviceCategories[]']:checked"), function () {
            categories.push($(this).val());
            $(this).parent().find('>.submenu').addClass('expanded');
        });

        $.ajax({
            url: form_url,
            type: 'post',
            data: {
                'productCategories': categories,
                "_token": $('#csrf-token')[0].content  //pass the CSRF_TOKEN()
            },
            success: function (result) {
                console.log(result);
            }
        });
    });
}

function format(item) {
    if (!item.id) {
        return item.text;
    }
    var url = "https://hatscripts.github.io/circle-flags/flags/";
    var img = $("<img>", {
        class: "img-flag",
        width: 26,
        src: url + item.element.value.toLowerCase() + ".svg"
    });
    var span = $("<span>", {
        text: " " + item.text
    });
    span.prepend(img);
    return span;
}

$(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
});

if ($(window).width() < 992) {
    $('.dropdown-menu a').click(function (e) {
        e.preventDefault();
        if ($(this).next('.submenu').length) {
            $(this).next('.submenu').toggle();
        }
        $('.dropdown').on('hide.bs.dropdown', function () {
            $(this).find('.submenu').hide();
        })
    });
}

document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("#mobile-menu", {
            "extensions": [
                "position-front",
                "position-right",
                "pagedim-black"
            ]
        });
    }, {
}
);