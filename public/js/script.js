/*
Author       : Dreamguys
Template Name: CRMS - Bootstrap Admin Template
*/


$(document).ready(function(){

	// Variables declarations
	var $wrapper = $('.main-wrapper');
	var $slimScrolls = $('.slimscroll');
	var $pageWrapper = $('.page-wrapper');
	feather.replace();

	// Page Content Height Resize
	$(window).resize(function () {
		if ($('.page-wrapper').length > 0) {
			var height = $(window).height();
			$(".page-wrapper").css("min-height", height);
		}
	});


	if (localStorage.theme) document.documentElement.setAttribute("data-layout-mode", localStorage.theme);

	//theme Settings 


	
	// Mobile menu sidebar overlay
	$('body').append('<div class="sidebar-overlay"></div>');
	$('body').append('<div class="sidebar-themeoverlay"></div>');
	$('body').append('<div class="sidebar-popoverlay"></div>');
	$('body').append('<div class="sidebar-popoverlay-sign"></div>');

	$(document).on('click', '#mobile_btn', function() {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		$('#task_window').removeClass('opened');
		return false;
	});

	$(".sidebar-overlay").on("click", function () {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$wrapper.removeClass('slide-nav');
		$('.sidebar-overlay').removeClass('opened');
		$('#task_window').removeClass('opened');
	});

	// Logo Hide Btn

	$(document).on("click",".hideset",function () {
		$(this).parent().parent().parent().hide();
	});

	$(document).on("click",".delete-set",function () {
		$(this).parent().parent().hide();
	});

	// Stick Sidebar

	if ($(window).width() > 767) {
		if ($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
				// Settings
				additionalMarginTop: 30
			});
		}
	}

	// Owl Carousel
	if($('.product-slide').length > 0 ){
		$('.product-slide').owlCarousel({
			items: 1,
			margin: 30,
			dots : false,
			nav: true,
			loop: false,
			responsiveClass:true,
			responsive: {
				0: {
					items: 1
				},
				800 : {
					items: 1
				},
				1170: {
					items: 1
				}
			}
		});
	}

	$('.notes-tog').on('click', function () {
		$('.section-bulk-widget').toggleClass('section-notes-dashboard');
	});
	$('.notes-tog').on('click', function () {
		$('.budget-role-notes').toggleClass('budgeted-role-notes');
		
	});
	$('.notes-tog').on('click', function () {
		$('.notes-page-wrapper').toggleClass('notes-tag-left');
	});


	//Notes Slider
	if ($('.notes-slider').length > 0) {
		$('.notes-slider').owlCarousel({
			loop: true,
			margin: 24,
			dots: false,
			nav: true,
			smartSpeed: 2000,
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1300: {
					items: 3
				}
			}
		})
	}

	//Home popular 
	if($('.owl-product').length > 0 ){
		var owl = $('.owl-product');
			owl.owlCarousel({
			margin: 10,
			dots : false,
			nav: true,
			loop: false,
			touchDrag:false,
			mouseDrag  : false,
			responsive: {
				0: {
					items: 2
				},
				768 : {
					items: 4
				},
				1170: {
					items: 8
				}
			}
		});
	}
	// Datatable
	if($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": false, 
			"bInfo": false,
			"autoWidth": true,
			"ordering": true,
			"language": {
					search: ' ',
					sLengthMenu: '_MENU_',
					searchPlaceholder: "Search",
					info: "_START_ - _END_ of _TOTAL_ items",
					lengthMenu:     "Show _MENU_ entries",
					paginate: {
						next: 'Next <i class=" fa fa-angle-right"></i> ',
						previous: '<i class="fa fa-angle-left"></i> Prev '
					},
				 },
				initComplete: (settings, json)=>{
					$('.dataTables_paginate').appendTo('.datatable-paginate');
					$('.dataTables_length').appendTo('.datatable-length');
				},	
		});
	}
	

	// image file upload image
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#imgInp").change(function(){
		readURL(this);
	});

	// Loader
	setTimeout(function () {
		$('.preloader');
		setTimeout(function () {
			$(".preloader").fadeOut("slow");
		}, 500);
	}, 500);


	// Datetimepicker

	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').datetimepicker({
			format: 'DD-MM-YYYY',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}

	// Datetimepicker - Time
	
	if($('.datetimepicker-time').length > 0 ){
		$('.datetimepicker-time').datetimepicker({
			format: 'LT',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}
	
	// Toggle Password

	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-passwords').length > 0) {
		$(document).on('click', '.toggle-passwords', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".pass-inputs");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-password-new').length > 0) {
		$(document).on('click', '.toggle-password-new', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".pass-input-new");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}

	// Coming Soon

	if($('.comming-soon').length > 0) {
		// Get html elements
		let day = document.querySelector('.days');
		let hour = document.querySelector('.hours');
		let minute = document.querySelector('.minutes');
		let second = document.querySelector('.seconds');

		function setCountdown() {

		// Set countdown date
		let countdownDate = new Date('mar 27, 2024 16:00:00').getTime();

		// Update countdown every second
		let updateCount = setInterval(function(){

			// Get today's date and time
			let todayDate = new Date().getTime();

			// Get distance between now and countdown date
			let distance = countdownDate - todayDate;

			let days = Math.floor(distance / (1000 * 60 * 60 *24));

			let hours = Math.floor(distance % (1000 * 60 * 60 *24) / (1000 * 60 *60));

			let minutes = Math.floor(distance % (1000 * 60 * 60 ) / (1000 * 60));

			let seconds = Math.floor(distance % (1000 * 60) / 1000);

			// Display values in html elements
			day.textContent = days;
			hour.textContent = hours;
			minute.textContent = minutes;
			second.textContent = seconds;

			// if countdown expires
			if(distance < 0){
				clearInterval(updateCount);
				document.querySelector(".comming-soon").innerHTML = '<h1>EXPIRED</h1>'
			}
		}, 1000)
		}

		setCountdown()
	}

	// Select 2
	
	if ($('.select2').length > 0) {
	 	$(".select2").select2();
	}
	
	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

	// Multiple Image

	if ($('.multiple-img').length > 0) {
		function formatState (state) {
		  if (!state.id) { return state.text; }
		  var $state = $(
		    '<span><img src="' + $(state.element).attr('data-image') + '" class="img-flag" / " width="16px"> ' + state.text + '</span>'
		  );
		  return $state;
		};
		$('.multiple-img').select2({
			minimumResultsForSearch: Infinity,
		  	templateResult: formatState,
		  	templateSelection: formatState
		});
	}

	// Select Image

	if ($('.select-img').length > 0) {
		function formatState (state) {
		  if (!state.id) { return state.text; }
		  var $state = $(
		    '<span><img src="' + $(state.element).attr('data-image') + '" class="img-flag" / " width="16px"> ' + state.text + '</span>'
		  );
		  return $state;
		};
		$('.select-img').select2({
			minimumResultsForSearch: Infinity,
		  	templateResult: formatState,
		  	templateSelection: formatState
		});
	}
	
	// Counter 
	if($('.counter').length > 0) {
		$('.counter').counterUp({
			delay: 20,
			time: 2000
		});
	}
	if($('#timer-countdown').length > 0) {
		$( '#timer-countdown' ).countdown( {
			from: 180, // 3 minutes (3*60)
			to: 0, // stop at zero
			movingUnit: 1000, // 1000 for 1 second increment/decrements
			timerEnd: undefined,
			outputPattern: '$day Day $hour : $minute : $second',
			autostart: true
		});
	}
	
	if($('#timer-countup').length > 0) {
		$( '#timer-countup' ).countdown( {
			from: 0,
			to: 180 
		});
	}
	
	if($('#timer-countinbetween').length > 0) {
		$( '#timer-countinbetween' ).countdown( {
			from: 30,
			to: 20 
		});
	}
	
	if($('#timer-countercallback').length > 0) {
		$( '#timer-countercallback' ).countdown( {
			from: 10,
			to: 0,
			timerEnd: function() {
				this.css( { 'text-decoration':'line-through' } ).animate( { 'opacity':.5 }, 500 );
			} 
		});
	}
	
	if($('#timer-outputpattern').length > 0) {
		$( '#timer-outputpattern' ).countdown( {
			outputPattern: '$day Days $hour Hour $minute Min $second Sec..',
			from: 60 * 60 * 24 * 3
		});
	}
	
	// Summernote

	if($('#summernote2').length > 0) {
		$('#summernote2').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}

	if($('#summernote3').length > 0) {
		$('#summernote3').summernote({
		placeholder: 'Type your message',
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}
	if($('#summernote4').length > 0) {
		$('#summernote4').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}
	if($('.summernote').length > 0) {
		$('.summernote').summernote({
		height: 200,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true,              // set focus to editable area after initializing summernote
		toolbar: [
				['fontsize', ['fontsize']],
				['font', ['bold', 'italic', 'underline', 'strikethrough']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']]
			  ],
		});
	}


	// Sidebar Slimscroll
	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function() {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}

	// Sidebar
	var Sidemenu = function() {
		this.$menuItem = $('.sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('.sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(250);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('.sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	
	// Sidebar Initiate
	init();
	$(document).on('mouseover', function(e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar, .header-left').length;
            if (targ) {
                $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
                $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });

	// Table Responsive

	setTimeout(function () {
		$(document).ready(function () {
			$('.table').parent().addClass('table-responsive');
		});
	}, 1000);

	// Date Range Picker

	if($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('M/D/YYYY') + ' - ' + end.format('M/D/YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}

	

	//toggle_btn
	$(document).on('click', '#toggle_btn', function() {
		if ($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$(this).addClass('active');
			$('.subdrop + ul');
			localStorage.setItem('screenModeNightTokenState', 'night');
			setTimeout(function() {
				$("body").removeClass("mini-sidebar");
				$(".header-left").addClass("active");
			}, 100);
		} else {
			$('body').addClass('mini-sidebar');
			$(this).removeClass('active');
			$('.subdrop + ul');
			localStorage.removeItem('screenModeNightTokenState', 'night');
			setTimeout(function() {
				$("body").addClass("mini-sidebar");
				$(".header-left").removeClass("active");
			}, 100);
		}
		return false;
	});

	if (localStorage.getItem('screenModeNightTokenState') == 'night') {
		setTimeout(function() {
			$("body").removeClass("mini-sidebar");
			$(".header-left").addClass("active");
		}, 100);
	}

	var myDiv = document.querySelector('.sticky-sidebar-one');

	$('.submenus').on('click', function(){
		$('body').addClass('sidebarrightmenu');
	});
	
	$('#searchdiv').on('click', function(){
		$('.searchinputs').addClass('show');
	});
	$('.search-addon span').on('click', function(){
		$('.searchinputs').removeClass('show');
	});
	$(document).on('click', '#filter_search', function() {
		$('#filter_inputs').slideToggle("slow");
	});
	$(document).on('click', '#filter_search1', function() {
		$('#filter_inputs1').slideToggle("slow");
	});
	$(document).on('click', '#filter_search2', function() {
		$('#filter_inputs2').slideToggle("slow");
	});
	$(document).on('click', '#filter_search3', function() {
		$('#filter_inputs3').slideToggle("slow");
	});
	$(document).on('click', '#filter_search', function() {
		$('#filter_search').toggleClass("setclose");
	});
	$(document).on('click', '#filter_search1', function() {
		$('#filter_search1').toggleClass("setclose");
	});
	$(document).on("click",".productset",function () {
		$(this).toggleClass("active");
	});
	$(document).on("click",".product-info",function () {
		$(this).toggleClass("active");
	});
	$(document).on("click",".layout-box",function () {
		$('.layout-hide-box').toggleClass("layout-show-box");
	});
	$(document).on("click",".select-option1",function () {
		$('.select-color-add').addClass("selected-color-add");
	});
	$('.bank-box').on('click', function(){
		$('.bank-box').removeClass('active');
		$(this).addClass('active');
	});
	$('.theme-image').on('click', function(){
		$('.theme-image').removeClass('active');
		$(this).addClass('active');
	});
	$('.themecolorset').on('click', function(){
		$('.themecolorset').removeClass('active');
		$(this).addClass('active');
	});
	//Increment Decrement value
	$('.inc.button').click(function(){
	    var $this = $(this),
	        $input = $this.prev('input'),
	        $parent = $input.closest('div'),
	        newValue = parseInt($input.val())+1;
	    $parent.find('.inc').addClass('a'+newValue);
	    $input.val(newValue);
	    newValue += newValue;
	});
	$('.dec.button').click(function(){
	    var $this = $(this),
	        $input = $this.next('input'),
	        $parent = $input.closest('div'),
	        newValue = parseInt($input.val())-1;
	    console.log($parent);
	    $parent.find('.inc').addClass('a'+newValue);
	    $input.val(newValue);
	    newValue += newValue;
	});

	if($('.custom-file-container').length > 0) {
		//First upload
		var firstUpload = new FileUploadWithPreview('myFirstImage')
		//Second upload
		var secondUpload = new FileUploadWithPreview('mySecondImage')
	}

	$('.counters').each(function() {
		var $this = $(this),
			countTo = $this.attr('data-count');
		$({ countNum: $this.text()}).animate({
			countNum: countTo
		},
		{
			duration: 2000,
			easing:'linear',
			step: function() {
			$this.text(Math.floor(this.countNum));
			},
			complete: function() {
			$this.text(this.countNum);
			}
		
		});  
		
	});


	
	if($('.select-color-add').length > 0) {
		const colorSelect = document.getElementById('colorSelect');
		const inputBox = document.getElementById('inputBox');
		const inputShow = document.getElementById('input-show');
		const variantTable = document.getElementById('variant-table');

		// Add an event listener to the select field
		colorSelect.addEventListener('change', function() {
		// Get the selected value from the select field
		const selectedValue = colorSelect.value;
		inputShow.style.display="block"
		variantTable.style.display="block"

		// Set the value of the input box to the selected value
		inputBox.value = selectedValue;
		});
	}
	

	// toggle-password

	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye");
			var input = $(".pass-input");
			if (input.attr("type") == "text") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}


	if($('.win-maximize').length > 0) {
		$('.win-maximize').on('click', function(e){
			if (!document.fullscreenElement) {
				document.documentElement.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		})
	}


	$(document).on('click', '#check_all', function() {
		$('.checkmail').click();
		return false;
	});
	if($('.checkmail').length > 0) {
		$('.checkmail').each(function() {
			$(this).on('click', function() {
				if($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}
		
	// Popover
	if($('.popover-list').length > 0) {
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
		})
	}

	// Clipboard 
	if($('.clipboard').length > 0) {
		var clipboard = new Clipboard('.btn');
	}

	// Chat
	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');
		
		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}	
			return false;
		});
	})();

	// Mail important
	
	$(document).on('click', '.mail-important', function() {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});

		
	var selectAllItems = "#select-all";
	var checkboxItem = ":checkbox";
	$(selectAllItems).click(function() {
		
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}
		
	});

	var selectAllItems = "#select-all2";
	var checkboxItem = ":checkbox";
	$(selectAllItems).click(function() {
		
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}
		
	});
		
	// Tooltip
	if($('[data-bs-toggle="tooltip"]').length > 0) {
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	}

	var right_side_views = '<div class="right-side-views d-none">' +
	'<ul class="sticky-sidebar siderbar-view">' +
		'<li class="sidebar-icons">' +
			'<a class="toggle tipinfo open-layout open-siderbar" href="javascript:void(0);" data-toggle="tooltip" data-placement="left" data-bs-original-title="Tooltip on left">' +
				'<div class="tooltip-five ">' +
					'<img src="assets/img/icons/siderbar-icon2.svg" class="feather-five" alt="">' +
					'<span class="tooltiptext">Check Layout</span>' +
				'</div>' +
			'</a>' +
		'</li>' +
	'</ul>' +
'</div>' +

'<div class="sidebar-layout">' +
	'<div class="sidebar-content">' +
		'<div class="sidebar-top">' +
			'<div class="container-fluid">' +
				'<div class="row align-items-center">' +
					'<div class="col-xl-6 col-sm-6 col-12">' +
						'<div class="sidebar-logo">' +
							'<a href="index" class="logo">' +
								'<img src="assets/img/logo.png" alt="Logo" class="img-flex">' +
							'</a>' +
						'</div>' +
					'</div>' +
					'<div class="col-xl-6 col-sm-6 col-12">' +
						'<a class="btn-closed" href="javascript:void(0);"><img class="img-fliud" src="assets/img/icons/sidebar-delete-icon.svg" alt="demo"></a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>' +
		'<div class="container-fluid">' +
			'<div class="row align-items-center">' +
				'<h5 class="sidebar-title">Choose layout</h5>' +
				'<div class="col-xl-12 col-sm-6 col-12">' +
					'<div class="sidebar-image align-center">' +
						'<img class="img-fliud" src="assets/img/demo-one.png" alt="demo">' +
					'</div>' +
					'<div class="row">' +
						'<div class="col-lg-6 layout">' +
							'<h5 class="layout-title">Dark Mode</h5>' +
						'</div>' +
						'<div class="col-lg-6 layout dark-mode">' +
							'<label class="toggle-switch" for="notification_switch3">' +
							'<span>' +
							'<input type="checkbox" class="toggle-switch-input" id="notification_switch3">' +
							'<span class="toggle-switch-label ms-auto">' +
							'	<span class="toggle-switch-indicator"></span>' +
							'</span>' +
							'</span>' +
							' </label>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>' +
	'</div>' +
	'</div>' +
    $("body").append(right_side_views);

	// Sidebar Visible
	
	$('.open-layout').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-layout').addClass('show-layout');
		$('.sidebar-settings').removeClass('show-settings');
	});
	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-layout').removeClass('show-layout');
	});
	$('.open-settings').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-settings').addClass('show-settings');
		$('.sidebar-layout').removeClass('show-layout');
	});

	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-settings').removeClass('show-settings');
	});

	$('.open-siderbar').on("click", function (s) {
		s.preventDefault();
		$('.siderbar-view').addClass('show-sidebar');
	});

	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.siderbar-view').removeClass('show-sidebar');
	});

	if($('.toggle-switch').length > 0) {
		const toggleSwitch = document.querySelector('.toggle-switch input[type="checkbox"]');
		const currentTheme = localStorage.getItem('theme');
		var app = document.getElementsByTagName("BODY")[0];

		if (currentTheme) {
			app.setAttribute('data-theme', currentTheme);
		  
			if (currentTheme === 'dark') {
				toggleSwitch.checked = true;
			}
		}

		function switchTheme(e) {
			if (e.target.checked) {
				app.setAttribute('data-theme', 'dark');
				localStorage.setItem('theme', 'dark');
			}
			else {       
				app.setAttribute('data-theme', 'light');
				localStorage.setItem('theme', 'light');
			}    
		}

		toggleSwitch.addEventListener('change', switchTheme, false);	
	}
	
	if(window.location.hash == "#LightMode"){
		localStorage.setItem('theme', 'dark');
	}
	else {
		if(window.location.hash == "#DarkMode"){
			localStorage.setItem('theme', 'light');
		}
	}

	

	
	$('ul.tabs li').click(function(){
		var $this = $(this);
		var $theTab = $(this).attr('id');
		console.log($theTab);
		if($this.hasClass('active')){
		  // do nothing
		} else{
		  $this.closest('.tabs_wrapper').find('ul.tabs li, .tabs_container .tab_content').removeClass('active');
		  $('.tabs_container .tab_content[data-tab="'+$theTab+'"], ul.tabs li[id="'+$theTab+'"]').addClass('active');
		}
		
	});

	

	 '<div class="customizer-links">' +
			'<ul class="sticky-sidebar">' +
				'<li class="sidebar-icons">' +
					'<a href="#" class="add-setting" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Tooltip on left">' +
						'<img src="assets/img/icons/sidebar-icon-01.svg" class="feather-five" alt="">' +
					'</a>' +
				'</li>' +
				'<li class="sidebar-icons">' +
					'<a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Tooltip on left">' +
						'<img src="assets/img/icons/sidebar-icon-02.svg" class="feather-five" alt="">' +
					'</a>' +
				'</li>' +
				'<li class="sidebar-icons">' +
					'<a href="https://themeforest.net/item/dreamspos-pos-inventory-management-admin-dashboard-template/38834413" target="_blank" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Tooltip on left">' +
						'<img src="assets/img/icons/sidebar-icon-03.svg" class="feather-five" alt="">' +
					'</a>' +
				'</li>' +
			'</ul>' +
		'</div>' +

		'<div class="sidebar-settings preview-toggle">' +
			'<div class="sidebar-content sticky-sidebar-one">' +
				'<div class="sidebar-header">' +
					'<h5>Preview Settings</h5>' +
					'<a class="sidebar-close" href="#"><img src="assets/img/icons/close-icon.svg" alt=""></a>' +
				'</div>' +
				'<div class="sidebar-body">' +
					'<h6 class="theme-title">Choose Mode</h6>' +
					'<div class="switch-wrapper">' +
						'<div id="dark-mode-toggle">' +
							'<span class="light-mode active"> <img src="assets/img/icons/sun-icon.svg" class="me-2" alt=""> Light</span>' +
							'<span class="dark-mode"><i class="far fa-moon me-2"></i> Dark</span>' +
						'</div>' +
					'</div>' +
					'<div class="row  ">' +
						'<div class="col-xl-6 ere">' +
							'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
									'<div class="status-toggle d-flex align-items-center me-2">' +
										'<input type="checkbox" id="1" class="check">' +
										'<label for="1" class="checktoggle"><a  href="index.html"class="layout-link">checkbox</a> </label>' + 
									'</div>' +
									'<span class="status-text">LTR</span>' +
								'</div>' +
								'<div class="layout-img">' +
									'<img class="img-fliud" src="assets/img/theme/layout-ltr.png" alt="layout">' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
							'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
									'<div class="status-toggle d-flex align-items-center me-2">' +
										'<input type="checkbox" id="1" class="check">' +
										'<label for="1" class="checktoggle"><a  href="../template-rtl/index.html"class="layout-link">checkbox</a> </label>' + 
									'</div>' +
									'<span class="status-text">RTL</span>' +
								'</div>' +
								'<div class="layout-img">' +
									'<img class="img-fliud" src="assets/img/theme/layout-rtl.png" alt="layout">' +
								'</div>' +
							'</div>' +
						'</div>' +
					'</div>' +
					'<div class="row  ">' +
						'<div class="col-xl-6 ere">' +
							'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
									'<div class="status-toggle d-flex align-items-center me-2">' +
										'<input type="checkbox" id="3" class="check">' +
										'<label for="3" class="checktoggle"><a  href="index-three.html"class="layout-link">checkbox</a> </label>' + 
									'</div>' +
									'<span class="status-text">Boxed</span>' +
								'</div>' +
								'<div class="layout-img">' +
									'<img class="img-fliud" src="assets/img/theme/layout-04.png" alt="layout">' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
						 	'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
								 	'<div class="status-toggle d-flex align-items-center me-2">' +
									 	'<input type="checkbox" id="3" class="check">' +
									 	'<label for="3" class="checktoggle"><a  href="index-four.html"class="layout-link">checkbox</a> </label>' + 
								 	'</div>' +
								 	'<span class="status-text">Collapsed</span>' +
								'</div>' +
							 	'<div class="layout-img">' +
									 '<img class="img-fliud" src="assets/img/theme/layout-01.png" alt="layout">' +
							 	'</div>' +
						 	'</div>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
	 	'</div>' +
		
		'<div class="sidebar-settings nav-toggle">' +
			'<div class="sidebar-content sticky-sidebar-one">' +
				'<div class="sidebar-header">' +
					'<h5>Navigation Settings</h5>' +
				 	'<a class="sidebar-close" href="#"><img src="assets/img/icons/close-icon.svg" alt=""></a>' +
				'</div>' +
			 	'<div class="sidebar-body">' +
				 	'<h6 class="theme-title">Navigation Type</h6>' +
				 	'<div class="row  ">' +
						'<div class="col-xl-6 ere">' +
							'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
									'<div class="status-toggle d-flex align-items-center me-2">' +
										'<input type="checkbox" id="1" class="check">' +
										'<label for="1" class="checktoggle"><a  href="index.html"class="layout-link">checkbox</a> </label>' + 
									'</div>' +
									'<span class="status-text">Vertical</span>' +
								'</div>' +
								'<div class="layout-img">' +
									'<img class="img-fliud" src="assets/img/theme/layout-03.png" alt="layout">' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
						 	'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
								 	'<div class="status-toggle d-flex align-items-center me-2">' +
									 	'<input type="checkbox" id="2" class="check">' +
									 	'<label for="2" class="checktoggle"><a  href="index-one.html"class="layout-link">checkbox</a> </label>' + 
								 	'</div>' +
								 	'<span class="status-text">Horizontal</span>' +
								'</div>' +
							 	'<div class="layout-img">' +
									 '<img class="img-fliud" src="assets/img/theme/layout-01.png" alt="layout">' +
							 	'</div>' +
						 	'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
						 	'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
								 	'<div class="status-toggle d-flex align-items-center me-2">' +
									 	'<input type="checkbox" id="3" class="check">' +
									 	'<label for="3" class="checktoggle"><a  href="index-four.html"class="layout-link">checkbox</a> </label>' + 
								 	'</div>' +
								 	'<span class="status-text">Collapsed</span>' +
								'</div>' +
							 	'<div class="layout-img">' +
									 '<img class="img-fliud" src="assets/img/theme/layout-01.png" alt="layout">' +
							 	'</div>' +
						 	'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
						 	'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
								 	'<div class="status-toggle d-flex align-items-center me-2">' +
									 	'<input type="checkbox" id="3" class="check">' +
									 	'<label for="3" class="checktoggle"><a  href="index-three.html"class="layout-link">checkbox</a> </label>' + 
								 	'</div>' +
								 	'<span class="status-text">Modern</span>' +
								'</div>' +
							 	'<div class="layout-img">' +
									 '<img class="img-fliud" src="assets/img/theme/layout-04.png" alt="layout">' +
							 	'</div>' +
						 	'</div>' +
						'</div>' +
						'<div class="col-xl-6 ere">' +
						 	'<div class="layout-wrap">' +								
								'<div class="d-flex align-items-center">' +
								 	'<div class="status-toggle d-flex align-items-center me-2">' +
									 	'<input type="checkbox" id="3" class="check">' +
									 	'<label for="3" class="checktoggle"><a  href="index-two.html"class="layout-link">checkbox</a> </label>' + 
								 	'</div>' +
								 	'<span class="status-text">Boxed</span>' +
								'</div>' +
							 	'<div class="layout-img">' +
									 '<img class="img-fliud" src="assets/img/theme/layout-03.png" alt="layout">' +
							 	'</div>' +
						 	'</div>' +
						'</div>' +
					'</div>' +
				'</div>' +
		 	'</div>' +
	  	'</div>';



