$(window).on("load",function(){$(".loader").delay(4e3).fadeOut("slow")}),$(document).ready(function(){function t(){var t="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";return t.charAt(Math.floor(Math.random()*t.length))}function e(){return Math.round(200*Math.random())}function a(t){var a=e();t.setAttribute("animation-delay",a+"ms"),console.log("animation-delay",a+"ms")}new fullpage("#fullpage",{anchors:["page1","page2","page3","page4","page5","page6","page7"],slidesNavigation:!0,css3:!0,scrollingSpeed:1500,scrollOverflowReset:!0,licenseKey:"93A1A4F9-CFCE4AC0-98DA4E7A-FF1416D6",onLeave:function(t,e,a){$(this);"down"==a&&($(".navbar-nav").addClass("appear"),$(".navbar").addClass("appear"))}});setTimeout(function(){$("#video_voyage1").fadeOut(1e3)},8e3),setTimeout(function(){$(".img-zoom").addClass("show_picture")},8e3),setTimeout(function(){$(".arrow_hidden").addClass("continue"),$(".first_picture").addClass("continue")},12e3);var o=function(e){a(e);var o=0,n=e.getAttribute("data-letter"),i=[t(),t(),t(),t(),t(),n];e.addEventListener("animationend",function(){e.setAttribute("data-letter",n)},!1),e.addEventListener("animationiteration",function(){e.setAttribute("data-letter",i[o++])},!1)};Array.from(document.querySelectorAll("[data-letter]"),o);$(".img-zoom").on("mousemove",function(t){var e=$(".img-zoomed").outerHeight()-$(this).outerHeight(),a=$(".img-zoomed").outerWidth()-$(this).outerWidth(),o=($(this).offset().top-t.pageY)*(e/$(this).outerHeight())-$(this).outerHeight(),n=($(this).offset().left-t.pageX)*parseInt(a/$(this).outerWidth())-$(this).outerWidth(),i=n+"px,"+o+"px";$(".img-zoomed").css({"-webkit-transform":"translate("+i+")","-ms-transform":"translate("+i+")",transform:"translate("+i+")"})})});