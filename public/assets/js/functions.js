//show data from database onload
$(document).ready(function(){
	gswd_GetDatabase();
	// gswd_GetDatabaseJSONFile('sample.json') //bisa juga URL
	// gswd_GetDatabaseJSON_Ajax('http://127.0.0.1:8000/sample.json')
});

/* LINK-Link Submit | START *****************/
$(document).on('click', 'button.gswd_btnLinkSubmit', function(e) {
	gswd_btnLinkSubmit($(this));
	// pindah kesini save satu2 setelah submit
	// gswd_LinkItemSave($(this));
	// gswd_SosmedItemSave($(this));
});

/* LINK-Link Remove | START *****************/
$(document).on('click', 'a.gswd_linkItemRemove', function(e) {
	e.preventDefault();
	gswd_linkItemRemove($(this));
});

/* SOSMED-Sosmed Add | START *****************/
$(document).on('click', '#gswd_sosmedItem a', function(e) {
	e.preventDefault();
	gswd_sosmedItem($(this));
});

/* SOSMED-Sosmed Remove | START *****************/
$(document).on('click', 'a.gswd_sosmedItemRemove', function(e) {
	e.preventDefault();
	gswd_sosmedItemRemove($(this));
});

/* SOSMED-Sosmed Value Change | START *****************/
$(document).on('keyup', '.gswd_sosmedFieldInput', function(e) {
	// e.preventDefault();
	// alert('masuk');
	gswd_sosmedItemChange($(this));
});

// Link Button Simpan Click
$(document).on('click', 'button.gswd_btnSave', function(e) {
	e.preventDefault();
	gswd_LinkItemSave($(this));
});

// Sosmed Button Simpan Click
$(document).on('click', 'button.gswd_btnSosmedSave', function(e) {
		e.preventDefault();
		gswd_SosmedItemSave($(this));
});

/* BUTTON ALERT CLOSE | START *****************/
$(document).on('click', '.gswd_alertResponseClose', function(e) {
	$('.gswd_alertResponse').fadeOut('fast');
});

//Add Button Simpan Link
var gswd_btnSave = '' +
'<div id="gswd_btnSave" class="form-group text-right">' +
	'<button type="submit" class="gswd_btnSave btn btn-success rounded-pill"><i class="fa-fw fa fa-save"></i> Save All</button>' +
'</div>';

//Add Button Simpan Sosmed
var gswd_btnSosmedSave = '' +
'<div id="gswd_btnSosmedSave" class="form-group text-right">' +
	'<button type="submit" class="gswd_btnSosmedSave btn btn-success rounded-pill"><i class="fa-fw fa fa-save"></i> Save All</button>' +
'</div>';


function gswd_loadlink(linkValue) {
	var btnSave = $('#gswd_linkInput').find('#gswd_btnSave').length;
	var token = Math.floor((Math.random() * 999999999) + 1);
	var divClone = $('#gswd_fieldLinkAppend').clone().removeAttr('id').removeClass('d-none').addClass('gswd_fieldLinkAppendItemId_' + token);
	var divhpClone = $('#tampilanhp').clone().removeAttr('id').removeClass('d-none').addClass('tampilanhpItemId_' + token);
	var divReplace = divClone.find('.gswd_linkThumbnail, .gswd_linkHref, .gswd_linkHrefAlt, .gswd_linkTitle, .gswd_linkSwitchId, .gswd_linkSwitchFor, .gswd_linkSwitchAltId, .gswd_linkSwitchAltFor, .gswd_linkItemRemove');
	var divhpReplace = divhpClone.find('.hp_linkHref, .hp_linkHrefAlt, .hp_linkThumbnail, .col-3');
	
	$.each(divReplace, function(k, v) {
		if ($(v).hasClass('gswd_linkThumbnail') === true) {
			$(this).attr('src', '/add_image.png');
			
		} else if ($(v).hasClass('gswd_linkHref') === true) {
			
			$(this).attr('href', linkValue);

		} else if ($(v).hasClass('gswd_linkHrefAlt') === true) {
			$(this).html('<i class="fa-fw fa fa-location-arrow mr-1"></i>' + linkValue);
		
		} else if ($(v).hasClass('gswd_linkTitle') === true) {
			var trueLinkValue
			trueLinkValue = linkValue.replace("https://","");
			trueLinkValue = trueLinkValue.replace("http://","");
			$(this).html(trueLinkValue);
			
		} else if ($(v).hasClass('gswd_linkSwitchId') === true) {
			$(this).attr('id', 'customSwitch_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchFor') === true) {
			$(this).attr('for', 'customSwitch_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchAltId') === true) {
			$(this).attr('id', 'customSwitchAlt_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchAltFor') === true) {
			$(this).attr('id', 'customSwitchAlt_' + token);
			
		} else if ($(v).hasClass('gswd_linkItemRemove') === true) {
			$(this).attr('data-itemid', token);
		}
	});

	if (btnSave === 0) {
		$(gswd_btnSave).appendTo('#gswd_linkInput #gswd_linkBtn');
	}

	$.each(divhpReplace, function(k, v) {
		if ($(v).hasClass('hp_linkHref') === true) {			
			$(this).attr('href', linkValue);

		} else if ($(v).hasClass('hp_linkHrefAlt') === true) {
			$(this).html(linkValue);

		} else if ($(v).hasClass('col-3') === true) {
		$(this).addClass('text-secondary').html('<i class="fa-fw fa fa-globe"  style="font-size:30px"></i>');
		// } else if ($(v).hasClass('hp_linkThumbnail') === true) {
		// $(this).addClass('d-none');

		}
});

	$('#gswd_linkInput #gswd_linkAlert').fadeOut('fast', function() {
		divClone.prependTo('#gswd_fieldLink').hide().fadeIn('medium');
		divhpClone.prependTo('#tampilan').hide().fadeIn('medium');
	});
}

