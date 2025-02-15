<html>
<head>
  <title>Tasks</title>
</head>
<body>
  <h1>Tasks</h1>
  <table>
    <thead>
      <tr>
      <th>Id</th>
        <th>Name</th>
        <th>Location</th>
        <th>Project </th>
        <th>Date</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
        
      <?php foreach ($data as $values) { ?>
        <tr>
        <td><?php echo $values['id']; ?></td>
        <td><?php echo $values['name']; ?></td>
          <td><?php echo $values['job_location']; ?></td>
          <td><?php echo $values['proj_name']; ?></td>
          <td><?php echo $values['date_assign']; ?></td>
          <?php 
                            if($values['status'] == 0 && $values['work_approve'] == 0){
                              $class= "text-danger";
                              $text = "Pending";
                            }if($values['status'] == 0 && $values['work_approve'] == 1){
                              $class= "text-primary";
                              $text = "Approved";
                            }if($values['status'] == 1 && $values['work_approve'] == 1){
                              $class= "text-info";
                              $text = "Started";
                            }if($values['status'] == 2 && $values['work_approve'] == 1){
                              $class= "text-success";
                              $text = "Completed";
                            }
                            ?>
          <td><?php echo $text; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
