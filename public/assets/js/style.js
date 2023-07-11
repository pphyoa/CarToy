
var imgArray=[
    'assets/img/slide1.jpg',
    'assets/img/slide2.jpg',
    'assets/img/slide3.jpg',
    'assets/img/slide4.jpg',
    'assets/img/slide5.jpg',
    'assets/img/slide6.jpg',
    'assets/img/slide7.jpg'
]

var curIndex=0;
var imgDuration=2000;

function slideShow(){
    document.getElementById('headimg').src=imgArray[curIndex];
    curIndex++;
    if (curIndex == imgArray.length){curIndex = 0;}
    setTimeout("slideShow()",imgDuration);
}

slideShow();

$(document).ready(function () {
    $(".showing-slide").slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    })
})