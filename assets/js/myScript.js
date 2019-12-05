(function ($) {
	$(document).ready(function(){
		"use strict";

		$('header .searchBtn').click(function(){
			$('header .searchBox').stop().slideToggle(200);
			});

		$('main, footer').click(function(){
			$('header .searchBox').stop().slideUp(0);
			});

		$('main .sanpham .productDetails .right .thongtinsp ul li a').click(function(){
			$('main .sanpham .productDetails .right .thongtinsp ul li a').removeClass('active');
			$(this).addClass('active');
			});

		$('main .sanpham .productDetails .right .thongtinsp ul li a#box1Btn').click(function(){
			$('main .sanpham .productDetails .right .thongtinsp .chitiet').stop().slideUp(200);
			$('main .sanpham .productDetails .right .thongtinsp .chitiet#box1').stop().slideDown(200);
			});

		$('main .sanpham .productDetails .right .thongtinsp ul li a#box2Btn').click(function(){
			$('main .sanpham .productDetails .right .thongtinsp .chitiet').stop().slideUp(200);
			$('main .sanpham .productDetails .right .thongtinsp .chitiet#box2').stop().slideDown(200);
			});

		$('main .sanpham .productDetails .right .thongtinsp ul li a#box3Btn').click(function(){
			$('main .sanpham .productDetails .right .thongtinsp .chitiet').stop().slideUp(200);
			$('main .sanpham .productDetails .right .thongtinsp .chitiet#box3').stop().slideDown(200);
			});

		$('main .sanpham .dssp#subNavsp li').click(function(e){
			e.preventDefault();
			$('main .sanpham .dssp#subNavsp li, .tabContent .item').removeClass('active');
			$(this).addClass('active');
			$('.tabContent').find($(this).data('tab')).addClass('active');
			});

		$("main .slide, main .khachhang .dskhachhang").slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: false,
			centerMode: true,
			variableWidth: false,
			centerPadding:0,
			rows:1,
			arrows:true,
			focusOnSelect: true,
			});

	 });
}(jQuery))