$('.add-setting').on("click", function (e) {
	e.preventDefault();
	$('.preview-toggle.sidebar-settings').addClass('show-settings');
});
$('.sidebar-close').on("click", function (e) {
	e.preventDefault();
	$('.preview-toggle.sidebar-settings').removeClass('show-settings');
	document.body.style.overflow = 'auto'; // Show the scrollbar
});
$('.navigation-add').on("click", function (e) {
	e.preventDefault();
	$('.nav-toggle.sidebar-settings').addClass('show-settings');
	document.body.style.overflow = 'hidden'; // Hide the scrollbar
});
$('.sidebar-close').on("click", function (e) {
	e.preventDefault();
	$('.nav-toggle.sidebar-settings').removeClass('show-settings');
});




// Otp Verfication  
$('.digit-group').find('input').each(function () { 
	$(this).attr('maxlength', 1); 
	$(this).on('keyup', function (e) { 
	 var parent = $($(this).parent()); 
	 if (e.keyCode === 8 || e.keyCode === 37) { 
	var prev = parent.find('input#' + $(this).data('previous')); 
	if (prev.length) { $(prev).select(); 
	 } 
	 } 
	else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {  
	var next = parent.find('input#' + $(this).data('next')); 
     if (next.length) { 
	 $(next).select(); 
	} else { 
	if (parent.data('autosubmit')) { 
	 parent.submit(); 
	 }
	} 
	 } 
	}); 
	}); 
	 $('.digit-group input').on('keyup', function () { 
	 var self = $(this); 
	 if (self.val() != '') { 
	 self.addClass('active'); 
	 } else { 
	self.removeClass('active'); 
	} 
	 });

