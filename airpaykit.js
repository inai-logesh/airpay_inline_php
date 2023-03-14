$(document).ready(function () {
$("#make_trans").bind("submit", function(e) {
	if (($("#buyerEmail").val().length < 1 && $("#buyerPhone").val().length < 1 && $("#buyerFirstName").val().length < 1  && $("#buyerLastName").val().length < 1  && $("#orderid").val().length < 1 && $("#amount").val().length < 1) || validate()==false) {
	    //$("#login_error").show();
		validate();
	//    $.fancybox.update();
	    return false;
	}
	 $.fancybox.showLoading(); 
	 $.fancybox.open({
        content   : '<iframe id="myFrame" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" src="about:blank" name="tranframe"></iframe>',
        width     : '75%',
        height    : '90%',
     // fitToView: false, 
        autoSize: false, // 
        closeClick: false,
        openEffect: 'elastic',
        closeEffect: 'fade',
        helpers: { overlay: { css: { 'background': 'rgba(0, 0, 0, 0.65)' } } },
        /*afterShow : function() {
          var oIframe = document.getElementById('myFrame');
          var iframeDoc = (oIframe.contentWindow.document || oIframe.contentDocument );  iframeDoc.open(); 
          iframeDoc.write(data);
          iframeDoc.close();
        },
        afterClose: function () {
          location.reload();
          return;
        }*/
		afterShow : function() {
			$('.fancybox-inner').css('overflow','hidden');
// $(".fancybox-skin").append("<div align = 'center'><a style='text-decoration:underline' title='Close' class='fancybox_close___' href='javascript:;' onClick='back()'>Back</a></div>");
$('#btnsend').attr('disabled','disabled');
		},
		afterClose: function () {
          $('#btnsend').removeAttr('disabled');
          return;
        }
      }); // fancybox
	 
  return true;
  }); // submit click
  
}); // ready

// function back(){
// 	$.fancybox.close();

