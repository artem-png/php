/**
 * Created by User on 15.01.2017.
 */

/*

function that get inputs and make ajax

*/

function go(){
    if (validation()){
        var postData={};
        postData['url']=  $("#inputUrl").val();
        postData['tag']=   $("#inputTag").val();

        $.ajax({

            type: 'POST',
            async:false,
            url: "index.php",
            data: postData,

            dataType: 'json',
            success: function(data){

                if (data['success']){
                    $("#countTag").text("Element "+data['tag']+" appeared "+data['count']+" times.");
                    $("#workInformation").text("URL "+data['url']+" fetched on "+data['date']);
                    $("#workTime").text("  Took "+data['time'])
                    $("#domainPop").text(data['allUrlDomain']+" different URLs from "+data['domain']+" have been fetched");
                    $("#averageTime").text(" Average fetch time from  "+data['domain']+" during the last 24 hours hours is "+data['averageTime']+" sec");
                    $("#tagFromUrl").text("  There was a total of "+data['countTagDomain']+" "+data['tag']+" elements from "+data['domain']);
                    $("#totalTag").text(" Total of "+data['totalTag']+" "+ data['tag']+" elements counted in all requests ever made.");



                }
                else {
                    $("#error").text("Can't get content from this URL "+data['time']).show().fadeOut(3000,function(){ $("#error").text(" ").show()});
                }


            }





        });


    }

}

/*

inputs validation
 */


function validation(){
   if ($("#inputUrl").val().length<6){
       $("#error").text("Enter real url").show().fadeOut(3000,function(){ $("#error").text(" ").show()});



       return false;
   }
    if ( $("#inputTag").val().length==0 ){

        $("#error").text("Enter tag").show().fadeOut(3000,function(){ $("#error").text(" ").show()});






       return false;
   }
   return true;
}