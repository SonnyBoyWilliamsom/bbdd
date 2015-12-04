<?php
include './inc/security.php';
include './inc/connection.php';
//If user does not select any specific order, default values are set up:
$field = ' companies.cid';
$order = 'asc';

//If user does select an specific order, information is stored in session and rewrite default values
if (isset($_GET['field']) && !empty($_GET['field'])) { //checking if field selected (order by id, name, rates or diff).
     $_SESSION['field'] = $_GET['field'];//This values are used to keep the same order next time user opens Upolski rates page
    switch ($_GET['field'])://decoding $_GET info, exchangeRates.php sends just a number, here is decoded into a string
        case 1:
            $_GET['field'] = 'companies.cid';
            break;
        case 2:
            $_GET['field'] = 'name';
            break;
        case 3:
            $_GET['field'] = 'current';
            break;
        case 4:
            $_GET['field'] = 'last';
            break;
        case 5:
            $_GET['field'] = 'diff';
            break;
    endswitch;

    $field = $_GET['field'];
    
}
if ((isset($_GET['order']) && !empty($_GET['order']))) { //Implementing if user wants an ASC or DESC order 
     $_SESSION['order'] = $_GET['order'];//If user select order asc or desc, this is stored in session. This values is used to keep the same order next time user opens Upolski rates page
    switch ($_GET['order'])://decoding $_GET info, exchangeRates.php sends just a number, here is decoded into a string
        case 1:
            $_GET['order'] = 'asc';
            break;
        case 2:
            $_GET['order'] = 'desc';
            break;
    endswitch;
    $order = $_GET['order'];
}

    $search = $_GET['search'];



//to collect companies and exchange rates
$result = mysqli_query($link, "SELECT companies.cid, companies.name AS name, ROUND( rates.c_rate, 2 ) AS current, ROUND( rates.l_rate, 2 ) AS last, ROUND((((rates.c_rate - rates.l_rate) *100 ) / rates.l_rate), 2) AS diff FROM companies INNER JOIN rates ON rates.cid = companies.cid WHERE name LIKE '%$search%' ORDER BY $field $order");
$rows = mysqli_num_rows($result);

//Getting an array of arrays(each array is a database table row) 
$compArray = array();
for ($i = 0; $i < $rows; $i++) {
    $compArray [] = mysqli_fetch_array($result); //Each table row is converted to an asociative array. Each array is an $comArray element.
}

//var_dump($comArray);
//Getting the XML file from printing $compArray in a XML format
$xml = new SimpleXMLElement('<companiesRates/>'); //1-Creating an simple XML object

foreach ($compArray as $rowComp) {
    $nameScape = str_replace('&', '&amp;', $rowComp['name']);
    $nameScape =str_replace('<','&lt;',$nameScape);
    $nameScape=str_replace('>','&gt;',$nameScape);
    $nameScape=str_replace('"','&quot;',$nameScape);
    $nameScape=str_replace("'",'&#39;',$nameScape);
    $currency= '&euro;';
    $a = $xml->addChild('companyRates'); // creating child
    $a->addChild('cid', $rowComp['cid']); // creating child
    $a->addChild('name', $nameScape); // creating child
    $a->addChild('current', $rowComp['current'].' &#x20AC;'); // creating child
    $a->addChild('last', $rowComp['last'].' &#8364;'); // creating child
    $a->addChild('diff', $rowComp['diff'].' &#37;'); // creating child
}


Header("Content-type: text/xml"); //This specifies this is a XML doc
print ($xml->asXML()); //XML Creation
mysqli_close($link);//Closing connection with DB

