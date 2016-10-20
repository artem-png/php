function getData(obj_form){
    var hData={};

    $('input,textarea,select',obj_form).each(function(){
        if(this.name && this.name!=''){
            hData[this.name]= this.value;
            
        }
        
        
    });
    return hData;
}


function register(){
    var postData={};
    postData['login'] = document.getElementById("inputLogin").value;
    postData['email'] = document.getElementById("inputEmail3").value;
    postData['password'] = document.getElementById("inputPassword3").value;
    postData['passwordRepeat'] = document.getElementById("inputPassword3Again").value;
    postData['url']= window.location.href;

    $.ajax({
        
        type: 'POST',
        async:false,
        url: "/account/register/",
        data: postData,

        dataType: 'json',
        success: function(data){
            
            if (data['success']){
                 document.location.href =  "http://www.bestsite.ru/";

            }
            else {
                $('#error').html(data['message']);
            }
            
            
        }
    
        
        
        
        
    });
}

function signup(){
    var postData={};
    postData['login'] = document.getElementById("inputLoginSignup").value;
   
    postData['password'] = document.getElementById("inputPasswordSignup").value;
   

    $.ajax({
        
        type: 'POST',
        async:false,
        url: "/account/signupact/",
        data: postData,

        dataType: 'json',
        success: function(data){
            
            if (data['success']){
                    
                      document.location.href =  "http://www.bestsite.ru/";
                   
            }
            else {
                $('#error').html(data['message']);
            }
            
            
        }
    
        
        
        
        
    });
}


function comment(){
    var postData={};
    postData['article']=  document.getElementById("getId").value;
    postData['content']=  document.getElementById("contentComment").value;
   
    $.ajax({
        
        type: 'POST',
        async:false,
        url: "/account/comment/",
        data: postData,

        dataType: 'json',
        success: function(data){
            
            if (data['success']){
                    location.reload();
            }
            else {
                $('#dangerComment').html(data['message']);
            }
            
            
        }
    
        
        
        
        
    });
}


    
    
   

