

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php //echo (!empty($setting->title))?:$setting->title; ?> <?php echo (!empty($title)?$title:null) ?></title>
  <style type="text/css">

        .row{
            display: flex;
            flex-direction: row;
            min-width: 100%;
        }

        .col-md-6{
            width:45%;
            padding: 2%;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        .detail tr td div{
            padding: 5px!important;
        }

        table tr td{
            padding: 8px!important;
        }

        table tr th{
            padding: 8px!important;
        }
        
        p{
            text-align: justify;
            text-align: 12pt;
        }
        h1,h2{
            color: #108bde;
        }
        .bg-dark{
            background-color:#00000;
            color:white;
        }


  </style>
  </head>
<body>

<?php require_once('report_strategys.php'); ?>

</body>
</html>