function gswd_btnLinkSubmit(th) {
	var divCount = $('#gswd_fieldLink').find('.gswd_fieldLinkAppendItem').length;
	var btnSave = $('#gswd_linkInput').find('#gswd_btnSave').length;
	var linkValue = $('#gswd_linkInput input[name=link]').val();
		valLength = $.trim(linkValue).length;
		var x = linkValue.indexOf('http://');
		var y = linkValue.indexOf('https://');
		if (x === -1 || y === -1)
		{
			linkValue = 'http://' + linkValue;
		}
		var expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
		var regex = new RegExp(expression);	
		valCheck = linkValue.match(regex);
		
	if (valLength <= 0) {
		var linkAlert = $('#gswd_linkInput #gswd_linkAlert').show().find('.gswd_linkAlert');
		
		$.each(linkAlert, function() {
			$(this).hide().removeClass('alert-success alert-danger').addClass('alert-danger').html('<i class="fa-fw fa fa-exclamation-triangle"></i> Pastikan Anda sudah mengisi field tautan').fadeIn('fast');
		});

		return;
		
	} else if (valCheck === null) {
		var linkAlert = $('#gswd_linkInput #gswd_linkAlert').show().find('.gswd_linkAlert');
		
		$.each(linkAlert, function() {
			$(this).hide().removeClass('alert-success alert-danger').addClass('alert-danger').html('<i class="fa-fw fa fa-exclamation-triangle"></i> unknown protocol !! example link -> http://fauzidikafandra.com').fadeIn('fast');
		});
		
		return;
			
	} else if (divCount >= 20) {
		var linkAlert = $('#gswd_linkInput #gswd_linkAlert').show().find('.gswd_linkAlert');
		
		$.each(linkAlert, function() {
			$(this).hide().removeClass('alert-success alert-danger').addClass('alert-danger').html('<i class="fa-fw fa fa-exclamation-triangle"></i> Sudah mencapai batas maksimum penambahan tautan').fadeIn('fast');
		});

		return;
	}

	if (btnSave === 0) {
		$(gswd_btnSave).appendTo('#gswd_linkInput #gswd_linkBtn');
	}
	
	var token = Math.floor((Math.random() * 999999999) + 1);
	var divClone = $('#gswd_fieldLinkAppend').clone().removeAttr('id').removeClass('d-none').addClass('gswd_fieldLinkAppendItemId_' + token);
	var divhpClone = $('#tampilanhp').clone().removeAttr('id').removeClass('d-none').addClass('tampilanhpItemId_' + token);
	var divReplace = divClone.find('.gswd_linkThumbnail, .gswd_linkHref, .gswd_linkHrefAlt, .gswd_linkTitle, .gswd_linkSwitchId, .gswd_linkSwitchFor, .gswd_linkSwitchAltId, .gswd_linkSwitchAltFor, .gswd_linkItemRemove');
	var divhpReplace = divhpClone.find('.hp_linkHref, .hp_linkHrefAlt, .hp_linkThumbnail, .col-3');

	$.each(divReplace, function(k, v) {
		if ($(v).hasClass('gswd_linkThumbnail') === true) {
			$(this).attr('src', '/add_image.png');
			
		} else if ($(v).hasClass('gswd_linkHref') === true) {
			$(this).attr('href', linkValue);

		} else if ($(v).hasClass('gswd_linkHrefAlt') === true) {
			$(this).html('<i class="fa-fw fa fa-location-arrow mr-1"></i>' + linkValue);

		} else if ($(v).hasClass('hp_linkHref') === true) {
			$(this).attr('href', linkValue);

		} else if ($(v).hasClass('hp_linkHrefAlt') === true) {
			$(this).html(linkValue);

		} else if ($(v).hasClass('gswd_linkTitle') === true) {
			var trueLinkValue
			trueLinkValue = linkValue.replace("https://","");
			trueLinkValue = trueLinkValue.replace("http://","");
			$(this).html(trueLinkValue);
			
		} else if ($(v).hasClass('gswd_linkSwitchId') === true) {
			$(this).attr('id', 'customSwitch_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchFor') === true) {
			$(this).attr('for', 'customSwitch_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchAltId') === true) {
			$(this).attr('id', 'customSwitchAlt_' + token);
			
		} else if ($(v).hasClass('gswd_linkSwitchAltFor') === true) {
			$(this).attr('id', 'customSwitchAlt_' + token);
			
		} else if ($(v).hasClass('gswd_linkItemRemove') === true) {
			$(this).attr('data-itemid', token);
		}
	});

	$.each(divhpReplace, function(k, v) {
		if ($(v).hasClass('hp_linkHref') === true) {			
			$(this).attr('href', linkValue);

		} else if ($(v).hasClass('hp_linkHrefAlt') === true) {
			$(this).html(linkValue);

		} else if ($(v).hasClass('hp_linkHrefAlt') === true) {
		$(this).html(linkValue);

		} else if ($(v).hasClass('col-3') === true) {
		$(this).addClass('text-secondary').html('<i class="fa-fw fa fa-globe" style="font-size:30px;"></i>');
		} else if ($(v).hasClass('hp_linkThumbnail') === true) {
		$(this).addClass('d-none');

		}
	});

	$('#gswd_linkInput #gswd_linkAlert').fadeOut('fast', function() {
		divClone.prependTo('#gswd_fieldLink').hide().fadeIn('medium');
		divhpClone.prependTo('#tampilan').hide().fadeIn('medium');
	});
	
}

