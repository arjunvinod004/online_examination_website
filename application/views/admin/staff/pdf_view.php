<html>
<head>
  <title>Staffs</title>
</head>
<body>
  <h1>Staffs</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone number</th>
        <th>Email</th>
<th>Blood group</th>
<th>Passportnum</th>
<th>Iqama number</th>
<th>Medical name</th>
<th>Medical number</th>
      </tr>
    </thead>
    <tbody>
        
      <?php foreach ($data as $values) { ?>
        <tr>
        <td><?php echo $values['userid']; ?></td>
          <td><?php echo $values['emp_id']; ?></td>
          <td><?php echo $values['Name']; ?></td>
          <td><?php echo $values['gender']; ?></td>
          <td><?php echo $values['UserPhoneNumber']; ?></td>
         <td><?php echo $values['userEmail']; ?></td>
          <td><?php echo $values['blood']; ?></td>
          <td><?php echo $values['passportnum']; ?></td>
          <td><?php echo $values['iqamanum']; ?></td>
          <td><?php echo $values['medicalname']; ?></td>
          <td><?php echo $values['medicalnum']; ?></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
