<?php $__env->startSection('nav'); ?>
<div id="nav">
  		<div class="navbar navbar-inverse navbar-fixed-top gradient-green" data-spy="affix" data-offset-top="100">
    		<div class="container">
      		<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			    <a href="<?php echo e(URL::to('')); ?>" class="navbar-brand">Simekskul</a>
			    <a class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</a>
      			<div class="navbar-collapse collapse">
        			<ul class="nav pull-right navbar-nav">
        				  <li><a href="<?php echo e(URL::to('halamanutama')); ?>">DASBOR</a></li>
        				  <li><a href="#">EKSTRAKURIKULER</a></li>
          				<li><a href="<?php echo e(route('login')); ?>">LOGIN</a></li>
                  <li><a href="#">LOGOUT</a></li>
          				<li><a href="#"><img class="img-circle" src="<?php echo e(URL::asset('assets/images/profile.jpg')); ?>" style="width:32px;" alt="">&nbsp;&nbsp;Jarwo</a></li>
          				<!-- <li><a href="#"><span class="badge">2</span></a></li> -->
        			</ul>
      			</div>
    		</div>
  		</div><!-- /.navbar -->
	</div>
<?php $__env->stopSection(); ?>