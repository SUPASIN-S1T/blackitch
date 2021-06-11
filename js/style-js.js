//img-carousel
$(document).ready(function() {
    $('#owl-one').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        nav: false,
        navText: ['', ''],
        dots: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                navText: ['', ''],
                dots: false,
            },
            600: {
                items: 2,
                nav: true,

            },
            1200: {
                items: 2,
                nav: true,
                loop: true,
            },
        }
    })

    $('#owl-two').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        nav: false,
        navText: ['', ''],
        dots: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                navText: ['', ''],
                dots: false,
            },
            600: {
                items: 3,
                nav: true,

            },
            1200: {
                items: 6,
                nav: true,
                loop: true,

            },
        }
    })
    $('#owl-three').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        nav: false,
        navText: ['', ''],
        dots: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                navText: ['', ''],
                dots: false,
            },
            600: {
                items: 2,
                nav: true,

            },
            1200: {
                items: 2,
                nav: true,
                loop: true,

            },
        }
    })
});

// video
$(document).ready(function() {
    $('#headerVideoLink').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true
    });

});

// btn back to on top
var btn = $('#button_ontop');
$(window).scroll(function() {
    if ($(window).scrollTop() > 500) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '500');
});



// btn back to on top
var btn_line = $('#btn_line');
$(window).scroll(function() {
    if ($(window).scrollTop() > 500) {
        btn_line.addClass('show');
    } else {
        btn_line.removeClass('show');
    }
});





$(document).ready(function() {
    $('#formReserve').submit(function(e) {
        e.preventDefault();
        var fname = $("#fname");
        var email = $("#email");
        var phone = $("#phone");
        var allergyF = $("#allergyF");
        var person = $("#person");
        var date = $("#date");
        var time = $("#time");
        $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
                fname: fname.val(),
                phone: phone.val(),
                email: email.val(),
                allergyF: allergyF.val(),
                person: person.val(),
                date: date.val(),
                time: time.val()
            },
            success: function(response) {
                swal({
                    title: "successfully !",
                    text: "Thank you for your reservation. We will revert back to you a confirmation email within a day.",
                    icon: "success",
                    timer: 3000
                });
                $('#formReserve')[0].reset();
            },
            error: function(response) {
                swal({
                    title: "Oops !",
                    text: "Something wrong...",
                    icon: "error",
                    timer: 3000
                });
            }
        });
    })
});



// const navLinks = document.querySelectorAll('.nav-item')
// const menuToggle = document.getElementById('navbarToggle')
// const bsCollapse = new bootstrap.Collapse(menuToggle)
// navLinks.forEach((l) => {
//     l.addEventListener('click', () => { bsCollapse.toggle() })
// })
