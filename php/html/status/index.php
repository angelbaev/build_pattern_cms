<table>
<tr>
						<td width="388" valign="top" height="225">
						<p style="line-height: 1.2; margin-top: 0; margin-bottom: 0">
						<font size="5" face="Tahoma" color="#3C3929">Проверка на 
						статус</font></p>
						<p style="line-height: 150%; ">
						<font size="2" face="Tahoma">Уважаеми пациенти,<br>
						в съответствие с Правилника за организацията на работата 
						и дейността на "Център за асистирана репродукция" гр. 
						София до 31 юли 2014 г. да очакват повикване одобрените 
						заявители със заявления до номер <b>22200</b> 
						включително!</font></p></td>
						<td width="21" valign="top" height="225" align="center">
						<p style="line-height: 1.2; margin-top: 0; margin-bottom: 0">
						<img width="1" height="207" border="0" src="images/template/vertical.png"></p></td>
						<td width="460" valign="top" height="225">
<br><br>						
<form action="http://www.car-bg.org/status.php" id="fq" method="get">
<table>
<tr>
<td>
Номер:
</td>
<td>
<input type="text" name="number" value="<?php echo $number; ?>" style="width: 180px;" autocomplete="off">
</td>
<td>
<input type="submit"  value="Провери">
</td>
</tr> 
</table>  
</form>	
<br>
<?php if (isset($_GET['number'])){?>
<?php if(count($reports) == 0){?>
  <div style="color:red;">Няма намерени резултати!</div>
<?php } else { ?>
<table border="1" style="border-collapse:collapse;">
<tr>
  <th width="30">#</th>
  <th width="80">Номер</th>
  <th width="80">Дата</th>
  <th width="140">Комисия</th>
  <th width="100">ЕГН</th>
</tr>
<?php $i = 0; ?>
<?php foreach($reports as $result){?>
<tr>
  <td><?php echo (++$i); ?></td>
  <td><?php echo $result['number']; ?></td>
  <td><?php echo date('d.m.Y', strtotime($result['date'])); ?></td>
  <td><?php echo $result['status']; ?></td>
  <td><?php echo substr($result['EGN'], 0, 7).'***'; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>	
<?php } ?>				
						
						</td>
						</tr> 
</table>