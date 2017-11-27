function cartUpdate(Category,Direction)
{
	var	Quantity = $('#quantity'+Category).val();
	if(Direction == 'UP')	Quantity++;
	if(Direction == 'DOWN')	Quantity--;
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=CART.UPDATE&xCategory=' + Category +'&xQuantity=' + Quantity,
        dataType : 'json',
        success : function (data) 
        {
        	if(data.status)
        	{
				refreshCart();
        	}
        	if(data.message)
        	{
        		alert(data.message);
        	}
        }
    });return false;
}

function addCoupon()
{
	var	Coupon = $('input[name=xCoupon]').val();
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=COUPON&xCoupon=' + Coupon,
        dataType : 'json',
        success : function (data) 
        {
        	if(data.status)
        	{
				refreshCart();
        	}
        	if(data.message)
        	{
        		alert(data.message);
        	}
        }
    });return false;
}
function viewNews(Page,Record,Sort,Direction)
{
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=NEWS.DATA&xPage=' + Page + '&xRecord=' + Record + '&xSort=' + Sort + '&xDirection=' + Direction,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}
function viewOrder(Page,Record,Sort,Direction)
{
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=ORDER.DATA&xPage=' + Page + '&xRecord=' + Record + '&xSort=' + Sort + '&xDirection=' + Direction,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}
function viewTopup(Page,Record,Sort,Direction)
{
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=TOPUP.DATA&xPage=' + Page + '&xRecord=' + Record + '&xSort=' + Sort + '&xDirection=' + Direction,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}
function viewLoad(Page,Record,Sort,Direction)
{
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=LOAD.DATA&xPage=' + Page + '&xRecord=' + Record + '&xSort=' + Sort + '&xDirection=' + Direction,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}
function viewTransaction(Page,Record,Sort,Direction)
{
 	$.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=TRANSACTION.DATA&xPage=' + Page + '&xRecord=' + Record + '&xSort=' + Sort + '&xDirection=' + Direction,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}
function viewCart(Location)
{
	window.location=Location;
}
function viewCategory(Category)
{
    $.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=CATEGORY.VIEW&xCategory=' + Category,
        success : function (data) 
        {
            $('#ajaxContainer').fadeOut('fast', function ()
            {
                $(this).empty().html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });return false;
}

function refreshCart()
{
    $.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=CART.SUMMARY',
        success : function (data) 
        {
            $('#boxCart').fadeOut('fast', function ()
            {
                $(this).html(data).fadeIn('fast', function ()
                {
                    $(this).show();
                })
            });
        }
    });
    if((window.location.href.indexOf('index.php?xTask=CART') > -1) || (window.location.href.indexOf('cart.html') > -1))
    {
	    $.ajax(
	    {
	        type : 'GET', url : 'index.php', data : 'xTask=CART.DETAILS',
	        success : function (data) 
	        {
	            $('#ajaxContainer').fadeOut('fast', function ()
	            {
	                $(this).html(data).fadeIn('fast', function ()
	                {
	                    $(this).show();
	                })
	            });
	        }
	    });
    }
}

function emptyCart(Message)
{
	if(confirm(Message))
	{
	    $.ajax(
	    {
	        type : 'GET', url : 'index.php', data : 'xTask=CART.EMPTY',
	        dataType : 'json',
	        success : function (data) 
	        {
	        	if(data.status)
	        	{
	        		refreshCart();
	        	}
	        }
	    });
    }
    return false;
}

function quantityUp(Category,Maximum)
{
	var	Quantity = $('#quantity'+Category).val();
	Quantity++;
	$('#quantity'+Category).val(Quantity);
	if(Quantity > Maximum){
		$('#quantity'+Category).val(Maximum);
	}
	return false;
}

function quantityDown(Category,Minimum)
{
	var	Quantity = $('#quantity'+Category).val();
	Quantity--;
	$('#quantity'+Category).val(Quantity);
	if(Quantity < Minimum){
		$('#quantity'+Category).val(Minimum);
	}
	return false;
}

function addCart(Category)
{
	var	Quantity = $('#quantity'+Category).val();
    $.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=CART.ADD&xCategory=' + Category + '&xQuantity=' + Quantity,
        dataType : 'json',
        success : function (data) 
        {
        	
            if (data.status)
            {
            	setTimeout('refreshCart();',1000);
            	
			    var $element = $('img#' + Category);
			    var $picture = $element.clone();
			    var pictureOffsetOriginal = $element.offset();
			    if ($picture.size())
			    {
			        $picture.css( 
			        {
			            'position' : 'absolute', 'top' : pictureOffsetOriginal.top, 'left' : pictureOffsetOriginal.left 
			        });
			    }
			    var pictureOffset = $picture.offset();
			    var cartBlockOffset = $('#boxCart').offset();
			    if (cartBlockOffset != undefined && $picture.size()) 
			    {
			        $picture.appendTo('body');
			        $picture.css(
			        {
			            'position' : 'absolute', 'top' : $picture.css('top'), 'left' : $picture.css('left') 
			        }) .animate(
			        {
			            'width' : $element.attr('width') * 0.66, 'height' : $element.attr('height') * 0.66, 'opacity' : 0.2, 
			            'top' : cartBlockOffset.top + 30, 'left' : cartBlockOffset.left + 15 
			        }, 1000) .fadeOut(100);
			    }
            }
            if(data.message)
            {
            	alert(data.message);
            }
        }
    });return false;
}
function removeCart(Category)
{
    $.ajax(
    {
        type : 'GET', url : 'index.php', data : 'xTask=CART.REMOVE&xCategory=' + Category, dataType : 'json', 
        success : function (data) 
        {
            if (data.status) {
                refreshCart();
            }
        }
    });return false;
}