function gswd_linkItemRemove(th) {
	var token = th.attr('data-itemid');
	
	$('#gswd_fieldLink .gswd_fieldLinkAppendItemId_' + token).fadeOut('fast', function() {
		$(this).remove();
		var divCount = $('#gswd_fieldLink').find('.gswd_fieldLinkAppendItem').length;
		
		if (divCount <= 0) {
			$('#gswd_linkInput #gswd_linkBtn #gswd_btnSave').remove();
			var linkAlert = $('#gswd_linkInput #gswd_linkAlert').show().find('.gswd_linkAlert');
			
			$.each(linkAlert, function() {
				$(this).hide().removeClass('alert-success alert-danger').addClass('alert-success').html('<i class="fa-fw fa fa-info-circle"></i> Please enter your link address in the input field above to add ..').fadeIn('fast');
			});
		}
	});

	$('#tampilan .tampilanhpItemId_' + token).fadeOut('fast', function() {
		$(this).remove();
	});
}

function gswd_sosmedItem(th) {
	var divCount = $('#gswd_fieldSosmed .gswd_fieldSosmed').find('.gswd_fieldSosmedItem').length;
	var btnSave = $('#gswd_sosmedItem').find('#gswd_btnSosmedSave').length;
	
	if (divCount >= 20) {
		var linkAlert = $('#gswd_sosmedItem #gswd_sosmedAlert').show().find('.gswd_sosmedAlert');
		
		$.each(linkAlert, function() {
			$(this).hide().removeClass('alert-success alert-danger').addClass('alert-danger').html('<i class="fa-fw fa fa-exclamation-triangle"></i> Sudah mencapai batas maksimum penambahan link media sosial').fadeIn('fast');
		});
		
		return;
		
	}

	if (btnSave === 0) {
		$(gswd_btnSosmedSave).prependTo('#gswd_sosmedItem #gswd_linkBtn');
	}
	
	var token = Math.floor((Math.random() * 999999999) + 1);
	var sosmed = jQuery.parseJSON(th.attr('data-sosmed'));
	var divClone = $('#gswd_fieldSosmedAppend').clone().removeAttr('id').removeClass('d-none').addClass('gswd_sosmedItemId_' + token);
	var divhpClone = $('#tampilanhp').clone().removeAttr('id').removeClass('d-none').addClass('tampilanhpItemId_' + token);
	var divReplace = divClone.find('.gswd_sosmedColor, .gswd_sosmedFieldInput, .gswd_sosmedItemRemove, .hp_linkHref, .hp_linkHrefAlt');
	var divhpReplace = divhpClone.find('.col-3, .hp_linkThumbnail');
	$.each(divReplace, function(k, v) {
		if ($(v).hasClass('gswd_sosmedColor') === true) {
			$(this).addClass('text-' + sosmed.color).html('<i class="' + sosmed.icon + '"></i>');
			
		} else if ($(v).hasClass('gswd_sosmedFieldInput') === true) {
			$(this).attr('name', sosmed.slug).attr('placeholder', sosmed.placeholder);
			$(this).attr('data-itemid', token);

		} else if ($(v).hasClass('gswd_sosmedItemRemove') === true) {
			$(this).attr('data-itemid', token);
		}
	});

	$.each(divhpReplace, function(k, v) {
		if ($(v).hasClass('col-3') === true) {
			$(this).addClass('text-' + sosmed.color).html('<i class="' + sosmed.icon + ' mt-2"  style="font-size:32px"></i>');
		} else if ($(v).hasClass('hp_linkThumbnail') === true) {
			$(this).addClass('d-none');
		}
	});

	$('#gswd_sosmedItem #gswd_sosmedAlert').fadeOut('fast', function() {
		$('#gswd_fieldSosmed').show()
		divClone.prependTo('#gswd_fieldSosmed .gswd_fieldSosmed').hide().fadeIn('medium');
		divhpClone.prependTo('#tampilan').hide().fadeIn('medium');
	});
}

