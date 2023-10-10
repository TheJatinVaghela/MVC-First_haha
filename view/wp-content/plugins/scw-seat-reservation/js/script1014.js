
jQuery(document).ready(function(){
	
	var url = jQuery(".smartcms_url").val();
	var proId = jQuery(".smartcms_proid").val();
	var postype = jQuery(".smartcms_posttype").val();
	var compulsory = jQuery(".smartcms_compulsory").val();
	
	if(postype == "post")
		jQuery(".smartcms_content").show();
	else
		jQuery("form[class='cart']").before(jQuery(".smartcms_content").show());
	
	if(compulsory == "yes"){
		jQuery(".single_add_to_cart_button").prop("disabled", true);
	}
	
	if(jQuery('#scw_schedules_picker').size() > 0){
		var array_dates = jQuery(".array_dates").val();
		var array_times = jQuery(".array_times").val().split(",");
		
		jQuery('#scw_schedules_picker').datetimepicker({
			disabledWeekDays: array_dates,
			allowTimes: array_times,
			format: 'd/m/Y H:i',
			onSelectTime:function(ct, $i){
				checkSchedule($i[0].value);
			},
			onSelectDate:function(ct,$i){
				checkSchedule($i[0].value);
			}
		});
	}else{
		jQuery(".smartcms_content_schedules_item").each(function(){
			jQuery(this).click(function(){
				jQuery(".smartcms_content_schedules_item").removeClass("active");
				jQuery(this).addClass("active");
				
				var schedule = jQuery(this).children(".smartcms_content_schedules_item_value").val();
				
				checkSchedule(schedule);
			});
		});
	}
	
	function checkSchedule(schedule){
		jQuery.ajax({
			url: url+"helper.php",
			data: {
				schedule : schedule,
				proId: proId,
				mapid: jQuery(".smartcms_mapid").val(),
				task : "check_seats"
			},
			type: 'POST',
			beforeSend: function(e){
				jQuery(".smartcms_content_mapping").css("opacity", "0.5");
			},
			success: function(data){
				jQuery(".smartcms_content_mapping").css("opacity", "1");
				jQuery(".smartcms_content_mapping_item_con").removeClass("active");
					
				jQuery(".smartcms_content_mapping_item_con.disable").each(function(){
					var real = jQuery(this).children(".real_color").val();
					jQuery(this).children(".srwseat_item_con_color").attr("style", "background: "+real);
					jQuery(this).removeClass("disable");
				});
				if(data.length > 0){
					jQuery.each(data, function(key, val){
						var idseat = val.replace(".", "");
						var booked = jQuery("#"+idseat).children(".booked_color").val();
						jQuery("#"+idseat).addClass("disable");
						jQuery("#"+idseat).children(".srwseat_item_con_color").attr("style", "background: "+booked);
					});
				}
			},
			dataType: "json"
		});
	}
	
	jQuery(".smartcms_content_mapping_item_con").each(function(){
		var elthis = jQuery(this);
		elthis.click(function(){
			if(jQuery("#scw_schedules_picker").size() > 0 || jQuery(".smartcms_content_schedules_item").size() > 0 ){
				var checkDT = jQuery(".smartcms_content_schedules_item.active").children(".smartcms_content_schedules_item_value").val();
				if(!checkDT)
					checkDT = jQuery("#scw_schedules_picker").val();
			}else
				var checkDT = "ok";
			
			if(checkDT){
				if( !elthis.hasClass("disable") ){
					if( elthis.hasClass("active") )
						elthis.removeClass("active");
					else
						elthis.addClass("active");
					
					var seats = "";
					jQuery(".smartcms_content_mapping_item_con.active").each(function(){
						var seat = jQuery(this).children(".srwseat_item_con_seat").text();
						if(seats)
							seats += "@"+seat;
						else
							seats += seat;
					});
					
					var datetime = jQuery(".smartcms_content_schedules_item.active").children(".smartcms_content_schedules_item_value").val();
					if(!datetime)
						datetime = jQuery("#scw_schedules_picker").val();
					
					jQuery.ajax({
						url: url+"helper.php",
						data: {
							seats : seats,
							proId: proId,
							task : "choose_seat_product",
							postype: postype,
							datetime: datetime
						},
						type: 'POST',
						beforeSend: function(e){
							jQuery(".smartcms_content_mapping").css("opacity", "0.5");
						},
						success: function(data){
							jQuery(".smartcms_content_mapping").css("opacity", "1");
							if(postype == "post"){
								jQuery(".scw_total_value").text(data);
							}
							
							if(compulsory == "yes"){
								if(jQuery(".smartcms_content_mapping_item_con.active").size() > 0)
									jQuery(".single_add_to_cart_button").prop("disabled", false);
								else
									jQuery(".single_add_to_cart_button").prop("disabled", true);
							}
						}
					});
				}
			}else{
				alert("Please choose schedule before!");
			}
		});
	});
	
	///////////////////
	if(postype == "post"){
		jQuery(".scw_form_submit").click(function(){
			var name = jQuery(".scw_form_name_input").val();
			var address = jQuery(".scw_form_address_input").val();
			var email = jQuery(".scw_form_email_input").val();
			var phone = jQuery(".scw_form_phone_input").val();
			var note = jQuery(".scw_form_note_input").val();
			var total = jQuery(".scw_total_value").text().trim();
			
			var seats = "";
			jQuery(".smartcms_content_mapping_item_con.active").each(function(){
				var s = jQuery(this).children(".srwseat_item_con_seat").text().trim();
				if(seats)
					seats += "@"+s;
				else
					seats += s;
			});
			var schedule = jQuery(".smartcms_content_schedules_item.active").children(".smartcms_content_schedules_item_value").val();
			
			if(seats){
				jQuery.ajax({
					url: url+"helper.php",
					data: {
						name: name,
						address: address,
						email: email,
						phone: phone,
						note: note,
						proId: proId,
						total: total,
						seats: seats,
						schedule: schedule,
						task : "send_mail"
					},
					type: 'POST',
					beforeSend: function(data){
						jQuery(".scw_sendform").css("opacity", "0.5");
					},
					success: function(data){
						jQuery(".scw_sendform").css("opacity", "1");
						if(data == "1")
							alert("We got the order, will contact you soon!");
						else
							alert("Error!");
					}
				});
			}
		});
	}
});