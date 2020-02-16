<?php

class Equity {

        protected $auth_key;
        protected $merchant_code;
        protected $pass_word;
        protected $grant_type;
        protected $url;
        
    }       
            

    class PaymentToken extends  Equity {

        public $auth_key = '';
        public $merchant_code = "4188171122";
        public $url = "https://api-test.equitybankgroup.com/v1/token";
        public $pass_word = "TGvBoRGAcdzuhCs1l0NW2219IsgXQvLU";
        public $grant_type = "password";



        public function getToken() {
            $authkey='';
            $authkey=$_POST['authkey'];
            $grant_type = $this->grant_type;
            $pass_word = $_POST['authpassword'];
            $merchant_code = $this->merchant_code;
            $auth_key = $this->auth_key;
            $url = $this->url;
            $ch = curl_init();   
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array(
                "Authorization: ${authkey}",
                'Content-Type: application/x-www-form-urlencoded'
            ));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"merchantCode=${merchant_code}&password=${pass_word}&grant_type=${grant_type}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec ($ch);
            $token = json_decode($server_output, true);
            if($token['error']){
                echo "Invalid credentials";
            }else {
                echo $token['payment-token'];
            }
            
            curl_close ($ch);  

        }

        
    }
        
    $objtest = new PaymentToken ();
                 
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Djenga Api</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<script>



</script>



<body>



<?php 


$checkout = "";
if ($_POST['environment']==sandbox){

$checkout = 'https://api-test.equitybankgroup.com/v2/checkout/launch';
}
else {
    $checkout = 'https://api.equitybankgroup.com/v2/checkout/launch';
}


?>




<div class="container" style="margin-top: 20px;">
    <div class="card-columns" >
        <div class="card">

            <div class="card-body" style="box-shadow:1px 1px 10px black;">
            <form method='POST'>
            <input type="radio" name="environment" class="form-control-inline" value="sandbox"> sandbox
            <input type="radio" name="environment" class="form-control-inline" value="production"> production
            <!-- get token by admin -->
            <label for="merchantcode">merchantcode
             <input type="text" class="form-control" name="merchantcode">
             </label>
             <label for="authkey">AuthKey
             <input type="text" class="form-control" name="authkey">
             </label>
             <label for="password">Password
             <input type="text" class="form-control" name="authpassword">
             </label>
             <label for="outletcode">OutletCode
             <input type="text" class="form-control" name="outlet">
             </label>
             <input type="submit" class="form-control" value="Save Credentials">
             </form>

            </div>

        </div>

    </div>

</div>
<?php
//Retrieve name from query string and store to a local variable
$merchantcode='';
echo $merchantcode ;
$merchantcode = $_POST['merchantcode'];



$outletcode='';
echo $outletcode ;
$outletcode = $_POST['outlet'];







// echo $name;
?>




<div class="container">
    <div class="card-columns">
        <div class="card">
        <div class="card-footer">

    <form 
        id="eazzycheckout-payment-form"
        action="<?php echo $checkout?>" method="POST">
        <input type="hidden" id="token" name="token" value="<?php echo $objtest->getToken();?>"/>
        <input type="hidden" id="amount" name="amount" value="10000">
        <input type="hidden" id="orderReference" name="orderReference" value="4345rt43">
        <input type="hidden" id="merchantCode" name="merchantCode" value="<?php echo $merchantcode;?>">
        <input type="hidden" id="merchant" name="merchant" value="Jumia">
        <input type="hidden" id="currency" name="currency" value="KES">
        <input type="hidden" id="custName" name="custName" value="Jumia">
        <input type="hidden" id="outletCode" name="outletCode" value="<?php echo $outletcode;?>">
        <input type="hidden" id="extraData" name="extraData" value="N/A" >
        <input type="hidden" id="popupLogo" name="popupLogo" value="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQaWmE9OLh4KHerCwUehjx1ZWHMIRY6IapeLVCC_deFzbzYfL27">
        <input type="hidden" id="ez1_callbackurl" name="ez1_callbackurl" value="http://localhost/finshop/index.php/checkout/order-received/58/?key=wc_order_NLpxa7N6EPUPG">
        <input type="hidden" id="ez2_callbackurl" name="ez2_callbackurl" value="http://localhost/finshop/index.php/checkout/order-received/58/?key=wc_order_NLpxa7N6EPUPG">
        <input type="hidden" id="expiry" name="expiry" value="2025-02-17T19:00:00">
        <input type="submit" id="submit-cg" role="button" class="btn btn-success col-md-4"
           value="Checkout"/>
     </form>


    </div>

        </div>

    </div>

</div>







</body>
</html>   
   
   
   
   
   
   
   
    