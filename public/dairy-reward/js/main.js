



// Super Wheel Script
jQuery(document).ready(function($){
	
	

	
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

												$('#curr_balance').val(data.current_balance);
												$('#curr_coins').val(data.current_coin);

												$('#curr_coins_text').val(data.coins_text);
												$('#curr_balance_text').val(data.balance_text);

												$('#coins_text').text(data.coins_text);

												
                                        	
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


											var current_coins = $('#curr_coins').val();
											var current_balance = $('#curr_balance').val();

											var curr_coins_text = $('#curr_coins_text').val();
											var curr_balance_text = $('#curr_balance_text').val();

											$('#coins_text').text(curr_coins_text);
											$('#balance_text').text(curr_balance_text);



											if(current_coins<100){
                                           		$('.wheel-with-image-spin-button:disabled').prop('disabled',true).text('คุณใช้สิทธิหมุนหมดแล้ว');
                                           }else{
                                           		$('.wheel-with-image-spin-button:disabled').prop('disabled',false).text('หมุนเลย');
                                           }
			

	
                                        
	});
	
	
	
	
	
});