
function showComRatesXML(field, order, search) { //Function activated with Update button on index.php
    $('.infoUpdate').empty(); //To ensure each consult got just new info
   
    //Table headers are functional. Whenever a user click them table rows are ordered (ascending or descending) by field. This ordenation is sent to showComRatesXML.php (using $_GET)
    //Order ASC is set up as default. 
    (jQuery.type(search)==='undefined') ? search='': false ;
        
    
    $('.infoUpdate').append("<tr><th onclick='showComRatesXML(1,1)'>ID</th><th onclick='showComRatesXML(2,1)'>Name</th><th onclick='showComRatesXML(3,1)'>Current Rate</th><th onclick='showComRatesXML(4,1)'>Last Rate</th><th onclick='showComRatesXML(5,1)'>Difference</th></tr>");
    
    orderRows(field, order); //See orderRows function below
    $(".update form input").attr("onclick","showComRatesXML("+field+","+order+")");//When user update again order will be parameters field and order of this function
    
    /*AJAX method*/
    $.get("./showComRatesXML.php?field=" + field + "&order=" + order+ "&search=" + search, function (xml) { //Getting info from showComRatesXML.php (xml file made from php in the same page)
        console.log($(xml).find("companyRates").length);
        if($(xml).find("companyRates").length>0){
            
     
        $(xml).find("companyRates").each(function (i, companyRates) { //Each element of the XML is stored in a variable
            //variables from each attribute
            console.log($(this).children().is(':empty'));
            console.log(i);
            if($(this).children().is(':empty')){
                 $('.infoUpdate').append("<tr class='down'> NO MATCHES FOUND!!</tr>");
            }
            var cid = $(companyRates).children('cid').html();
            var name = $(companyRates).children('name').html();
            var current = $(companyRates).children('current').html();
            var last = $(companyRates).children('last').html();
            var diff = $(companyRates).children('diff').html();
            //Inserting info from showComRatesXML.php 

            if (cid !== '1') {
                if (parseFloat(last) > parseFloat(current)) { //if rate decreases (last>current) difference is 'red'
                    
                    $('.infoUpdate').append("<tr><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td  class='down'>" + diff + "</td></tr>");

                } else {//if rate increases (last>current) difference is 'green'
                    $('.infoUpdate').append("<tr><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td  class='up'>" + diff + "</td></tr>");
                }
            } else { //Different style for Upolski table row
                if (parseFloat(last) > parseFloat(current)) {
                    //console.log(name + 'si');
                    $('.infoUpdate').append("<tr class='upolski'><td>"+cid+"</td><td>"+name+"</td><td>"+current+"</td><td>"+last+"</td><td class='down'>"+diff+"</td></tr>");

                } else {
                    $('.infoUpdate').append("<tr class='upolski'><td>"+cid+"</td><td>"+name+"</td><td>"+current+"</td><td>"+last+"</td><td class='up'>"+diff +"</td></tr>");
                }
            }
            
        });
           }else{
               $('.infoUpdate').append("<tr ><td colspan='5' class='down'>NO MATCHES FOUND!</td></tr>");
           }
    });
}
/*This function set up the order rows using field and order from showComRatesXML function*/
function orderRows(field, order){
     var asc='<i class="demo-icon icon-up-open"></i>'; //This icon is inserted when order is desc
 var desc='<i class="demo-icon icon-down-open"></i>';  //This icon is inserted when order is asc
 if(order === 1){ //If order is 1 (ASC) means that the same button got to change its order in a new call
    $(".infoUpdate tbody tr th:nth-child("+field+")").attr('onclick', "showComRatesXML("+field+",2)"); //With parameter field we know which button is calling the function
    $(".infoUpdate tbody tr th:nth-child("+field+")").append(asc);
 }else{
     $(".infoUpdate tbody tr th:nth-child("+field+")").append(desc);
 }
}

function searchComp(field, order,search){
    var hint ='';
    console.log('field:' + field + ', order:' + order + ', search:'+ $(search).val());
    hint = $.trim($(search).val());
    showComRatesXML(field, order, hint );
}
