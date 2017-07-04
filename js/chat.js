/**
 * Created by erics on 2017-05-09.
 */


var chatOutput = document.getElementById('chat_output');
var chatNameEle = document.getElementById('chat_name');
var chatName = chatNameEle.innerText;
//var chatNameTrim = chatName.replace(/\s/g, '');

var chatNameTrim = chatTrim(chatName);

setInterval(function(){

    chatOutput.innerHTML = '';


    $.ajax({

    type: "GET",
    cache: false,
    url: "http://soapbox.applepolish.me/chats/" + chatNameTrim + ".json",
    dataType: "text",
    success: function(text){

        var jsonObj = $.parseJSON(text);

        var messages = jsonObj.messages;

        for(var i = 0; i < messages.length; i++){

                chatOutput.innerHTML += "<div id='sender'>" + messages[i].sender + "</div>"
                                        +"<div id='date'>" + messages[i].date + "</div>"
                                        +"<div id='body'>" + messages[i].body + "</div>";

        }

    }//end success
});//end AJAX GET request

    /*
    var objDiv = document.getElementById('chat_output');
    objDiv.scrollTop = objDiv.scrollHeight;
    */

}, 3000);

function chatTrim(value){

    return value.replace(/\s/g, '').replace(/[^a-z0-9\s]/gi, '');

}



