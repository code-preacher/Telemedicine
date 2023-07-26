       <?php 
       ob_start();
       require_once '../library/lib.php';
       require_once '../classes/crud.php';

       $lib=new Lib;
       $crud=new Crud;

       $lib->check_login2();

       ?>  
       <!DOCTYPE html>
       <html>
       <head>
        <meta charset="UTF-8">
        <title>TELEMEDICINE SYSTEM | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
     folder instead of downloading all of them to reduce the load. -->
     <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="skin-blue">
      <div class="wrapper">

        <?php
        include 'header.php';
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php
        include 'sidebar.php';
        ?>

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>Health Support Issues
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Health Support Issues</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">

            <div class='row'>
              <div class='col-md-10 col-md-push-1'>
                <!-- DIRECT CHAT -->
                <div id="myDirectChat" class="box box-warning direct-chat direct-chat-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">Direct Chat</h3>
                    <div class="box-tools pull-right">
                      <span data-toggle="tooltip" title=" <?php echo $qc; ?> New Messages" class='badge bg-yellow'><?php echo $crud->countAllById22('chat',$_SESSION['id']); ?></span>
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">

                      <ul class='contacts-list'>
                  <?php
                  $qt=$crud->displayAll('doctor');
                  $c=1;
                  if ($qt) {

                    foreach($qt as $dx){
                      ?>

                    <li>
                    <a href="reply.php?id=<?php echo $dx['email']; ?>">
                    <?php
                    if ($dx['gender']=='male') {
                     ?>
                     <img class="direct-chat-img" src="../dist/img/avatar5.png" alt="message user image" /><!-- /.direct-chat-img -->
                     <?php
                   } else {
                    ?>
                    <img class="direct-chat-img" src="../dist/img/avatar2.png" alt="message user image"/><!-- /.direct-chat-img -->
                    <?php
                  } 
                  ?>
                  <div class='contacts-list-info bg-primary'>
                    <span class='contacts-list-name' style="color: white;">
                    Dr. <?php echo $dx['name'].' ('.$crud->displayNameById('specialization',$dx['specialization']).')'; ?>
                     <small class='contacts-list-date pull-right' style="color: white;">
                       <span class='badge bg-light'><?php echo $crud->countAllById6($dx['email'],$_SESSION['id']); ?></span> &nbsp;&nbsp;&nbsp;</small>
                   </span>
                 </div><!-- /.contacts-list-info -->
               </a>
             </li><!-- End Contact Item -->
             <?php
           }

         } else {
          echo "<center>No Doctor at the moment</center>";
        }
        ?>

      </ul><!-- /.contatcts-list -->
                           </div><!-- /.direct-chat-text -->
                         </div><!-- /.direct-chat-msg -->

                        



  </div><!-- /.box-body -->
</div><!--/.direct-chat -->
</div><!-- /.col -->


</div><!-- /.row -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<?php
include 'footer.php';
?>
</body>
</html>