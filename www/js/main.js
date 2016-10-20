function addToCart(itemId){
    console.log("addToChart()");
    $.ajax({
        type: 'POST',
        url:"/cart/addtocart/"+itemId+'/',
        dataType: 'json',
        success: function(data){
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+itemId).hide();
                $('#removeCart_'+itemId).show();
                
            }
            
            
        }
        
        
        
        
        
        
        
        
    });
}

function removeFromCart(itemId){
    $.ajax({
        type: 'POST',
        url:"/cart/removefromcart/" + itemId +'/',
        dataType: 'json',
        
        success: function(data){
            if (data['success']){
               
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+itemId).show();
                $('#removeCart_'+itemId).hide();
                
            }
            
            
        }
        
        
        
        
        
        
        
        
    });
    
}

function conversionPrise(itemId){
    var newCnt=$('#itemCnt_'+itemId).val();
    var itemPrice=$('#itemPrice_'+itemId).attr('value');
     console.log("add");
    var itemRealPrice=newCnt*itemPrice;
    $('#itemRealPrice_'+itemId).html(itemRealPrice);
}


function TotalPrice()
{
    var total = 0;
 
    $('span', '#orderTable').each(function(){ // ищем элементы <span> в табле с id = "orderTable"
        if(this.id && this.id.indexOf('itemRealPrice_') + 1) // если есть id и в id есть слово - "itemRealPrice_"
        {
                var vale = $("#" + this.id).html(); // берем значение <span>, не атрибута value, так как он статичен, только через html()
                vale = Number(vale); // значение value - строчное, передалаем его в цифры
                total += vale; // суммируем
                // console.log('Span[' + this.id + '] = ' + vale);
        }
    });
 
    $('#totalPrice').html("Total price : "+total);
}

function getData(obj_form){
    var hData={};
    $('input,textarea,select',obj_form).each(function(){
        if(this.name && this.name!=''){
            hData[this.name]= this.value;
           
            
        }
        
        
    });
    return hData;
}

function login(){
    var postData=getData('#loginBox');
    console.log(postData);
    $.ajax({
        type:'POST',
        async:false,
        url:"/user/login/",
        data:postData,
        dataType:'json',
        
        success:function(data){
            console.log(data['success']);
           if (data['success']){
               $('#registerBox').hide();
               $('#loginBox').hide();
               
               $('#userLink').attr('href','/user/');
               $('#userLink').html(data['displayName']);
               $('#userBox').show();
           }
            else {
                
                alert(data['message']);
            }
            
        }
    });
}




function registerNewUser(){
    var postData=getData('#registerBox');
    $.ajax({
        type: 'POST',
        async:false,
        url: "/user/registr/",
        data: postData,

        dataType: 'json',
        success: function(data){
            
            if(data['success']){
               
                alert("Registered successfuly");
                
                $('#registerBox').hide();
                $('#userLink').attr('href','/user/');
                $('#userLink').html(data['username']);
                $('#userBox').show();
                
                
                
            }
            else{
                
                alert(data['message']);
                
                
                
            }
            
            
        }
    
        
    });
}

function showRegisterBox(){
    console.log("F");
    if ($("#registerBoxHidden").css('display') != 'block'){
        $("#registerBoxHidden").show();
    }
    else{
        $("#registerBoxHidden").hide();
    }
}

