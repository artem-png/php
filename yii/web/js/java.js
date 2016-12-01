function main(id){
    


    $.ajax({
        type: 'POST',
        async:false,
        url: 'http://localhost/yii/web/site/addtocart' ,
        data: {
                 id: id, 
             },
        dataType: 'json',
        success: function(data){
            $('#cartButton').html("Cart("+data['count']+")");
            $('#addCartButton').prop('disabled', true);
            one();
          
            
        }
        

    });
}

function one(){
    setTimeout(function(){$('#hideme').fadeOut(3000)}); //10000 = 10 секунд 
            $('#hideme').html("Added");
            $('#hideme').show();
                                       
}

function costRefresh(price,a){
    
    var fieldValue = $('input[name='+'count'+a+']').val();
    if (fieldValue>=0){  
        $('#totalPrice'+a).html(price*fieldValue);
    }
    else {
        fieldValue=0;
        $('input[name='+'count'+a+']').val(0);
    }
    var now=$('#totalPrice'+a).html()
   
    
     $.ajax({
        type: 'POST',
        async:false,
        url: 'http://localhost/yii/web/site/addquantity' ,
        data: {
                 id: a,
                 quantity:fieldValue,
             },
        dataType: 'json',
        success: function(data){
            $('#total').html(data['price']);
            
        }
        

    });

}

function deleteProd(a){
    
    $.ajax({
        type: 'POST',
        async:false,
        url: 'http://localhost/yii/web/site/deleteprod' ,
        data: {
                 id: a,
             },
        dataType: 'json',
        success: function(data){
            if (data['count']<1) {
                window.location.reload();
            } else{
             $('#total').html(data['price']);
             $('#cartButton').html("Cart("+data['count']+")");
             $('#delete'+a).hide();
            }
            
        }
        

    });
    
    
}

function addOneClass(){
    $('#two').removeClass('active');
    $('#one').addClass('active');
}

function addTwoClass(){
    $('#one').removeClass('active');
    $('#two').addClass('active');
}


function confirmAdmin(id,i){
    var a= $('#adminOrder').html();
    a--;
    $('#adminOrder').html(a);
    $.ajax({
        type: 'POST',
        async:false,
        url: 'http://localhost/yii/web/site/makewhite' ,
        data: {
            id: id,
        },
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#string'+i).removeClass('tableGreen');
                $('#confirm'+i).hide();
            }
        }

    });
}