function gswd_loadsosmed(sosmed,sosvalue) {
	var btnSave = $('#gswd_sosmedItem').find('#gswd_btnSosmedSave').length;
	var token = Math.floor((Math.random() * 999999999) + 1);
	// var sosmed = jQuery.parseJSON(th.attr('data-sosmed'));
	var divClone = $('#gswd_fieldSosmedAppend').clone().removeAttr('id').removeClass('d-none').addClass('gswd_sosmedItemId_' + token);
	var divhpClone = $('#tampilanhp').clone().removeAttr('id').removeClass('d-none').addClass('tampilanhpItemId_' + token);
	var divReplace = divClone.find('.gswd_sosmedColor, .gswd_sosmedFieldInput, .gswd_sosmedItemRemove, .hp_linkHref, .hp_linkHrefAlt');
	var divhpReplace = divhpClone.find('.col-3, .hp_linkThumbnail, .hp_linkHrefAlt');
	$.each(divReplace, function(k, v) {
		if ($(v).hasClass('gswd_sosmedColor') === true) {
			$(this).addClass('text-' + sosmed.color).html('<i class="' + sosmed.icon + '"></i>');
			
		} else if ($(v).hasClass('gswd_sosmedFieldInput') === true) {
			$(this).attr('name', sosmed.slug).attr('value', sosvalue);
			$(this).attr('data-itemid', token);

		} else if ($(v).hasClass('gswd_sosmedItemRemove') === true) {
			$(this).attr('data-itemid', token);
		}
	});
	if (btnSave === 0) {
		$(gswd_btnSosmedSave).prependTo('#gswd_sosmedItem #gswd_linkBtn');
	}
	$.each(divhpReplace, function(k, v) {
		if ($(v).hasClass('col-3') === true) {
			$(this).addClass('text-' + sosmed.color).html('<i class="' + sosmed.icon + ' mt-2"  style="font-size:32px"></i>');
		} else if ($(v).hasClass('hp_linkThumbnail') === true) {
			$(this).addClass('d-none');
		} else if ($(v).hasClass('hp_linkHrefAlt') === true) {
			$(this).html(sosvalue);
		}		
	});

	$('#gswd_sosmedItem #gswd_sosmedAlert').fadeOut('fast', function() {
		$('#gswd_fieldSosmed').show()
		divClone.prependTo('#gswd_fieldSosmed .gswd_fieldSosmed').hide().fadeIn('medium');
		divhpClone.prependTo('#tampilan').hide().fadeIn('medium');
	});
}

