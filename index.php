<!DOCTYPE html>
<html lang="en">
<head>
  <title>Farming</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  <script>
  $(document).ready(function() {
      
      var serialno = 0;
      $("#btnclk").prop('disabled',true)
      $('#btnstr').click(function(){
          $("#btnclk").prop('disabled',false);
          $("#farmtb tbody").empty();
          serialno = 0;
      })
      $('#btnclk').click(function(){
          serialno++;
          if(serialno <= 10){
              if(serialno >= 10){
                  $("#btnclk").prop('disabled',true)
              }
              $.ajax({
                  url:"functions.php",
                  type:"POST",
                  dataType: "JSON",
                  data:{sr:serialno},
                  success:function(data){
                      var tdrow = "<tr id='"+serialno+"'><td>"+ serialno + "\
                      </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                      $("#farmtb tbody").append(tdrow);
                      $("#"+serialno).find("td:eq("+data.fed+")").append("Fed");
                      if(data.farmer){
                          $("#"+serialno).find("td:eq(1)").append("Died");
                      }
                      if(data.cow1){
                          $("#"+serialno).find("td:eq(2)").append("Died");
                      }  
                      
                      if(data.game == 'end'){
                        $.alert({
                          title: 'Game Over!',
                          content: 'Goodbye'
                        })
                        $("#btnclk").prop('disabled',true)
                      }
                  }
              })
              
          }
      })
  })
  </script>
</head>
<body>

<div class="container">
  <h2>Farming</h2>
  <button type="button" class="btn btn-primary" id="btnstr">Start</button>
  <button type="button" class="btn btn-primary" id="btnclk">Click</button>
  <table class="table table-bordered" id="farmtb">
    <thead>
      <tr>
        <th>Round</th>
        <th>Farmer</th>
        <th>Cow 1</th>
        <th>Cow 2</th>
        <th>Bunny 1</th>
        <th>Bunny 2</th>
        <th>Bunny 3</th>
        <th>Bunny 4</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

</body>
</html>