// Date Range Picker
if ($('input[name="datetimes"]').length > 0) {
	$('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
  });
}

//Top Online Contacts
if($('.top-online-contacts .swiper-container').length > 0 ){
	var swiper = new Swiper('.top-online-contacts .swiper-container', {
		  slidesPerView: 5,
		  spaceBetween: 15,
	});
}


$(".dream_profile_menu").on('click', function () {
	$('.right-side-contact').addClass('show-right-sidebar');
	$('.right-side-contact').removeClass('hide-right-sidebar');
	if ( $(window).width() > 991 && $(window).width() < 1201) {
		$(".chat:not(.right-side-contact .chat)").css('margin-left', - chat_bar);
		$(".chat:not(.right_side_star .chat)").css('margin-left', - chat_bar);
	}
	if ($(window).width() < 992) {
		$('.chat:not(.right-side-contact .chat)').addClass('hide-chatbar');
		$('.chat:not(.right_side_star .chat)').addClass('hide-chatbar');
	}
});

$(".close_profile").on('click', function () {
	$('.right-side-contact').addClass('hide-right-sidebar');
	$('.right-side-contact').removeClass('show-right-sidebar');
	if ( $(window).width() > 991 && $(window).width() < 1201) {
		$(".chat").css('margin-left', 0);
	}
	if ($(window).width() < 992) {
		$('.chat').removeClass('hide-chatbar');
	}
});