function gswd_sosmedItemRemove(th) {
	var token = th.attr('data-itemid');
	$('#gswd_sosmedItem #gswd_sosmedAlert').fadeOut('fast');
	$('#gswd_fieldSosmed .gswd_sosmedItemId_' + token).fadeOut('fast', function() {
		$(this).remove();
		var divCount = $('#gswd_fieldSosmed .gswd_fieldSosmed').find('.gswd_fieldSosmedItem').length;

		if (divCount <= 0) {
			$('#gswd_sosmedItem #gswd_linkBtn #gswd_btnSosmedSave').remove();
			$('#gswd_fieldSosmed').hide();
			var linkAlert = $('#gswd_sosmedItem #gswd_sosmedAlert').show().find('.gswd_sosmedAlert');
			
			$.each(linkAlert, function() {
				$(this).hide().removeClass('alert-success alert-danger').addClass('alert-success').html('<i class="fa-fw fa fa-info-circle"></i> Silahkan klik salah satu tombol media sosial di atas untuk menambahkan').fadeIn('fast');
			});
		}
	});

	$('#tampilan .tampilanhpItemId_' + token).fadeOut('fast', function() {
		$(this).remove();
	});
}	

function gswd_sosmedItemChange(th) {
	
	var token = th.attr('data-itemid');
	var matchvalue = $(th).val();
	$('#tampilan .tampilanhpItemId_' + token + ' .hp_linkHrefAlt').html(matchvalue)
}	

function gswd_SosmedItemSave(th){
	var name = $('#invisible').val();
		var tipe = 'soslink';
		$.ajax({
			url: "/linktree/delete",
			type: "POST",
			data: {
				name: name,
				tipe: tipe
			}
		});
	// var lop = 1;
		$('.gswd_sosmedFieldInput').each(function() {
			// console.log(this);
			var ulink = $(this).val();
			// var th = $('#gswd_sosmedItem a')
			// var sosmed = jQuery.parseJSON(th.attr('data-sosmed'));
			var brand = $(this).attr('name');
			if (ulink != '')
			{
			//alert(ulink);
			if(name != '' && tipe != '' && brand != ''){
					$.ajax({
						url: "/linktree/save",
						type: "POST",
						data: {
							name: name,
							tipe: tipe,
							brand: brand,
							ulink: ulink		
						}
					});
				}
				else{
					// alert('Please fill all the field !');
				}
				$('.gswd_alertResponse').fadeOut('fast', function() {
				$(this).fadeIn('medium');
				setTimeout(function() {
					$('.gswd_alertResponse').fadeOut('fast');
				}, 3000);		
			});
			}
			
		});
}


function gswd_LinkItemSave(th) {
	var name = $('#invisible').val();
	var tipe = 'link';
	$.ajax({
		url: "/linktree/delete",
		type: "POST",
		data: {
			name: name,
			tipe: tipe
		}
	});
// var lop = 1;
	$('.gswd_linkHref').each(function() {
		// console.log(this);
		var ulink = $(this).attr('href');

		if (ulink != '')
		{ 
		if(name != '' && tipe != ''){
				$.ajax({
					url: "/linktree/save",
					type: "POST",
					data: {
						name: name,
						tipe: tipe,
						brand: tipe,
						ulink: ulink		
					}
				});
			}
			else{
				// alert('Please fill all the field !');
			}
			$('.gswd_alertResponse').fadeOut('fast', function() {
			$(this).fadeIn('medium');
			setTimeout(function() {
				$('.gswd_alertResponse').fadeOut('fast');
			}, 3000);		
		});
		}
		
    });
}	

