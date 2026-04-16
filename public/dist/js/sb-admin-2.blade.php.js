/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size

     $(document).ready(function(){	
	 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
	
	})
//loadDept();	 
		 function zeroPad(num, places) {
  var zero = places - num.toString().length + 1;
  return Array(+(zero > 0 && zero)).join("0") + num;
}
		 var $item_count=0;
		     isEmpty = function(obj) {
      if (obj == null) return true;
      if (obj.constructor.name == "Array" || obj.constructor.name == "String") return obj.length === 0;
      for (var key in obj) if (isEmpty(obj[key])) return true;
      return false;
    }
	var $userid= $("#userid").val();
	var $username = $("#username").val();
	var $location = $("#userlocation").val();
	var $company =  $("#usercompany").val();
	var $userpriv =  $("#userpriv").val();	
	var $lc = $company+" "+$location;
	//console.log("Username " + $username + "  User id: "+ $userid + " company "+ $company +" location: "+ $location);
	var $item_stat = "";
	var $item_err = 0;
	var $doc_id;
	var $ins;
	var $doc;
	var $data;
	var $loc, $wType, $excel;
	var effect = ["flash", "pulse", "rubberBand" , "bounce", "shake", "swing", "wobble", "jello"]; 
	var randonIndex;
	var rec_qty = [];
      var i=1;
	  var comp = ["GSNL", "NPRNL", "ESRNL"];
$("input[type='checkbox']").change(function() {
    if(this.checked) {
       $("#proxyName").show();
	   console.log("checked");
    }else{
		$("#proxyName").hide();
		console.log("unchecked");
	}
});
$("#dept").change(function(){
	console.log($("#dept").val());
});
$("#company").change(function(){
	loadDept();
});
$("#sentTosel").change(function(){
	
		 $sentTo = $("#sentTosel").val();
		 //$lc = $company+" "+$location;
	 console.log(" $lc "+ $lc + " sent To "+$sentTo);
		 if($sentTo == $lc){
		//	 console.log("same company and location detected");
			 $("#errmsglist").text("choose another location");
			$("#errmsg").prop('hidden', false);
		}else{
			$("#errmsglist").text("");
			$("#errmsg").hide();
		// console.log(" Selected "); 
		 $("#errmsg").hide();
			var $word = $sentTo.split(" ");
			var $company = $word[0];
			var $location = $word[1];
			var options = $("#deliveredTo");
	//		console.log($location);			
				$.ajax({
					type: 'GET',
					url: "/waybill/loadusers",
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"company": $company,
					"location": $location
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
//					console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					//console.log(data + " Array Length "+ data.length);
					console.log('Request data for users '+data);
					if ($sentTo=='VENDOR'){
					options.empty();
					options.hide();
					$("#delivTo").show();
					
					}
					else
					{
						options.show();
					options.empty();	
					$("#delivTo").hide();
					$("#delivTo").empty();
					options.show();
					$.each(data, function(i, list){
						options.append(new Option(list.name, this.value));
					});
					}
					}
				});
			
		}
if($(this).find(":selected").val()==='VENDOR'){
		$("#vendiv1").show();	
	}
	else{
		$("#vendiv1").hide();
	}
		
		});
	 $(".alinks").on("click", function(){
		 id = $(this).attr('href');
		$.ajax({
					type: 'GET',
					url: "/message/"+id,
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					"id": id
					},                                                                                             
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
	//				console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					//data response can contain what we want here...
//					console.log("Item saved "+data+"fully");
					$('.modal-body').empty();
					$('.modal-body').html(data);
					console.log(data);
					}
				});

		 console.log(id);
	 });
$("#printType").change(function(){
		 	$res= $(this).find(":selected").val();
			
		if($res=='No'){
		$("#rec_btn3").append('<span class="glyphicon glyphicon-print"></span>');
		$("#rec_btn3").text("Close");
			}else{
						$("#rec_btn3").append('<span class="glyphicon glyphicon-print"></span>');
		$("#rec_btn3").text("Print");
			}
			
	 });
	 $(".thumbnail").on("mouseenter", function(){
	randomIndex = Math.floor(Math.random() * effect.length);  
		$(this).addClass("animated "+effect[randomIndex]);
		
		//console.log("Added  "+randomIndex);
	  });  
	 $(".thumbnail").on("mouseleave", function(){
		$(this).removeClass("animated "+effect[randomIndex]);
		//		console.log("Removed  "+randomIndex);
	  });
  
	
				});




$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});