if($('.emoj-action').length > 0) {
	$(".emoj-action").on('click', function () {
		$('.emoj-group-list').toggle();
	});
}

if($('.emoj-action-foot').length > 0) {
	$(".emoj-action-foot").on('click', function () {
		$('.emoj-group-list-foot').toggle();
	});
}

if($('.custom-input').length > 0) {
	const inputRange = document.querySelector('.custom-input');

	inputRange.addEventListener('input', function () {
		const progress = (inputRange.value - inputRange.min) / (inputRange.max - inputRange.min) * 100;
		inputRange.style.background = `linear-gradient(to top, var(--md-sys-color-on-surface-variant) 0%, var(--md-sys-color-on-surface-variant) ${progress}%, var(--md-sys-color-surface-variant) ${progress}%, var(--md-sys-color-surface-variant) 100%)`;
	});
}

// Mute Video
	
if($('.mute-video').length > 0) {
	$(".mute-video").on('click', function(){
		if($(this).hasClass("stop")) {
			$(this).removeClass("stop");
			$(".mute-video i").removeClass("bx-video-off");
			$(".mute-video i").addClass("bx-video");
			$(".join-call .join-video").removeClass("video-hide");
			$(".video-avatar").removeClass("active");
			$(this).attr("data-bs-original-title","Stop Camera");
			$(".meeting .join-video.user-active").removeClass("video-hide");
			
			$(".join-video.user-active .more-icon").removeClass("vid-view");				
			$(".action-info.vid-view li .mute-vid i").removeClass("feather-video-off");
			$(".action-info.vid-view li .mute-vid i").addClass("feather-video");
		}
		else{
			$(this).addClass("stop");
			$(".mute-video i").removeClass("bx-video");
			$(".mute-video i").addClass("bx-video-off");
			$(".join-call .join-video").addClass("video-hide");
			$(".video-avatar").addClass("active");
			$(this).attr("data-bs-original-title","Start Camera");
			$(".meeting .join-video.user-active").addClass("video-hide");
			
			$(".add-list .user-active .action-info").addClass("vid-view");
			$(".action-info.vid-view li .mute-vid i").removeClass("feather-video");
			$(".action-info.vid-view li .mute-vid i").addClass("feather-video-off");
		}
	});
}

