
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upolski</title>
        <link href="./style/main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body onload="showComRatesXML(<?=$field?>,<?=$order?>, '<?=$search?>')">
        
    <!--$field and $order come either from $_SESSION or from a default value set up in exchangeRates.php. When user changes order this is stored in session for  next time user visits the site-->
