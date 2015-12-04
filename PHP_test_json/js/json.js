
function showComRatesJSON(field, order, search) {
    $('.infoUpdate').empty();

    $('.infoUpdate').append("<tr><th onclick='showComRatesJSON(1,1)'>ID</th><th onclick='showComRatesJSON(2,1)'>Name</th><th onclick='showComRatesJSON(3,1)'>Current Rate</th><th onclick='showComRatesJSON(4,1)'>Last Rate</th><th onclick='showComRatesJSON(5,1)'>Difference</th></tr>");


    (jQuery.type(search) === 'undefined') ? search = '' : false;


    //orderRows(field, order); //See orderRows function below
    $(".update form input").attr("onclick", "showComRatesJSON(" + field + "," + order + ")");//When user update again order will be parameters field and order of this function

    $.getJSON('./showComRatesJSON.php?field=1&order=1&search=', processJSON);

    function processJSON(data) {
        //console.log(data);  
        $.each(data.companies, function (i, companies) {
            search = $.trim(search.toLowerCase());

            var name = companies.company.name.toLowerCase();
            if (name.indexOf(search) >= 0) {
                //console.log('Encontrado'+name+name.indexOf(search) + i);
                name = companies.company.name;
                var cid = companies.company.cid;
                var current = companies.company.current;
                var last = companies.company.last;
                var diff = companies.company.diff;

                if (cid !== '1') {
                    if (parseFloat(last) > parseFloat(current)) { //if rate decreases (last>current) difference is 'red'

                        $('.infoUpdate').append("<tr><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td  class='down'>" + diff + "</td></tr>");

                    } else {//if rate increases (last>current) difference is 'green'
                        $('.infoUpdate').append("<tr><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td  class='up'>" + diff + "</td></tr>");
                    }
                } else { //Different style for Upolski table row
                    if (parseFloat(last) > parseFloat(current)) {
                        //console.log(name + 'si');
                        $('.infoUpdate').append("<tr class='upolski'><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td class='down'>" + diff + "</td></tr>");

                    } else {
                        $('.infoUpdate').append("<tr class='upolski'><td>" + cid + "</td><td>" + name + "</td><td>" + current + "</td><td>" + last + "</td><td class='up'>" + diff + "</td></tr>");
                    }
                }


            } else {

                //$('.infoUpdate').prepend("<li>NO MATCHES!</li>"); 
            }

        });
    }

}

function searchHint(field, order, search) {
    var hint = $(search).val();
    showComRatesJSON(field, order, hint);
}