function gswd_GetDatabase(){
	var name = $('#invisible').val();
	$.ajax({
		url: '/linktree/select/'+name,
		type: 'get',
		dataType: 'json',
		success: function(response){

		  var len = 0;
		  if(response['data'] != null){
			 len = response['data'].length;
		  }


		  if(len > 0){
			//  alert(response['data'][0].tipe);
			 for(var i=0; i<len; i++){
				var name = response['data'][i].name;
				var tipe = response['data'][i].tipe;
				var brand = response['data'][i].brand;
				var ulink = response['data'][i].link;
				// alert(ulink);
				if (tipe == 'link') {
					gswd_loadlink(ulink);
				} else if ('soslink') {
					var allbrand
					if (brand == 'whatsapp'){
						allbrand = {"slug":"whatsapp","icon":"fa-fw fab fa-lg fa-whatsapp","color":"success"}
					}else if (brand == 'facebook'){
						allbrand = {"slug":"facebook","icon":"fa-fw fab fa-lg fa-facebook-f","color":"blue"}
					}else if (brand == 'twitter'){
						allbrand = {"slug" : "twitter", "icon" : "fa-fw fab fa-lg fa-twitter", "color" : "blue-alt-1"}
					}else if (brand == 'youtube'){
						allbrand = {"slug" : "youtube", "icon" : "fa-fw fab fa-lg fa-youtube", "color" : "red"}
					}else if (brand == 'pinterest'){
						allbrand = {"slug" : "pinterest", "icon" : "fa-fw fab fa-lg fa-pinterest-p", "color" : "red-alt-1"}
					}else if (brand == 'yahoo'){
						allbrand = {"slug" : "yahoo", "icon" : "fa-fw fab fa-lg fa-yahoo", "color" : "purple"}
					}else if (brand == 'wordpress'){
						allbrand = {"slug" : "wordpress", "icon" : "fa-fw fab fa-lg fa-wordpress", "color" : "blue-alt-2"}
					}else if (brand == 'linkedin'){
						allbrand = {"slug" : "linkedin", "icon" : "fa-fw fab fa-lg fa-linkedin-in", "color" : "blue-alt-2"}
					}else if (brand == 'line'){
						allbrand = {"slug" : "line", "icon" : "fa-fw fab fa-lg fa-line", "color" : "green-alt-1"}
					}else if (brand == 'github'){
						allbrand = {"slug" : "github", "icon" : "fa-fw fab fa-lg fa-github", "color" : "secondary"}
					}else if (brand == 'dropbox'){
						allbrand = {"slug" : "dropbox", "icon" : "fa-fw fab fa-lg fa-dropbox", "color" : "blue-alt-3"}
					}else if (brand == 'google-drive'){
						allbrand = {"slug" : "google-drive", "icon" : "fa-fw fab fa-lg fa-google-drive", "color" : "green-alt-2"}
					}else if (brand == 'at'){
						allbrand = {"slug" : "at", "icon" : "fa-fw fa fa-lg fa-at", "color" : "warning"}
					}
					gswd_loadsosmed(allbrand,ulink);
				}
							
			 }
		  }else{
			
		  }

		},
		error: function(xhr, status, error) {
			alert(xhr.responseText);
		  }
	  });
}

function gswd_GetDatabaseJSONFile(jfile){
	$.getJSON(jfile,function(data){
		var len = 0;
		
		if(data.brandall != null){
		   len = data.brandall.length;
		}

		if(len > 0){
		   for(var i=0; i<len; i++){
			  var tipe = data.brandall[i].tipe;
			  var brand = data.brandall[i].brand;
			  var ulink = data.brandall[i].value;
			  
			  if (tipe == 'tautan') {
				  gswd_loadlink(ulink);
			  } else if ('sosmed') {
				  var allbrand
				  if (brand == 'whatsapp'){
					  allbrand = {"slug":"whatsapp","icon":"fa-fw fab fa-lg fa-whatsapp","color":"success"}
				  }else if (brand == 'facebook'){
					  allbrand = {"slug":"facebook","icon":"fa-fw fab fa-lg fa-facebook-f","color":"blue"}
				  }else if (brand == 'twitter'){
					  allbrand = {"slug" : "twitter", "icon" : "fa-fw fab fa-lg fa-twitter", "color" : "blue-alt-1"}
				  }else if (brand == 'youtube'){
					  allbrand = {"slug" : "youtube", "icon" : "fa-fw fab fa-lg fa-youtube", "color" : "red"}
				  }else if (brand == 'pinterest'){
					  allbrand = {"slug" : "pinterest", "icon" : "fa-fw fab fa-lg fa-pinterest-p", "color" : "red-alt-1"}
				  }else if (brand == 'yahoo'){
					  allbrand = {"slug" : "yahoo", "icon" : "fa-fw fab fa-lg fa-yahoo", "color" : "purple"}
				  }else if (brand == 'wordpress'){
					  allbrand = {"slug" : "wordpress", "icon" : "fa-fw fab fa-lg fa-wordpress", "color" : "blue-alt-2"}
				  }else if (brand == 'linkedin'){
					  allbrand = {"slug" : "linkedin", "icon" : "fa-fw fab fa-lg fa-linkedin-in", "color" : "blue-alt-2"}
				  }else if (brand == 'line'){
					  allbrand = {"slug" : "line", "icon" : "fa-fw fab fa-lg fa-line", "color" : "green-alt-1"}
				  }else if (brand == 'github'){
					  allbrand = {"slug" : "github", "icon" : "fa-fw fab fa-lg fa-github", "color" : "secondary"}
				  }else if (brand == 'dropbox'){
					  allbrand = {"slug" : "dropbox", "icon" : "fa-fw fab fa-lg fa-dropbox", "color" : "blue-alt-3"}
				  }else if (brand == 'google-drive'){
					  allbrand = {"slug" : "google-drive", "icon" : "fa-fw fab fa-lg fa-google-drive", "color" : "green-alt-2"}
				  }else if (brand == 'at'){
					  allbrand = {"slug" : "at", "icon" : "fa-fw fa fa-lg fa-at", "color" : "warning"}
				  }
				  gswd_loadsosmed(allbrand,ulink);
			  }
						  
		   }
		}else{
		  
		}
  })
}

