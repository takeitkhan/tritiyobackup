$(document).ready(function(){"use strict";$(window).on('load',function(){$(".loader-inner").fadeOut();$(".loader").fadeOut("slow")});$(window).on('scroll',function(){var b=$(window).scrollTop();if(b>100){$(".navbar").addClass("top-nav-collapse")}else{$(".navbar").removeClass("top-nav-collapse")}});$('a.smooth-scroll').on('click',function(event){var $anchor=$(this);$('html, body').stop().animate({scrollTop:$($anchor.attr('href')).offset().top+20},1500,'easeInOutExpo');event.preventDefault()});$('.package-toggle').each(function(){$(this).change(function(){var curr_class='.'+$(this).attr('id');var price=$(this).attr('data-price');var title=$(this).attr('data-title');var price_box=$('.pricing-table li.price span');$(curr_class).toggleClass('active');var all=title+'_'+price;var hiddenclass='curr_class_'+$(this).attr('id');var html='<input id="'+hiddenclass+'" type="hidden" name="pricing_element[]" value="'+all+'">';if(price){if($(curr_class).hasClass('active')){price_box.html(parseInt(price_box.html(),10)+parseInt(price,10));$('.hidden_fields').append(html)}else{price_box.html(parseInt(price_box.html(),10)-parseInt(price,10));$('#'+hiddenclass).remove()}}})});var offset=300,offset_opacity=1200,scroll_top_duration=700,$back_to_top=$('.top');$(window).on('scroll',function(){($(this).scrollTop()>offset)?$back_to_top.addClass('is-visible'):$back_to_top.removeClass('is-visible fade-out');if($(this).scrollTop()>offset_opacity){$back_to_top.addClass('fade-out')}});$back_to_top.on('click',function(event){event.preventDefault();$('body,html').animate({scrollTop:0},scroll_top_duration)});$('.navbar-nav>li>a:not(#dLabel)').on('click',function(){$('#navbar-collapse').removeClass("in").addClass("collapse")});$('.features-tab .tab-title').on('click',function(e){if(!$(this).hasClass('current')){$('.tab-title').removeClass('out');$('.tab-title.current').addClass('out');$('.features-tab .tab-title').removeClass('current');$(this).addClass('current')}
e.preventDefault()});var mQ=window.matchMedia('(max-width: 767px)');mQ.addListener(tabScrolling);function tabScrolling(mQ){if(mQ.matches){$('.features-tab .tab-title').on('click',function(event){var $anchor=$(this);$('html, body').stop().animate({scrollTop:$anchor.offset().top-90},500,'easeInOutExpo');event.preventDefault()})}}
tabScrolling(mQ);function handleTweets(tweets){var x=tweets.length,n=0,element=document.getElementById('twitter-feed'),html='<div class="slides">';while(n<x){html+='<div>'+tweets[n]+'</div>';n++}
html+='</div>';element.innerHTML=html;$("#twitter-feed .slides").owlCarousel({slideSpeed:300,paginationSpeed:400,autoPlay:!0,pagination:!1,transitionStyle:"fade",singleItem:!0})}
if($('#twitter-feed').length){var widgetId=$('#twitter-feed').attr('data-widget-id');var config_feed={"id":widgetId,"domId":'twitter-feed',"maxTweets":5,"enableLinks":!0,"showUser":!1,"showTime":!0,"dateFunction":'',"showRetweet":!1,"customCallback":handleTweets,"showInteraction":!1};twitterFetcher.fetch(config_feed)}
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))
return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f)};return t}(document,"script","twitter-wjs"));if($('.instagram-feed').length){jQuery.fn.spectragram.accessData={accessToken:'355387859.fe38278.7ba069fad87d4554b4b32b4a2503f5d9',clientID:'fe38278c378947c4812fd5173ce6062c'};$('.instagram-feed').each(function(){$(this).children('ul').spectragram('getUserFeed',{query:$(this).attr('data-user-name'),max:12})})}
if($('#mailchimpForm').length){$("#mailchimpForm").formchimp()}
if($('.map-container').length){$('.map-container').on('click',function(){$('.map-iframe').css("pointer-events","auto")});$(".map-container").on('mouseleave',function(){$('.map-iframe').css("pointer-events","none")})}
function isValidEmail(emailAddress){var pattern=new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);return pattern.test(emailAddress)}
function isValidPhoneNumber(phoneNumber){return phoneNumber.match(/[0-9-()+]{3,20}/)}
$("#contactForm").on('submit',function(e){e.preventDefault();var data={name:$("#cfName").val(),email:$("#cfEmail").val(),subject:$("#cfSubject").val(),phone:$("#phone").val(),message:$("#cfMessage").val()};if(isValidEmail(data.email)&&(data.phone.length>1)&&(data.message.length>1)&&(data.name.length>1)&&(data.subject.length>1)){$.ajax({type:"POST",url:baseurl+"sendcontact",data:data,success:function(){$('.success.cf').delay(500).fadeIn(1000);$('.failed.cf').fadeOut(500)}})}else{$('.failed.cf').delay(500).fadeIn(1000);$('.success.cf').fadeOut(500)}
return!1});$("#callbackForm").on('submit',function(e){e.preventDefault();var data={name:$("#cbName").val(),email:$("#cbEmail").val(),phone:$("#cbPhone").val()};alert(data);if(isValidEmail(data.email)&&(data.name.length>1)&&isValidPhoneNumber(data.phone)){$.ajax({type:"POST",data:data,success:function(){$('.success.cb').delay(500).fadeIn(1000);$('.failed.cb').fadeOut(500)}})}else{$('.failed.cb').delay(500).fadeIn(1000);$('.success.cb').fadeOut(500)}
return!1});var $ticketSelected=$('.ticket-selection .item-price');$ticketSelected.on('click',function(event){$ticketSelected.removeClass('active');$(this).addClass('active');$('#ticketForm input[name="ticket"]').val($(this).find('h4').text()+' Ticket - Cost: '+$(this).find('.amount').text())});$("#ticketForm").on('submit',function(e){e.preventDefault();var data={name:$("#tfName").val(),email:$("#tfEmail").val(),phone:$("#tfPhone").val(),ticket:$("#tfTicket").val()};if(isValidEmail(data.email)&&(data.name.length>1)&&(data.ticket.length>1)&&isValidPhoneNumber(data.phone)){$.ajax({type:"POST",url:"php/ticket.php",data:data,success:function(){$('.success.tf').delay(500).fadeIn(1000);$('.failed.tf').fadeOut(500)}})}else{$('.failed.tf').delay(500).fadeIn(1000);$('.success.tf').fadeOut(500)}
return!1});$("#quoteForm").on('submit',function(e){e.preventDefault();var data={name:$("#qName").val(),email:$("#qEmail").val(),phone:$("#qPhone").val(),message:$("#qMessage").val()};if(isValidEmail(data.email)&&(data.name.length>1)&&(data.message.length>1)&&isValidPhoneNumber(data.phone)){$.ajax({type:"POST",url:"php/quote.php",data:data,success:function(){$('.success.qf').delay(500).fadeIn(1000);$('.failed.qf').fadeOut(500)}})}else{$('.failed.qf').delay(500).fadeIn(1000);$('.success.qf').fadeOut(500)}
return!1});if($("#dfDate").length){$('#dfDate').pickadate({min:new Date()})}
$("#hero-sliderr").owlCarousel({items:1,pagination:!1,autoPlay:!0,singleItem:!0,slideSpeed:300,transitionStyle:"fade",pagination:!0});$("#dateForm").on('submit',function(e){e.preventDefault();var data={name:$("#dfName").val(),email:$("#dfEmail").val(),phone:$("#dfPhone").val(),date:$("#dfDate").val(),message:$("#dfMessage").val()};if(isValidEmail(data.email)&&(data.name.length>1)&&(data.date.length>1)&&(data.message.length>1)&&isValidPhoneNumber(data.phone)){$.ajax({type:"POST",url:"php/appointment.php",data:data,success:function(){$('.success.df').delay(500).fadeIn(1000);$('.failed.df').fadeOut(500)}})}else{$('.failed.df').delay(500).fadeIn(1000);$('.success.df').fadeOut(500)}
return!1});$("#subscribeForm").on('submit',function(e){e.preventDefault();var data={email:$("#sfEmail").val()};if(isValidEmail(data.email)){$.ajax({type:"POST",url:"php/subscribe.php",data:data,success:function(){$('.success.sf').delay(500).fadeIn(1000);$('.failed.sf').fadeOut(500)}})}else{$('.failed.sf').delay(500).fadeIn(1000);$('.success.sf').fadeOut(500)}
return!1});$("#subscribeForm2").on('submit',function(e){e.preventDefault();var data={name:$("#sf2Name").val(),email:$("#sf2Email").val()};if(isValidEmail(data.email)&&(data.name.length>1)){$.ajax({type:"POST",url:"php/subscribe2.php",data:data,success:function(){$('.success.sf2').delay(500).fadeIn(1000);$('.failed.sf2').fadeOut(500)}})}else{$('.failed.sf2').delay(500).fadeIn(1000);$('.success.sf2').fadeOut(500)}
return!1});if(navigator.userAgent.match(/IEMobile\/10\.0/)){var msViewportStyle=document.createElement('style');msViewportStyle.appendChild(document.createTextNode('@-ms-viewport{width:auto!important}'));document.querySelector('head').appendChild(msViewportStyle)}});$(document).ready(function(){$('ul.nav li.dropdown').hover(function(){$(this).find('.dropdown-menu').stop(!0,!0).delay(200).fadeIn(500)},function(){$(this).find('.dropdown-menu').stop(!0,!0).delay(200).fadeOut(500)});var speed=5000;var run=setInterval(rotate,speed);var slides=$('.slide');var container=$('#slides ul');var elm=container.find(':first-child').prop("tagName");var item_width=container.width();var previous='prev';var next='next';slides.width(item_width);container.parent().width(item_width);container.width(slides.length*item_width);container.find(elm+':first').before(container.find(elm+':last'));resetSlides();$('#buttons a').click(function(e){if(container.is(':animated')){return!1}
if(e.target.id==previous){container.stop().animate({'left':0},1500,function(){container.find(elm+':first').before(container.find(elm+':last'));resetSlides()})}
if(e.target.id==next){container.stop().animate({'left':item_width*-2},1500,function(){container.find(elm+':last').after(container.find(elm+':first'));resetSlides()})}
return!1});container.parent().mouseenter(function(){clearInterval(run)}).mouseleave(function(){run=setInterval(rotate,speed)});function resetSlides(){container.css({'left':-1*item_width})}});function rotate(){$('#next').click()}
$(function(){$('.sort-menuu li > a').click(function(){$(this).parent().addClass('active');$(".tag-boxs").slideDown(200);var x=$(this).text();$(".tag-list-item").append("<li><span>X</span>"+x+"</li>");$(".tag-list-item li span").click(function(){$(this).parent().hide()})})});$('#brands-client').owlCarousel({loop:!0,margin:10,nav:!1,navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],autoplay:!0,autoplaySpeed:2000,autoplayTimeout:6000,navSpeed:1000,responsive:{0:{items:1},600:{items:3},1000:{items:5}}})
$('ul.nav li.dropdown').hover(function(){$(this).find('.dropdown-menu').stop(!0,!0).delay(200).fadeIn(500)},function(){$(this).find('.dropdown-menu').stop(!0,!0).delay(200).fadeOut(500)})