// Mute Audio

if($('.mute-bt').length > 0) {
	$(".mute-bt").on('click', function(){
		if($(this).hasClass("stop")) {
			$(this).removeClass("stop");
			$(".mute-bt i").removeClass("bx-microphone-off");
			$(".mute-bt i").addClass("bx-microphone");
			$(this).attr("data-bs-original-title","Mute Audio");
			$(".join-video.user-active .more-icon").removeClass("mic-view");
			
			$(".action-info.vid-view li .mute-mic i").removeClass("feather-mic-off");
			$(".action-info.vid-view li .mute-mic i").addClass("feather-mic");
		}
		else{
			$(this).addClass("stop");
			$(".mute-bt i").removeClass("bx-microphone");
			$(".mute-bt i").addClass("bx-microphone-off");
			$(this).attr("data-bs-original-title","Unmute Audio");				
			$(".join-video.user-active .more-icon").addClass("mic-view");
			
			$(".add-list .user-active .action-info").addClass("vid-view");
			$(".action-info.vid-view li .mute-mic i").removeClass("feather-mic");
			$(".action-info.vid-view li .mute-mic i").addClass("feather-mic-off");
		}
	});
}

// Mute User Audio

if($('.other-mic-off').length > 0) {
	$(".other-mic-off i").on('click', function(){
		if($(this).parent().hasClass("stop")) {
			$(this).parent().removeClass("stop");
			$(this).removeClass("bx-microphone-off");
			$(this).addClass("bx-microphone");
		}
		else{
			$(this).parent().addClass("stop");
			$(this).removeClass("bx-microphone");
			$(this).addClass("bx-microphone-off");
		}
	});
}