// }
function validate(){
			var rt_type;
			if(document.getElementById('buyerEmail').value == "")
			{
				document.getElementById('buyerEmail').style.borderColor  = 'red';
				document.getElementById('buyerEmailspan').style.display  = '';
				document.getElementById('buyerEmailspan').innerHTML = 'Please enter email address.';
				rt_type = false;
			}
			else
			{
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				if (reg.test(document.getElementById('buyerEmail').value)){
					rt_type;
				}else
				{
					document.getElementById('buyerEmail').style.borderColor  = 'red';
					document.getElementById('buyerEmailspan').style.display  = '';
					document.getElementById('buyerEmailspan').innerHTML = 'Please enter valid email.';
					rt_type = false;
				}
			}
			if(document.getElementById('buyerPhone').value == "")
			{
				document.getElementById('buyerPhone').style.borderColor  = 'red';
				document.getElementById('buyerPhonespan').style.display  = '';
				document.getElementById('buyerPhonespan').innerHTML = 'Please enter phone number.';
				rt_type = false;
			}
			else
			{
				var specials=/^[\d\s\.\-]+$/
				if (!specials.test(document.getElementById('buyerPhone').value)){
					document.getElementById('buyerPhone').style.borderColor  = 'red';
					document.getElementById('buyerPhonespan').style.display  = '';
					document.getElementById('buyerPhonespan').innerHTML = 'Please enter valid phone number.';
					rt_type = false;
				}
				else
				{
					var phone = document.getElementById('buyerPhone').value;
					if(phone.length<8)
					{
						document.getElementById('buyerPhone').style.borderColor  = 'red';
						document.getElementById('buyerPhonespan').style.display  = '';
						document.getElementById('buyerPhonespan').innerHTML = 'Phone number should be minimum 8 digit.';
						rt_type = false;
					}
				}

			}
			if(document.getElementById('buyerFirstName').value == "")
			{
				document.getElementById('buyerFirstName').style.borderColor  = 'red';
				document.getElementById('buyerFirstNamespan').style.display  = '';
				document.getElementById('buyerFirstNamespan').innerHTML = 'Please enter first name.';
				rt_type = false;
			}
			else
			{
				var reg = /^[A-Za-z\d\s]+$/;
				if (!reg.test(document.getElementById('buyerFirstName').value)){
					document.getElementById('buyerFirstName').style.borderColor  = 'red';
					document.getElementById('buyerFirstNamespan').style.display  = '';
					document.getElementById('buyerFirstNamespan').innerHTML = 'Please enter valid first name.';
					rt_type = false;
				}
				else
				{
					var fname = document.getElementById('buyerFirstName').value;
					if(fname.length<1)
					{
						document.getElementById('buyerFirstName').style.borderColor  = 'red';
						document.getElementById('buyerFirstNamespan').style.display  = '';
						document.getElementById('buyerFirstNamespan').innerHTML = 'First name should be minimum 1 character.';
						rt_type = false;
					}
				}

			}
			if(document.getElementById('buyerLastName').value == "")
			{
				document.getElementById('buyerLastName').style.borderColor  = 'red';
				document.getElementById('buyerLastNamespan').style.display  = '';
				document.getElementById('buyerLastNamespan').innerHTML = 'Please enter last name.';
				rt_type = false;
			}
			else
			{
				var reg = /^[A-Za-z\d\s]+$/;
				if (!reg.test(document.getElementById('buyerLastName').value)){
					document.getElementById('buyerLastName').style.borderColor  = 'red';
					document.getElementById('buyerLastNamespan').style.display  = '';
					document.getElementById('buyerLastNamespan').innerHTML = 'Please enter valid last name.';
					rt_type = false;
				}
				else
				{
					var fname = document.getElementById('buyerLastName').value;
					if(fname.length<1)
					{
						document.getElementById('buyerLastName').style.borderColor  = 'red';
						document.getElementById('buyerLastNamespan').style.display  = '';
						document.getElementById('buyerLastNamespan').innerHTML = 'Last name should be minimum 1 character.';
						rt_type = false;
					}
				}

			}
			if(document.getElementById('buyerAddress').value != "")
			{
				var reg = /^[A-Za-z. ,;#$\/()-_]*$/;
				if (!reg.test(document.getElementById('buyerAddress').value)){
					document.getElementById('buyerAddress').style.borderColor  = 'red';
					document.getElementById('buyerAddressspan').style.display  = '';
					document.getElementById('buyerAddressspan').innerHTML = 'Please enter valid address.';
					rt_type = false;
				}
			}
			if(document.getElementById('buyerPinCode').value != "")
			{

				var reg = /^[A-Za-z\d]+$/;
				if (!reg.test(document.getElementById('buyerPinCode').value)){
					document.getElementById('buyerPinCode').style.borderColor  = 'red';
					document.getElementById('buyerPinCodespan').style.display  = '';
					document.getElementById('buyerPinCodespan').innerHTML = 'Please enter valid pincode.';
					rt_type = false;
				}
			}

				var reg = /^[A-Za-z\d]+$/;
				if (!reg.test(document.getElementById('orderid').value)){
					document.getElementById('orderid').style.borderColor  = 'red';
					document.getElementById('orderidspan').style.display  = '';
					document.getElementById('orderidspan').innerHTML = 'Please enter valid order id.';
					rt_type = false;
				}

			if(document.getElementById('amount').value == "")
			{
				document.getElementById('amount').style.borderColor  = 'red';
				document.getElementById('amountspan').style.display  = '';
				document.getElementById('amountspan').innerHTML = 'Please enter amount.';
				rt_type = false;
			}
			else
			{
				val = document.getElementById('amount').value;
				if (!val.match(/^(\d{1,6})(\.\d{2})$/)) {
					document.getElementById('amount').style.borderColor  = 'red';
					document.getElementById('amountspan').style.display  = '';
					document.getElementById('amountspan').innerHTML = 'Please enter valid amount e.g. 99.50';
					rt_type = false;
				}
			}
    if(document.getElementById('customvar').value != "")
    {
        var reg = /^[A-Za-z0-9 =]*$/;
        if (!reg.test(document.getElementById('customvar').value)){
            document.getElementById('customvar').style.borderColor  = 'red';
            document.getElementById('customspan').style.display  = 'block';
            document.getElementById('customspan').innerHTML = 'Please enter valid Custom field1';
            rt_type = false;
        }
    }

    if(document.getElementById('subtype').value != "")
    {
        var reg = /^[0-9]*$/;
        if (!reg.test(document.getElementById('subtype').value)){
            document.getElementById('subtype').style.borderColor  = 'red';
            document.getElementById('subtypespan').style.display  = 'block';
            document.getElementById('subtypespan').innerHTML = 'Please enter numbers';
            rt_type = false;
        }
    }

	if(document.getElementById('currency').value == "")
					{
						document.getElementById('currency').style.borderColor  = 'red';
						document.getElementById('currencyspan').style.display  = '';
						document.getElementById('currencyspan').innerHTML = 'Please enter currency.';
						rt_type = false;
					}

					if(document.getElementById('isocurrency').value == "")
					{
						document.getElementById('isocurrency').style.borderColor  = 'red';
						document.getElementById('isocurrencyspan').style.display  = '';
						document.getElementById('isocurrencyspan').innerHTML = 'Please enter isocurrency.';
						rt_type = false;
					}
			return rt_type;
		}

		/*window.addEventListener('message', function (event) {
        
		if (event.data == 'close') {                
            $.fancybox.close();
        }
    }, false);*/

	function listener(event){
	  if ( event.origin !== "https://staging-payments.airpayme.com" )
		{
			return false;
		}
		  if (event.data == 'close') {                
           $.fancybox.close();
        }
		
	}
	 
	if (window.addEventListener){
	  addEventListener("message", listener, false)
	} else {
	  attachEvent("onmessage", listener)
}