"use strict";



jQuery(document).ready(function ($) {
    var topNav = $('.home .barra-navbar')
    var latVideo = $('#lat-video');
    var latVideoCover = $('#lat-video-cover');


    latVideo.on('playing', function () {
        latVideoCover.hide();

    })

    window.onscroll = function () {
        menuBgColor()

    };


    function menuBgColor() {
        if (window.pageYOffset > 100) {
            topNav.addClass("bg-primary");
        } else {
            topNav.removeClass("bg-primary");
        }
    }




});