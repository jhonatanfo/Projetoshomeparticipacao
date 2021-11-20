$(document).on('ready', function() {
    var sliderInit = $('.slide-home');
    $(document).ready(function() {
        sliderInit.slick({
            autoplay: true,
            autoplaySpeed: 9000,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            infinite: false,
            speed: 500,
            //fade: true,
            cssEase: 'linear'
        });
        sliderInit.slickAnimation();
    });

    $(".slide-home-servicos").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        infinite: true,
        arrows: true,

        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 530,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

    $(".slide-home-produtos").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        dots: true,
        infinite: true,
        arrows: true,

        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 530,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

    $(".slide-home-clientes").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        dots: false,
        infinite: true,
        arrows: false,

        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
            }
        }, {
            breakpoint: 530,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
            }
        }]
    });

    $(".slide-home-quem-somos").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        infinite: true,
        arrows: true,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }

        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });
});

$(".box-slide-servicos, .box-home-quem-somos").hover(function() {
    $('.box-slide-servicos, .box-home-quem-somos').removeClass("ativo");
    $(this).addClass("ativo");
});

$(".slide-home-clientes div img").click(function() {
    var item = $(this).attr("id");
    $(".portfolio").removeClass("ativo");
    $("." + item).addClass("ativo");
});

$('.navbar-nav li a[href^="#"], .slide-home-clientes div a[href^="#"], .trabalho a[href^="#"], .menu-rodape ul li a[href^="#"], .slide-home-texto a[href^="#"], .config-hover a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

    $('html, body').animate({
        scrollTop: targetOffset - 0
    }, 500);
});


//Retirar tudo < 992// 
$(document).ready(function() {
    var tam = $(window).width();

    if (tam >= 992) {

        $(document).on("scroll", function() {
            var altura = $(document).height();
            if ($(document).scrollTop() >= 0 && $(document).scrollTop() <= 142) { //QUANDO O SCROLL PASSAR DOS 100px DO TOPO
                fechado();
            } else if ($(document).scrollTop() >= 143) {
                aberto();
            } else {
                aberto();
            }
        });

        function aberto() {
            console.log("Aberto");
            $(".menu-fixo").addClass("small");
            $(".segundo-passo-menu").css("display", "block");

        }

        function fechado() {
            console.log("Fechado");
            $(".menu-fixo").removeClass("small");
            $(".segundo-passo-menu").css("display", "none");
            $(".navbar").css("margin-top", "0px");


            $(".nav-item").click(function() {
                $(".stick").removeClass("open");
            });
        }
    }
});



//Retirar tudo < 992// 




$(document).ready(function() {
    $(".icon-menu-efeitos").click(function() {
        $(".stick").toggleClass(function() {
            return $(this).is('.open, .closs') ? 'open closs' : 'open';
        });
        $(".navbar-collapse").toggleClass(function() {
            return $(this).is('.ativo, .negativo') ? 'ativo negativo' : 'ativo';
        });
    });

    $(".nav-item").click(function() {
        $(".navbar-collapse").removeClass("ativo");
    });
});