<?php
/**
 * Created by PhpStorm.
 * User: Tam Tran
 * Date: 5/30/2015
 * Time: 4:06 AM
 */


error_reporting(0);
$referer = "https://www.tradedoubler.com"; // site main url
$url = "https://login.tradedoubler.com/pan/login"; // url of login form post too

$ch = curl_init();

$postvars = "j_username=azzarev&j_password=emanuele81&login=Y"; // list the form variables

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // HTTPS
curl_setopt($ch, CURLOPT_REFERER, $referer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_MUTE, 1); // do not identify client as Curl
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"); // fake to be Internet Explorer 6.0
curl_setopt($ch, CURLOPT_POST, 1); // change if GET is used in the form
curl_setopt($ch, CURLOPT_HEADER, 1); // return HTTP header
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars); // send the POST variables separated with &
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");  // autosaves cookies in tmp file
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

$page = curl_exec($ch); // the returned page
//echo '<pre>'.print_r($page,true).'</pre>';die();
$error = curl_error($ch);
// echo $error."\r\n"; // for debuging purposes
curl_close($ch);


$url = 'https://reports.tradedoubler.com/pan/aReport3.action?reportName=aAffiliateEventBreakdownReport&columns=timeOfVisit&columns=timeOfEvent&columns=timeInSession&columns=lastModified&columns=epi1&columns=eventName&columns=pendingStatus&columns=siteName&columns=graphicalElementName&columns=productName&columns=productNrOf&columns=productValue&columns=open_product_feeds_id&columns=open_product_feeds_name&columns=voucher_code&columns=deviceType&columns=os&columns=browser&columns=vendor&columns=device&columns=affiliateCommission&columns=link&columns=leadNR&columns=orderNR&columns=pendingReason&columns=orderValue&startDate=01/04/15&endDate=30/05/15&isPostBack=&metric1.lastOperator=/&interval=&favoriteDescription=&currencyId=EUR&event_id=0&pending_status=1&run_as_organization_id=&minRelativeIntervalStartTime=0&metric1.summaryType=NONE&includeWarningColumn=true&includeMobile=1&metric1.operator1=/&latestDayToExecute=0&showAdvanced=false&breakdownOption=1&metric1.midFactor=&reportTitleTextKey=REPORT3_SERVICE_REPORTS_AAFFILIATEEVENTBREAKDOWNREPORT_TITLE&metric1.columnName1=orderValue&setColumns=true&metric1.columnName2=orderValue&reportPrograms=&metric1.midOperator=/&dateSelectionType=1&favoriteName=&affiliateId=&dateType=1&period=custom_period&tabMenuName=&maxIntervalSize=0&emptyPlaceHolder_0=&favoriteId=&sortBy=timeOfEvent&metric1.name=&filterOnTimeHrsInterval=false&customKeyMetricCount=0&metric1.factor=&showFavorite=false&separator=&format=XML';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // HTTPS
curl_setopt($ch, CURLOPT_REFERER, $referer); // use the loginpage as referer this time
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt"); // load cookies from tmp file



$page = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);
//fclose($fp);

//echo $error."\r\n"; // for debuging purposes

echo $page;die(); // the returned page


?>