<?php
session_start();
require('connect.php');

$user_id=$_SESSION['user_id'];
$sql="SELECT* from transaction where user_id=$user_id order by id desc limit 20 ";//transaction table se 20 record fetch kro jha pe user id iss variable ki value ke equal ho orr  id ke acc descendind
$result=$conn-> query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <?php
    require('nav.php');
    ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" class="form-control" id="startDate">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="endDate">End Date:</label>
        <input type="date" class="form-control" id="endDate">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="searchBtn" class="invisible">Search:</label>
        <button type="button" class="btn btn-primary btn-block" id="searchBtn">Search</button>
      </div>
    </div>
  </div>
</div>


<div class="container row mb-3" id='result' style='margin:auto;' ></div>

<table class ="table table-border">
<thead> 
<th>Sr.no</th>
<th>Date</th>
<th>Type</th>
<th>Amount</th>
<th>Note</th>
</thead>
<tbody id='tablebody'> 
    <?php
    $i=0;
while($row=$result->fetch_assoc()){
    $i++;
    $class=($row['type']=='earn' )?'success':'danger';
    echo<<<table
<tr> 
<td> $i </td>
<td> {$row['date']} </td>
<td> {$row['type']} </td>
<td class='text-$class'> {$row['amount']} </td>
<td> {$row['note']} </td>


</tr>
table;
}
?>

 <!-- </tr> -->
</tbody>

</table>
<script>
  document.getElementById('searchBtn').addEventListener('click', function() {
    // Get the values from the input fields
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    // Construct the URL with query parameters
    const apiUrl = `fetch.php?start_date=${startDate}&end_date=${endDate}`;

    // Make a GET request using the Fetch API
    fetch(apiUrl)
      .then(response => {
        
        return response.json();
      })
      .then(data => {
        // Process the data from the server
        console.log(data);
        let table=document.getElementById('tablebody');
        table.innerHTML='';
        let i=0;
        let earn =0;
        let spend=0;
        let html='';
        data.forEach(element => {
          let color='success';
          if(element.type=='earn'){
            earn += parseInt(element.amount);
          }
          else{
            spend+=parseInt(element.amount);
            color='danger';
          }

          i++;
          html+=`<tr>
<td> ${i} </td>
<td> ${element.date} </td>
<td> ${element.type} </td>
<td class='text-${color}'> ${element.amount} </td>
<td> ${element.note} </td>
</tr>`;
        });
        table.innerHTML=html;
        let result=`<div class="container mt-5 col-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="media d-flex">
                <div class="media-body text-left">
                    <h3 class="text-danger">Rs.${spend}</h3>
                    <span>Spent</span>
                </div>
                <div class="align-self-center">
                   <img src="spend.jpeg" alt="" style="width:4rem; height:4rem;" >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 col-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="media d-flex">
                <div class="media-body text-left">
                    <h3 class="text-success">Rs.${earn}</h3>
                    <span>Earned</span>
                </div>
                <div class="align-self-center">
                   <img src="earn.jpeg" alt="" style="width:4rem; height:4rem;" >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 col-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="media d-flex">
                <div class="media-body text-left">
                    <h3 class="text-warning">Rs.${earn-spend}</h3>
                    <span>Savings</span>
                </div>
                <div class="align-self-center">
                   <img src="saving.avif"  style="width:4rem; height:4rem;">
                </div>
            </div>
        </div>
    </div>
</div>`;

document.getElementById('result').innerHTML=result;
              
        console.log(earn);
        console.log(spend);
      })
      .catch(error => {
        // Handle errors during the fetch
        console.error('Error during fetch:', error);

      });
  });
</script>
</body>
</html>
