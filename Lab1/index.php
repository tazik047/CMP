<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lab 1</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">		
	
		<div class="row panel panel-default col-md-8 col-md-offset-2" style="padding:15px;">
			<!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<?php
					$isTask2 = isset($_POST['date']);
				?>
				<li role="presentation" <?php if(!$isTask2){echo 'class="active"';}?>><a href="#task1" aria-controls="home" role="tab" data-toggle="tab">Task 1</a></li>
				<li role="presentation" <?php if($isTask2){echo 'class="active"';}?>><a href="#task2" aria-controls="profile" role="tab" data-toggle="tab">Task 2</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane <?php if(!$isTask2){echo 'active';}?>" id="task1">
				<br/>
					<?php if(isset($_POST['name'])): ?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Hello!</strong> Hello, <?php echo $_POST['name']; ?>.
						</div>
					<?php endif; ?>
					<form method="POST">
					  <div class="form-group col-md-8 col-md-offset-2">
						<input type="text" class="form-control" id="exampleName" name="name" placeholder="Имя" required>
					  </div>
					  <div class="col-md-offset-2 col-md-8">
						<button type="submit" class="btn btn-default btn-success btn-block">Say, hello</button>
					  </div>
					  
					</form>
				</div>
				<div role="tabpanel" class="tab-pane  <?php if($isTask2){echo 'active';}?>" id="task2">
					<br/>
					<?php 
						if(isset($_POST['date'])){
							$date = DateTime::createFromFormat('Y-m-d', $_POST['date']);
							$firstDay = DateTime::createFromFormat('Y-m-d', $date->format('Y-m-').'01');
							$firstDay = $firstDay->format('N');
							
							print '<p>You select: '. $date->format('d M Y'). '</p>';
							$titles = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');							
							$max_day = cal_days_in_month(CAL_GREGORIAN, $date->format('m'), $date->format('Y'));
							$selected = $date->format('d');
							print '<table class="table table-bordered table-hover"><thead><tr>';
							foreach($titles as $v){
								print '<th class="text-center">'.$v.'</th>';
							}
							print '</tr></thead><tbody><tr>';
							$skip = 1;
							while($skip<$firstDay){
								print '<td></td>';
								$skip++;
							}
							$skip--;
							for($day = 1; $day <=$max_day; $day++){
								print '<td'.($day==$selected?' class="success"':'').'>'.$day.'</td>';
								if($skip==6){
									if($day!=$max_day){
										print '</tr><tr>';
									}
								}
								$skip = ($skip+1)%7;
							}
							while($skip!=0){
								print '<td></td>';
								$skip = ($skip+1)%7;
							}
							print '</tr></tbody></table>';
						}
					?>
					<form method="POST">
					  <div class="form-group col-md-8 col-md-offset-2">
						<input type="date" class="form-control" id="exampleName" name="date" placeholder="Имя" required>
					  </div>
					  <div class="col-md-offset-2 col-md-8">
						<button type="submit" class="btn btn-default btn-success btn-block">Get calendar</button>
					  </div>
					  
					</form>
				</div>
			  </div>
		</div>
		<br/>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  
</html>