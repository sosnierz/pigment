function viewBasic(){

// SPLIDE READY


  //HAMBURGER MENU/ SEARCH MENU
  const preloader = document.getElementById("preloader");
  const hamburger = document.querySelector('button.hamburger');
  const nav_container = document.querySelector('.header__menu');
  const menuUl = document.querySelector('.menu');
  let menuHeight =0;
  menuHeight = menuHeight + menuUl.scrollHeight;

  // preloader.classList.add("fadeOut");

  hamburger.addEventListener('click',function(){
    if(this.classList.contains('is-active')){
      this.classList.remove('is-active');
      nav_container.style.maxHeight = 0+'px';
    }else{
      this.classList.add('is-active');
      nav_container.style.maxHeight = `${menuHeight}px`;
    console.log(menuHeight)
    }
  })
  
//   //LINK CLICK
//   function linkClick(e){
//     e.preventDefault();
//     if (e.target.classList.contains('ajax_add_to_cart')) {
//       return;
//     }
//     let href = this.querySelectorAll('a')[0].href;
//     let regex = /\/#[a-z0-9A-Z-_]*/g;
//     var anchor = href.match(regex);
//     let target = this.querySelectorAll('a')[0].target;
//     if(target=='' || target==undefined){
//       target = '_self';
//     }

//     if(anchor!=null){
//       if(anchor.length>0){
//         anchor =  anchor[0].slice(2);
//         let section = document.getElementById(anchor);
//         if(section==null){
//           if(target === '_self'){
//             preloader.classList.add("fadeIn");
//           };
//           window.open(href,target);
//         }else{
//           if(hamburger.classList.contains('is-active')){
//             hamburger.classList.remove('is-active');
//             nav_container.classList.remove('expanded');
//             nav_container.removeAttribute("style");
//           };
//           c_scrollTo(anchor);
//         }
//       }else{
//         if(target === '_self'){
//           preloader.classList.add("fadeIn");
//         }
//         window.open(href,target);
//       }
//     }else{
//       if(target === '_self'){
//         preloader.classList.add("fadeIn");
//       };
//       window.open(href,target);
//     }
//   }

//   //BACK FORWARD iOS 
//   window.addEventListener("pageshow", function(evt){
//     if(evt.persisted){
//     setTimeout(function(){
//         window.location.reload();
//     },10);
//   }
//   }, false);

  
//   //LINK CLICK - MENU ITEM
//   var menuitems = document.querySelectorAll('.menu-item');
//   for (var menuitem of menuitems) {
//     menuitem.addEventListener('click',linkClick);
//   }

//   //LINK CLICK - LINK BOX
//   var linkitems = document.querySelectorAll('.link-box');
//   for (var linkitem of linkitems) {
//     linkitem.addEventListener('click',linkClick);
//   }

//   //SCROLL LINKS
//   var scrollLinks = document.querySelectorAll('.scroll-link');

//   for (var scrollLink of scrollLinks) {
//     scrollLink.addEventListener('click',function(e){
//       e.preventDefault();
//       var href = this.querySelectorAll('a')[0].href;
//       var regex = /\/#[a-z0-9A-Z-_]*/g;
//       let anchor = href.match(regex);
//       if(anchor.lenght>0){
//         var section = document.qetElementById(anchor[0]);
//         if(section!=null){
//           c_scrollTo(anchor[0]);
//         }
//       }
//     });
//   }

//   //SCROLL MAGIC
//   let isAnimatingScroll = false;
//   function c_scrollTo(link){
//     if(myLazyLoad!=undefined){
//       if(myLazyLoad.loadingCount!=undefined){
//         myLazyLoad.destroy();
//       };
//     };

//     var scrollTop = document.getScroll()[1];
//     let targetY = document.getElementById(link).offsetTop;
//     let speed = Math.round(Math.abs(targetY-scrollTop)/80);
//     speed = Math.abs(speed);
//     isAnimatingScroll = true;
//     if(window.scrollInt!=undefined){
//       clearInterval(window.scrollInt);
//       window.scrollInt = null;
//     }
//     function completeScrollAnimation(link){
//       var targetY = document.getElementById(link).offsetTop;
//       window.scrollTo(0, targetY);
//       clearInterval(window.scrollInt);
//       window.scrollInt=null;
//       isAnimatingScroll = false;
//       beginLazyLoading();
//     }
//     // window.speed = Math.abs(document.getScroll()[1]-document.getElementById(link).offsetTop)/4;
//     let wow_speed = 2;
//     let good_speed = 2;
//     let half_way = 0;
//     let scrololo = 0;
//     window.scrollInt = setInterval(function(){

//     let minimal_distance = 1;
//     //Math.abs(document.getScroll()[1]-document.getElementById(link).offsetTop)/speed;
//     //var wow_speed = 0;//Math.abs(document.getScroll()[1]-document.getElementById(link).offsetTop)/good_speed;

//       var scrollTop = document.getScroll()[1];

//       let targetY = document.getElementById(link).offsetTop;

//       // MNOŻNIKI PRĘDKOŚCI
//       var wow_half = 1.07;
//       var good_half = 1.05;
      
//       if (scrollTop < targetY) {
//         if (scrololo == 0) {
//           scrololo = scrollTop;
//         };
//         if (Math.abs(scrollTop) < Math.abs(targetY-(targetY-scrololo)/2.25)) {
//           wow_speed = Math.abs(wow_speed*wow_half); 
//           good_speed = Math.abs(good_speed*good_half); 
//         } else if (Math.abs(scrollTop) > Math.abs(targetY-(targetY-scrololo)/2.25)) {
//           wow_speed = Math.abs(wow_speed/wow_half); 
//           good_speed = Math.abs(good_speed/good_half);
//         };

//         // if (Math.abs(scrollTop) < Math.abs(targetY/4)) {
//         //   wow_speed = Math.abs(wow_speed*wow_quater); 
//         //   good_speed = Math.abs(good_speed*good_quater); 
//         // } else if (Math.abs(scrollTop) > Math.abs(targetY/4)) {
//         //   wow_speed = Math.abs(wow_speed/wow_quater); 
//         //   good_speed = Math.abs(good_speed/good_quater); 
//         // }

//       } else if (scrollTop > targetY){
//         if (half_way == 0) {
//           half_way = (scrollTop-targetY)*0.30;
//         };
//         if (Math.abs(scrollTop) > Math.abs(half_way)) {
//           wow_speed = Math.abs(wow_speed*wow_half); 
//           good_speed = Math.abs(good_speed*good_half); 
//         } else if (Math.abs(scrollTop) <= Math.abs(half_way)) {
//           wow_speed = Math.abs(wow_speed/wow_half); 
//           good_speed = Math.abs(good_speed/good_half);
//         } ;
//         // else if (Math.abs(scrollTop) > Math.abs(half_way/1.5)) {
//         //   wow_speed = Math.abs(wow_speed*wow_quater); 
//         //   good_speed = Math.abs(good_speed*good_quater); 
//         // } else if (Math.abs(scrollTop) < Math.abs(half_way/1.5)) {
//         //   wow_speed = Math.abs(wow_speed/wow_quater); 
//         //   good_speed = Math.abs(good_speed/good_quater); 
//         // }
//       };
//         // console.log("scrololo: "+ scrololo);
//         // console.log((targetY-scrololo)/2);
//          console.log("scrolltop: "+ scrollTop);
//           console.log("targetY: "+ targetY);
//         // console.log("half-way: "+ half_way);
//         console.log("wow: "+ wow_speed);
//         //console.log("good: "+ good_speed);

//         // if (wow_speed < 5) {
//         //   wow_speed = 5;
//         // }
//         // if (good_speed < 5) {
//         //   good_speed = 5;
//         // }

//         if(wow_speed<minimal_distance){
//           wow_speed = minimal_distance;
//         }

//         if(scrollTop<targetY){
//           var newScrollTop = scrollTop+wow_speed;
//           window.scrollTo(0, newScrollTop);
//           // console.log('scroll Top - '+scrollTop);
//           // console.log('link offset - '+targetY);
//           if(scrollTop>=targetY-wow_speed){
  
//             completeScrollAnimation(link)
//           }
//         }else if(scrollTop>targetY){
  
//           var newScrollTop = scrollTop-wow_speed;
//           window.scrollTo(0, newScrollTop);
//           if(scrollTop<=targetY+wow_speed){
//             completeScrollAnimation(link)
//           }
//         }else{
//           completeScrollAnimation(link)
//         }
//       },10);
//   };

//   window.addEventListener("wheel", scrollWheel);
//   window.addEventListener("touchmoves", scrollWheel);

//   function scrollWheel() {
//     if(isAnimatingScroll){
//       clearInterval(window.scrollInt);
//       isAnimatingScroll = false;
//       beginLazyLoading();
//     };
//   };
//   // function scrollToNoAnimation(link){
//   //   // if($(link)[0]!=undefined){
//   //     if(myLazyLoad!=undefined){
//   //       if(myLazyLoad.loadingCount!=undefined){
//   //     myLazyLoad.destroy();
//   //       }
//   //     }
//   //
//   //     isAnimatingScroll = true;
//   //     // $('html,body').animate({scrollTop: document.getElementById(link).offsetTop}, 0, function(){
//   //     //       isAnimatingScroll = false;
//   //     //       beginLazyLoading();
//   //     // });
//   //   // }
//   // }

//   window.onscroll = function() {scrollFunction()};

//   // Get the offset position of the navbar
//   var header= document.querySelectorAll('header.header')[0];
//   let sticky = 60;
//   let lastScrollTop = 0;
//   // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
//   function scrollFunction() {
//     if (document.getScroll()[1] >= sticky) {
//       header.classList.add("sticky");
//     } else {
//       header.classList.remove("sticky");
//     };
//     var st = document.getScroll()[1];

//     if (st > lastScrollTop){
//         // downscroll code
//         if(nav_container.classList.contains('expanded')==false){
//         header.classList.remove("scroll-up");
//         }else{
//           //scrolling down and expanded menu
//           header.classList.add("scroll-up");
//         }
//     } else {
//       // upscroll code
//       header.classList.add("scroll-up");
//     };
//     lastScrollTop = st;
//   };

//  //LAZY LOAD
//  var myLazyLoad;
//  function beginLazyLoading(){
//    if(myLazyLoad!=undefined){
//      if(myLazyLoad.loadingCount!=undefined){
//        myLazyLoad.destroy();
//      };
//    };
//    myLazyLoad = new LazyLoad({
//        elements_selector: ".lazy",
//        threshold: 0
//    });
//  };

//  //LAZY CHECKING FUCTION
//  function checkForLazy(){
//    if(typeof LazyLoad == 'function') {
//      beginLazyLoading();
//    }else{
//      setTimeout(checkForLazy,500);
//    }
//  }
//  checkForLazy();

//   //COOKIES
//   function checkForCookies(){
//     if(window.cookieconsent != undefined) {
//       window.cookieconsent.initialise({
//         "palette": {
//           "popup": {
//             "background": "#000",
//             "text": "#ffffff"
//           },
//           "button": {
//             "background": "#e30613",
//             "text": "#fff"
//           }
//         },
//         "content": {
//           "message": "Strona korzysta z plików cookie w celu realizacji usług zgodnie z Polityką prywatności i ochrona danych osobowych. Możesz określić warunki przechowywania lub dostępu do cookie w Twojej przeglądarce lub konfiguracji usługi.",
//           "dismiss": "Rozumiem",
//           "link": "Dowiedz się więcej",
//           "href": "/polityka-prywatnosci-i-ochrona-danych-osobowych"
//         }
//       })

//     }else{
//       setTimeout(checkForCookies,500);
//     }
//   }
//   checkForCookies();

//   //CHECKING PARALAX
//   function checkForParalax(){
//     if(typeof simpleParallax == 'function') {
//       var imageParalax = document.getElementsByClassName('paralax');
//       new simpleParallax(imageParalax,{
//         delay:0.5
//       });
//     }else{
//       setTimeout(checkForParalax,500);
//     }
//   }
//   checkForParalax();

//   //MOBILE FB LINK
  
//   // const isMobile = {
//   //   Android: function() {
//   //     return navigator.userAgent.match(/Android/i);
//   //   },
//   //   BlackBerry: function() {
//   //     return navigator.userAgent.match(/BlackBerry/i);
//   //   },
//   //   iOS: function() {
//   //     return navigator.userAgent.match(/iPhone|iPad|iPod/i);
//   //   },
//   //   Opera: function() {
//   //     return navigator.userAgent.match(/Opera Mini/i);
//   //   },
//   //   Windows: function() {
//   //     return navigator.userAgent.match(/IEMobile/i);
//   //   },
//   //   any: function() {
//   //     return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
//   //   }
//   // };
//   // const fb_link_header = document.querySelectorAll('#menu-social li.fb a')[0];
//   // const fb_link_footer = document.querySelectorAll('#menu-social-footer li.fb a')[0];

//   // if (isMobile.Android()) {
//   //   fb_link_header.href = fb_link_header.dataset.mobileAndroid;
//   //   fb_link_footer.href = fb_link_footer.dataset.mobileAndroid;
//   // } else if(isMobile.iOS()) {
//   //   fb_link_header.href = fb_link_header.dataset.mobileIos;
//   //   fb_link_footer.href = fb_link_footer.dataset.mobileIos;
//   // }
// }

// //GET SCROLL
// document.getScroll = function() {
//   if (window.pageYOffset != undefined) {
//       return [pageXOffset, pageYOffset];
//   } else {
//       let sx, sy, d = document,
//           r = d.documentElement,
//           b = d.body;
//       sx = r.scrollLeft || b.scrollLeft || 0;
//       sy = r.scrollTop || b.scrollTop || 0;
//       return [sx, sy];
//   }
// }
}
function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 100);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(viewBasic);
