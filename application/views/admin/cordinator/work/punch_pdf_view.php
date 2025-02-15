<html>
<head>
  <title>Staff Attendence</title>
</head>
<body>
  <h1>Attendence-<?=$staff['Name'];?></h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Punchin Time</th>
        <th>Punchout Time</th>
        <th>Total Hrs</th>
        <th>Timezone</th>
        
      </tr>
    </thead>
    <tbody>
        
      <?php foreach ($data as $values) 
      { 
        date_default_timezone_set('UTC');
// Set employee time zone
$employee_time_zone = new DateTimeZone($values['timezone']);
// Set punch-in time
$punchindatetime=new DateTime($values['punch_in_date'].' '. $values['punch_in_time']);//combine date time together of punchin
$punchoutdatetime=new DateTime($values['punch_out_date'].' '. $values['punch_out_time']);
// Convert punchin and punchout time to employee's time zone
$punchindatetime->setTimezone($employee_time_zone);
$punchoutdatetime->setTimezone($employee_time_zone);
        ?>
        <tr>
        <td><?php echo $values['punch_id']; ?></td>
          <td><?php echo $punchindatetime->format('d-m-Y H:i:s T'); ?></td>
          <td><?php echo $punchoutdatetime->format('d-m-Y H:i:s T'); ?></td>
          <td><?php echo $values['total_hrs']; ?></td>
          <td><?php echo $values['timezone']; ?></td>
        

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
