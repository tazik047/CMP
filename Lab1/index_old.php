<html>
	<head></head>
	<body>
		<!--<form>
			<input type="text" name="name" />
			<input type="submit" value="Send" />
		</form>
		-->
			<?php 
			//echo 'hello, ' . $_GET['name'];
		
		
			
			
			function printMonth($year,$month){
					$day = 1;
					$res = strtotime($year.'-'.$month.'-'.$day);
					$dayNumber = date('N',$res);
					$daysCount = date('t',$res);
					
					
					
					
					$weekDays = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');
					$daysInWeek = count($weekDays);
					$weeks = $daysCount/$daysInWeek + ($daysCount%$daysInWeek?1:0);
					if($dayNumber == 7 && $daysCount >= 30){
						$weeks++;
					}
					
					echo '<table>';
					
					for($i = 0; $i < $daysInWeek; $i++) {
						echo '<th>'.$weekDays[$i].'</th>';
					}
					
					for($i = 0; $i < $weeks; $i++){
						echo '<tr>';	

						for($j = 1; $j <= $daysInWeek; $j++){
							echo '<td>';	
							
							if($dayNumber == $j){
								echo $day++;

								if(++$dayNumber > 7) {
									$dayNumber = 1;
								}
							}
							
							if($day > $daysCount) {
								break;
							}
							
							echo '</td>';
						}
						echo '</tr>';
					}
					echo '</table>';
			}
			
			printMonth($_GET['year'],$_GET['month']);
			
			?>
			<br/>
			<form>
				Month:
				<select name="month">
				<?php
					for($i = 1; $i <= 12; $i++){
						if($i == $_GET['month']){
							 echo '<option selected>'.$i.'</option>';
						} else {
							echo '<option>'.$i.'</option>';
						}
					}
				?>
				</select>
				
				Year:
				<select name="year">
				<?php
					for($i = 1970; $i <= 2020; $i++)
						if($i == $_GET['year']){
							 echo '<option selected>'.$i.'</option>';
						} else {
							echo '<option>'.$i.'</option>';
						}
				?>
				</select>
				
				<input type="submit" value="change"/>
			</form>
	</body>
</html>