function gswd_GetDatabaseJSON_Ajax(jlink){
	var name = $('#invisible').val();
	$.ajax({
		url: jlink,
		type: 'get',
		dataType: 'json',
		success: function(response){

		  var len = 0;
		  if(response['brandall'] != null){

			 len = response['brandall'].length;
		  }

		  if(len > 0){
			  $.map(response['brandall'],function(data){
				var name = data.name;
				var tipe = data.tipe;
				var brand = data.brand;
				var ulink = data.value;
				if (tipe == 'tautan') {
					gswd_loadlink(ulink);
				} else if ('sosmed') {
					var allbrand
					if (brand == 'whatsapp'){
						allbrand = {"slug":"whatsapp","icon":"fa-fw fab fa-lg fa-whatsapp","color":"success"}
					}else if (brand == 'facebook'){
						allbrand = {"slug":"facebook","icon":"fa-fw fab fa-lg fa-facebook-f","color":"blue"}
					}else if (brand == 'twitter'){
						allbrand = {"slug" : "twitter", "icon" : "fa-fw fab fa-lg fa-twitter", "color" : "blue-alt-1"}
					}else if (brand == 'youtube'){
						allbrand = {"slug" : "youtube", "icon" : "fa-fw fab fa-lg fa-youtube", "color" : "red"}
					}else if (brand == 'pinterest'){
						allbrand = {"slug" : "pinterest", "icon" : "fa-fw fab fa-lg fa-pinterest-p", "color" : "red-alt-1"}
					}else if (brand == 'yahoo'){
						allbrand = {"slug" : "yahoo", "icon" : "fa-fw fab fa-lg fa-yahoo", "color" : "purple"}
					}else if (brand == 'wordpress'){
						allbrand = {"slug" : "wordpress", "icon" : "fa-fw fab fa-lg fa-wordpress", "color" : "blue-alt-2"}
					}else if (brand == 'linkedin'){
						allbrand = {"slug" : "linkedin", "icon" : "fa-fw fab fa-lg fa-linkedin-in", "color" : "blue-alt-2"}
					}else if (brand == 'line'){
						allbrand = {"slug" : "line", "icon" : "fa-fw fab fa-lg fa-line", "color" : "green-alt-1"}
					}else if (brand == 'github'){
						allbrand = {"slug" : "github", "icon" : "fa-fw fab fa-lg fa-github", "color" : "secondary"}
					}else if (brand == 'dropbox'){
						allbrand = {"slug" : "dropbox", "icon" : "fa-fw fab fa-lg fa-dropbox", "color" : "blue-alt-3"}
					}else if (brand == 'google-drive'){
						allbrand = {"slug" : "google-drive", "icon" : "fa-fw fab fa-lg fa-google-drive", "color" : "green-alt-2"}
					}else if (brand == 'at'){
						allbrand = {"slug" : "at", "icon" : "fa-fw fa fa-lg fa-at", "color" : "warning"}
					}
					
					gswd_loadsosmed(allbrand,ulink);
				}
			  })
			
		  }else{
			
		  }

		}
	  });
}