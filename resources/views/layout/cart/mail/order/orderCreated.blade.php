
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BazarBaari | Worldclass Bussiness Platform</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="eMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style type="text/css">
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .woocommerce-billing-fields{
          list-style: none;
        }
        .woocommerce-billing-fields ul>li{
          list-style: none;
          margin-right: 25px;
        }
        .deliver{
          float: left;
          border-right: 1px solid black;
        }
        .orderer{
          float: left;
        }
        .panel-heading{
          color:green;
          margin-left: 10%;
        }
        .panel-heading h4 strong{
          margin-left: 2%;
        }
    
    </style>
</head>
<body class="common-home res layout-4">
<div class="main-container container">
  <div class="row">
      <div id="content" class="col-md-12">
          <div class="so-onepagecheckout row">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                  <h4>Order Is Successful.Thank You For Your Order</h3>
                  <h4><strong style="color:red">We will knock you as soon as possible</strong></h4>
                </div>
                <div class="panel-body">
                 <div class="col-left col-md-12">
                    <div class="woocommerce-billing-fields">
                      <ul class="deliver">
                        <li><h3><strong style="color:orange">Delivery Address</strong></h3></li> 
                        <li><h4><strong>Order Id : </strong># {{$order->order_number}}</h4></li>
                        <li><h4><strong>Name : </strong>{{$order->shipping_fullname}}</h4></li> 
                        <li><h4><strong>Phone : </strong>{{$order->shipping_phone}}</h4></li>
                       <li><h4><strong>Country : </strong>{{$order->country->name}}</h4></li>
                       <li><h4><strong>City : </strong>{{$order->city->name}}</h4></li>
                       <li><h4><strong>Delivery Branch : </strong>{{$order->deliverybranch->name}}</h4></li>
                      </ul>
                      <ul class="orderer">
                        <li><h3><strong style="color:orange">Orderer</strong></h3></li> 
                        <li><h4><strong>Name : </strong>{{auth()->user()->name}}</h4></li> 
                        <li><h4><strong>Phone : </strong>{{auth()->user()->phone}}</h4></li>
                        <li><h4><strong>Email : </strong>@php echo substr(auth()->user()->email,0,25)@endphp</h4></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
  </div>
</body>
</html>