// Mute User Video
	
if($('.other-video-off').length > 0) {
	$(".other-video-off i").on('click', function(){
		if($(this).parent().hasClass("stop")) {
			$(this).parent().removeClass("stop");
			$(this).removeClass("bx-video-off");
			$(this).addClass("bx-video");
		}
		else{
			$(this).parent().addClass("stop");
			$(this).removeClass("bx-video");
			$(this).addClass("bx-video-off");
		}
	});
}


// POS Category Slider
if($('.video-slide').length > 0) {      
	$('.video-slide').owlCarousel({
		items: 4,
		loop:true,
		margin:24,
		nav:true,
		dots: false,
		autoplay:true,
		smartSpeed: 1000,
		navText: ['<i class="fa fa-angle-left" data-bs-toggle="tooltip" title="fa fa-angle-left"></i>', '<i class="fa fa-angle-right" data-bs-toggle="tooltip" title="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			500:{
				items:1
			},
			768:{
				items:3
			},
			991:{
				items:3
			},
			1200:{
				items:4
			},
			1401:{
				items:4
			}
		}
	})
}


//Chat Resize

$(".close_profile").on("click", function () {
	$('.right-user-side').removeClass('open-message');
	$('.chat-center-blk .card-comman').addClass('chat-center-space');
});
$(".profile-open").on("click", function () {
	$('.right-user-side').removeClass('add-setting');
	$('.chat-center-blk .card-comman').removeClass('chat-center-space');
});

//Call Resize

$("#call-chat").on("click", function () {
	$('.right-user-side').addClass('open-message');
	$('.video-screen-inner').addClass('video-space');
});
$(".close_profile").on("click", function () {
	$('.right-user-side').removeClass('open-message');
	$('.video-screen-inner').removeClass('video-space');
	$('.right-side-party').removeClass('open-message');
	$('.meeting-list').removeClass('add-meeting');
	$('#chat-room').removeClass('open-chats');
	$('.meeting-list').removeClass('add-meeting');
	$('.call-user-side').addClass('add-setting');
});
$("#add-partispant").on("click", function () {
	$('.right-side-party').addClass('open-message');
	$('#chat-room').removeClass('open-chats');
	$('.meeting-list').addClass('add-meeting');
});
$("#show-message").on("click", function () {
	$('#chat-room').addClass('open-chats');
	$('.right-side-party').removeClass('open-message');
	$('.meeting-list').addClass('add-meeting');
});



