



// Super Wheel Script
jQuery(document).ready(function($){
	
	
	
	
	$('.wheel-with-image').superWheel({
		slices: [
		{
			text: '/images/1.png',
			value: 5,
			message: "คุณได้รับ 5 เครดิต",
			background: "#122752",
	    	custom_key: 5
			
		},
		{ 
			text: '/images/7.png',
			value: 1000,
			message: "คุณได้รับ 1000 เครดิต",
			background: "#122752",
	    	custom_key: 1000
			
		},
		{
			text: '/images/2.png',
			value: 10,
			message: "คุณได้รับ 10 เครดิต",
			background: "#eaeaea",
	    	custom_key: 10
			
		},
		{
			text: '/images/6.png',
			value: 500,
			message: "คุณได้รับ 500 เครดิต",
			background: "#eaeaea",
	    	custom_key: 500
			
		},
		{
			text: '/images/3.png',
			value: 20,
			message: "คุณได้รับ 20 เครดิต",
			background: "#122752",
	    	custom_key: 20
			
		},
		{ 
			text: '/images/5.png',
			value: 100,
			message: "คุณได้รับ 100 เครดิต",
			background: "#122752",
	    	custom_key: 100
			
		},
		{
			text: '/images/4.png',
			value: 50,
			message: "คุณได้รับ 50 เครดิต",
			background: "#eaeaea",
	    	custom_key: 50
			
		}
	],
	text : {
		type: 'image',
		color: '#00d254',
		size: 25,
		offset : 10,
		orientation: 'h'
		
	},
	width: 400,
	frame: 1,
	type: "color",
		slice: {
		selected: {
			background: "#00d254"
		}
	},

	line: {
		width: 0,
		color: "#78909C"
	},
	outer: {
		
		width: 10,
		color: "#131f37",
		
	},
	inner: {
		width: 15,
		color: "#152235"
	},
	marker: {
		background: "#00BCD4",
		animate: 1
	},
	center: {

    width: 30,
    background: '#FFFFFF00',
    rotate: true,
    class: "",
    image:{
      url: "/images/center.png",
      width: 45
    },
		width: 10,
		rotate: true,
		
	},
	
	selector: "value",
	
	
	
	});
	
	var falling = new Audio('/dairy-reward/media/coin.mp3');
	
	var tick = new Audio('/dairy-reward/media/tick.mp3');
	
	$(document).on('click','.wheel-with-image-spin-button',function(e){
		

		$(this).prop('disabled',true);
		$.ajax({
                                dataType : "json",
                                type : "POST",
                                data : { "spin":1 }, 
                                url :'/wheellogs/addwheelresult', 
                                success : function(data){
                            
                                       if(data.status=='error'){

                                           swal({
												type: 'error',
												title: "เกิดข้อผิดพลาด!", 
												html: data.message
											});

                                           $('.wheel-with-image-spin-button:disabled').prop('disabled',true).text('คุณใช้สิทธิหมุนหมดแล้ว');

                                        }else if(data.status=='success'){

                                        		$('.wheel-with-image').superWheel('start','value',data.coin_wheel);
												$('.wheel-with-image').prop('disabled',true);

												$('#curr_coins').val(data.current_coin);
												$('#curr_round').val(data.round);
                                        	
                                           //   $('.wheel-with-image-spin-button:disabled').prop('disabled', false).text('หมุนได้ ' + data.current_coin+' ครั้ง');
                                        }

                                       

                            	} 
                        });
	});
	
	


	
	$('.wheel-with-image').superWheel('onStart',function(results){
		
		
		 $('.wheel-with-image-spin-button:disabled').prop('disabled',true).text('ตั้งจิตอธิษฐาน..');
		$(this).prop('disabled',true);
		
		
	});

	$('.wheel-with-image').superWheel('onStep',function(results){
		
		if (typeof tick.currentTime !== 'undefined')
			tick.currentTime = 0;
        
		tick.play();
		
	});
	
	
	$('.wheel-with-image').superWheel('onComplete',function(results){
		
					 
                                     
										   var cart = $('#coin-fly');
										   var imgtodrag = $('.sw-ccurrent img');
										 
											 if (imgtodrag[0]) {
												 var imgclone = imgtodrag.clone()
													 .offset({
														 top: imgtodrag.offset(),
														 left: imgtodrag.offset()
													 })
													 .css({
														 'opacity': '0.8',
														 'position': 'absolute',
														 'height': '150px',
														 'width': '150px',
														 'z-index': '999'
													 })
													 .appendTo($('body'))
													 .animate({
														 'top': cart.offset() + 15,
														 'left': cart.offset() + -15,
														 'width': 75,
														 'height': 75
													 }, 1000, 'easeInOutExpo');

												 setTimeout(function () {
													 cart.effect("shake", {
														 
														 times: 2
													 }, 200);
													 falling.play();
												 }, 300);


												 imgclone.animate({
													 'width': 0,
													 'height': 0
												 }, function () {
														 $(this).detach()
														 $('#coin-fly').text($('#curr_coins').val());
												 });
											 }

											 swal({
											type: 'success',
											title: "ขอแสดงความยินดีปรีดา!",
											html: results.message
										});


											 var round = $('#curr_round').val();

											if(round==0){
                                           		$('.wheel-with-image-spin-button:disabled').prop('disabled',true).text('คุณใช้สิทธิหมุนหมดแล้ว');
                                           }else{
                                           		$('.wheel-with-image-spin-button:disabled').prop('disabled',false).text('หมุนได้ '+round+' ครั้ง');
                                           }
			

	
                                        
	});
	
	
	
	
	
});