//Chat Search Visible
$('.chat-search-btn').on('click', function () {
	$('.chat-search').addClass('visible-chat');
});
$('.close-btn-chat').on('click', function () {
	$('.chat-search').removeClass('visible-chat');
});
$(".chat-search .form-control").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$(".chat .chat-body .messages .chats").filter(function() {
	  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
});
	  

});
function toggleFullscreen(elem) {
	elem = elem || document.documentElement;
	if (!document.fullscreenElement && !document.mozFullScreenElement &&
	  !document.webkitFullscreenElement && !document.msFullscreenElement) {
	  if (elem.requestFullscreen) {
		elem.requestFullscreen();
	  } else if (elem.msRequestFullscreen) {
		elem.msRequestFullscreen();
	  } else if (elem.mozRequestFullScreen) {
		elem.mozRequestFullScreen();
	  } else if (elem.webkitRequestFullscreen) {
		elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	  }
	} else {
	  if (document.exitFullscreen) {
		document.exitFullscreen();
	  } else if (document.msExitFullscreen) {
		document.msExitFullscreen();
	  } else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	  } else if (document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	  }
	}
  }

  //Increment Decrement Numberes
	$(".quantity-btn").on("click", function () {

        var $button = $(this);
        var oldValue = $button.closest('.product-quantity').find("input.quntity-input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.closest('.product-quantity').find("input.quntity-input").val(newVal);
	});

		// Custom Country Code Selector

		if ($('#phone').length > 0) {
			var input = document.querySelector("#phone");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		// Custom Country Code Selector

		if ($('#phone2').length > 0) {
			var input = document.querySelector("#phone2");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		if ($('#phone3').length > 0) {
			var input = document.querySelector("#phone3");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		// Remove Product
		$(document).on("click",".remove-product",function () {
			$(this).parent().parent().hide();
		});

		// Datetimepicker time

	if ($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: 'HH:mm A',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}

	$(".add-extra").on('click', function () {

		var servicecontent = '<div class="row">' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<div class="add-newplus">' +
			'<label>Category</label>' +
			'</div>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<label>Choose Category</label>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="d-flex align-items-center">' +
			'<div class="form-group w-100 add-product">' +
			'<label>Sub Category</label>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'<div class="input-blocks">' + 
			'<a href="#" class="btn btn-danger-outline trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>' +
			'</div>';
			
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
		$(".addservice-info").append(servicecontent);
		return false;
	});

	$(".add-extra-item-two").on('click', function () {

		var servicecontent = '<div class="row">' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<div class="add-newplus">' +
			'<label>Brand</label>' +
			'</div>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<label>Unit</label>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="d-flex align-items-center">' +
			'<div class="form-group w-100 add-product">' +
			'<label>Selling Type</label>' +
			'<select class="select">' +
			'<option>Choose</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'<div class="input-blocks">' + 
			'<a href="#" class="btn btn-danger-outline trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>' +
			'</div>';
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
			

		$(".add-product-new").append(servicecontent);
		return false;
	});

		// Remove Gallery
		$(document).on("click",".remove-color",function () {
			$(this).parent().parent().parent().hide();
		});
	
	// Collapse Header
	if($('#btnFullscreen').length > 0) {
		document.getElementById('btnFullscreen').addEventListener('click', function() {
			toggleFullscreen();
		  });
	}


$(document).ready(function(){
	
	if($('#collapse-header').length > 0) {
		document.getElementById('collapse-header').onclick = function() {
		    this.classList.toggle('active');
		    document.body.classList.toggle('header-collapse');
		}
	}
	if($('#file-delete').length > 0) {
		$("#file-delete").on("click", function () {
			$('.deleted-table').addClass('d-none');
			$('.deleted-info').addClass('d-block');
		});
	}
	// POS Category Slider
	if($('.pos-category').length > 0) {      
		$('.pos-category').owlCarousel({
			items: 6,
			loop:false,
			margin:8,
			nav:true,
			dots: false,
			autoplay:false,
			smartSpeed: 1000,
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0:{
					items:2
				},
				500:{
					items:3
				},
				768:{
					items:4
				},
				991:{
					items:5
				},
				1200:{
					items:6
				},
				1401:{
					items:6
				}
			}
		})
	}

	if($('.folders-carousel').length > 0) {
		$('.folders-carousel').owlCarousel({
		    loop:true,
		    margin:15,
		    items:2,
		    nav:true,
		    dots: false,
		    // stageOuterClass: 'owl-stage-outer overflow-visible',
		    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
		  	responsive:{
		  		0: {
					items: 1
				},
				768: {
					items: 2
				},
				1400: {
					items: 3
				}
		    }
		});
	}

	// Files Slider
	if($('.files-carousel').length > 0) {      
		$('.files-carousel').owlCarousel({
			items: 3,
			loop:true,
			margin:15,
			nav:true,
			dots: false,
			smartSpeed: 1000,
			// stageOuterClass: 'owl-stage-outer overflow-visible',
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		})
	}

	if($('.video-section').length > 0) {
		$('.video-section').owlCarousel({
		    loop:true,
		    margin:15,
		    items:3,
		    nav:true,
		    dots: false,
		    // stageOuterClass: 'owl-stage-outer overflow-visible',
		    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		});

		var playerSettings = {
		      controls : ['play-large'],
		      fullscreen : { enabled: false},
		      resetOnEnd : true,
		      hideControls  :true,
	  			clickToPlay:true,
		      keyboard : false,
		    }

		const players = Plyr.setup('.js-player', playerSettings);

		 players.forEach(function(instance,index) {
		            instance.on('play',function(){
		                players.forEach(function(instance1,index1){
		                  if(instance != instance1){
		                        instance1.pause();
		                    }
		                });
		            });
		        });

		$('.video-section').on('translated.owl.carousel', function (event) {
		  players.forEach(function(instance,index1){
		                  instance.pause();
		                });
		});
	}
	if($('.video-section').length > 0 || ('.files-carousel').length > 0 || ('.folders-carousel').length > 0) {
		$('.video-section, .files-carousel, .folders-carousel')
	    .each(function() {
	      let carousel = $(this);
	      carousel.on('show.bs.dropdown', '[data-bs-toggle=dropdown]', function() {
	      	// universal solution
	        let dropdown = bootstrap.Dropdown.getInstance(this);
	        $(dropdown._menu).insertAfter(carousel);

			//alternative for this particular layout
	        $(this).next('.dropdown-menu').insertAfter(carousel);
	      });
	    })
	}

	// Increment Decrement

	$(".inc").on('click', function() {
	    updateValue(this, 1);
	});
	$(".dec").on('click', function() {
	    updateValue(this, -1);
	});
	function updateValue(obj, delta) {
	    var item = $(obj).parent().find("input");
	    var newValue = parseInt(item.val(), 10) + delta;
	    item.val(Math.max(newValue, 0));
	}

	

	//common Sidebar Toggle Fun
	if($('.popup-toggle').length > 0) {
		$(".popup-toggle").click(function(){
			$(".toggle-sidebar").addClass("open-sidebar");
		});
		$(".sidebar-closes").click(function(){
			$(".toggle-sidebar").removeClass("open-sidebar");
		});
	}
	setTimeout(function(){$('#upload-file').modal('hide')},4000);
	setTimeout(function(){$('#upload-folder').modal('hide')},4000);
	$(".upload-modal").on("hidden.bs.modal", function () {
		// alert('modal closed');
		$(".upload-message").modal('show');
	  	setTimeout(function(){$('.upload-message').modal('hide')},3000);
	});

	  /* card with fullscreen */
	  let DIV_CARD = ".card";
	  let cardFullscreenBtn = document.querySelectorAll(
		'[data-bs-toggle="card-fullscreen"]'
	  );
	  cardFullscreenBtn.forEach((ele) => {
		ele.addEventListener("click", function (e) {
		  let $this = this;
		  let card = $this.closest(DIV_CARD);
		  card.classList.toggle("card-fullscreen");
		  card.classList.remove("card-collapsed");
		  e.preventDefault();
		  return false;
		});
	  });
	  /* card with fullscreen */

	    /* card with close button */
  		let DIV_CARD_CLOSE = ".card";
		let cardRemoveBtn = document.querySelectorAll(
			'[data-bs-toggle="card-remove"]'
		);
		cardRemoveBtn.forEach((ele) => {
			ele.addEventListener("click", function (e) {
			e.preventDefault();
			let $this = this;
			let card = $this.closest(DIV_CARD_CLOSE);
			card.remove();
			return false;
			});
		});
		/* card with close button */

	// Sidebar popup overlay
	
	if($('.add-popup').length > 0) {
		$(".add-popup").on("click", function () {
			$('.toggle-popup').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}

	if($('.add-popups').length > 0) {
		$(".add-popups").on("click", function () {
			$('.toggle-popup2').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup2').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup2').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}

	if($('.add-popups').length > 0) {
		$(".add-popups").on("click", function () {
			$('.toggle-popup2').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close2").on("click", function () {
			$('.toggle-popup2').removeClass('sidebar-popup');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup2').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}


	if($('.add-popups-sent').length > 0) {
		$(".add-popups-sent").on("click", function () {
			$('.toggle-popup-sent').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup-sent').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup-sent').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}

	if($('.add-popups-draft').length > 0) {
		$(".add-popups-draft").on("click", function () {
			$('.toggle-popup-draft').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup-draft').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup-draft').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}

	if($('.add-popups-declined').length > 0) {
		$(".add-popups-declined").on("click", function () {
			$('.toggle-popup-declined').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup-declined').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup-sent').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
	}

	if($('.toggle-signnow').length > 0) {
		$(".toggle-signnow").on("click", function () {
			$('.toggle-popup-sign').addClass('sidebar-popup');
			$('.sidebar-popoverlay-sign').addClass('open');
		});
		$(".sidebar-close-sign").on("click", function () {
			$('.toggle-popup-sign').removeClass('sidebar-popup');
			$('.sidebar-popoverlay-sign').removeClass('open');
		});
		$('.sidebar-popoverlay-sign').on('click', function () {
			$('.toggle-popup-sign').removeClass('sidebar-popup');
			$('.sidebar-popoverlay-sign').removeClass('open');
		});
	}


	if($('.view-popup').length > 0) {
		$(".view-popup").on("click", function () {
			$('.toggle-popups').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close").on("click", function () {
			$('.toggle-popup2').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-close-view').on('click', function () {
			$('.toggle-popups').removeClass('sidebar-popup');
		});
	}
	$(".sidebar-close-payments").on("click", function () {
		$('.toggle-popup1').removeClass('sidebar-popup');
		$('.sidebar-popoverlay').removeClass('open');
	});

	setTimeout(function(){		
		$(".edit-popup").on("click", function () {
			$('.toggle-popup1').addClass('sidebar-popup');
			$('.sidebar-popoverlay').addClass('open');
		});
		$(".sidebar-close1").on("click", function () {
			$('.toggle-popup1').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		$('.sidebar-popoverlay').on('click', function () {
			$('.toggle-popup1').removeClass('sidebar-popup');
			$('.sidebar-popoverlay').removeClass('open');
		});
		
	},100);

	// Select Checkbox 

	if($('.select-people-checkbox').length > 0) {
		$(document).on('click', '.select-people-checkbox', function() {
			$(this).toggleClass('checkbox-checked');
			$(this).find("input").attr('checked', 'checked');
			if($(this).hasClass('checkbox-checked')) {
				$(this).find("input").attr('checked', 'checked');
			}
			else {
				$(this).find("input").removeAttr('checked', '');
			}
			return false;
		});
	}

	// Add Sign
	$(document).on('click', '.trash-sign', function () {
		$(this).closest('.sign-cont').remove();
		return false;
	});
	$(document).on('click','.add-sign',function(){

		var signcontent = '<div class="row sign-cont">' +
			'<div class="col-md-6">' +
				'<div class="form-wrap">' +
					'<input class="form-control" type="text" placeholder="Enter Name">' +
				'</div>' +
			'</div>' +
			'<div class="col-md-6">' +
				'<div class="d-flex align-items-center">' +    
					'<div class="form-wrap w-100 me-3">' +    
					'<input class="form-control" type="text" placeholder="Email Address">' +    
					'</div>' +
					'<div class="input-btn mb-3">' +
						'<a href="javascript:void(0);" class="trash-sign"><i class="ti ti-trash"></i></a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>';
		$(".sign-content").append(signcontent);
		return false;
	});

	// Add Comment

	if($('.add-comment').length > 0) {
		$(".add-comment").on("click", function() {
		  $(this).closest(".notes-editor").children(".note-edit-wrap").slideToggle();
		});
		$(".add-cancel").on("click", function() {
		  $(this).closest(".note-edit-wrap").slideUp();
		});
	}

	// Contact Wizard
	$(".add-info-fieldset .wizard-next-btn").on('click', function () { // Function Runs On NEXT Button Click
		$(this).closest('fieldset').next().fadeIn('slow');
		$(this).closest('fieldset').css({
			'display': 'none'
		});
		// Adding Class Active To Show Steps Forward;
		$('.progress-bar-wizard .active').removeClass('active').addClass('activated').next().addClass('active');
	});

	// Collapse Header

	if($('#collapse-header').length > 0) {
		document.getElementById('collapse-header').onclick = function() {
		    this.classList.toggle('active');
		    document.body.classList.toggle('header-collapse');
		}
	}

	setTimeout(function(){
		$(".rating-select").on('click', function() {
			$(this).toggleClass("filled");
		});
	},100);
	
	// Kanban Drag

	if($('.kanban-drag-wrap').length > 0) {
		$(".kanban-drag-wrap").sortable({
			connectWith: ".kanban-drag-wrap",
			handle: ".kanban-card",
			placeholder: "drag-placeholder"
		});
	}

	// themesettings
	$('.toggle-theme').on('click', function () {
		$('.sidebar-themesettings').toggleClass('open');
		$('.sidebar-themeoverlay').addClass('open');
		$('body').addClass('overflow-hidden');
	});
	
	$('#theme-settings,.close-theme').on('click', function () {
		$('.sidebar-themesettings').removeClass('open');
		$('.sidebar-themeoverlay').removeClass('open');
		$('body').removeClass('overflow-hidden');
	});
	$('.sidebar-themeoverlay').on('click', function () {
		$('.sidebar-themesettings').removeClass('open');
		$('.sidebar-themeoverlay').removeClass('open');
		$('body').removeClass('overflow-hidden');
	});

	// Form Wizard step
	var tooltipTriggerList = [].slice.call(
		document.querySelectorAll('[data-bs-toggle="tooltip"]')
	);
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});

	//Advance Tabs
	$(".next").on('click', function () {
		const nextTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.next("li")
			.find("a")[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();
	});

	$(".previous").on('click', function () {
		const prevTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.prev("li")
			.find("a")[0];
		const prevTab = new bootstrap.Tab(prevTabLinkEl);
		prevTab.show();
	});

	$(".add-new-phone").on('click', function () {

		var servicecontent = '<div class="row align-items-end">' +
			'<div class="col-md-8">' +
			'<div class="form-wrap mb-2">' +
			'<label class="col-form-label">Phone <span class="text-danger">*</span></label>' +
			'<input type="text" class="form-control" value="+1 875455453">' +
			'</div>' +
			'</div>' +
			'<div class="col-md-4 d-flex align-items-center">' +
			'<div class="form-wrap w-100 mb-2">' +
			'<select class="select">' +
			'<option>Work</option>' +
			'<option>Home</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'</div>';
			
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
			

		$(".add-product-new").append(servicecontent);
		return false;
	});



	(() => {
		'use strict'
	  
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll('.needs-validation')
	  
		// Loop over them and prevent submission
		Array.from(forms).forEach(form => {
		  form.addEventListener('submit', event => {
			if (!form.checkValidity()) {
			  event.preventDefault()
			  event.stopPropagation()
			}
	  
			form.classList.add('was-validated')
		  }, false)
		})
	  })()
	
});



