<?php
$connect = mysqli_connect('localhost','root','', 'registration');
//mysql_select_db('registration');

$data = 'Select * from user';
$get  = mysqli_query($connect,$data);
 $count = mysqli_num_rows($get);

        if($count < 1){
            echo "no data found";
        }else{
            $final= array();
            while ($result =  mysqli_fetch_array($get))
             
            {
                    
                    $final[] = $result; 
                    
                }
               
        } 
         

?>
<!DOCTYPE html>
<html>
<head>

<!-- <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" language="javascript" src="js/query-3.3.1.js"></script>z-->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/style1.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th> Action </th>
                
            </tr>
        </thead>
                <tbody>
              <?php foreach($final as $key => $value) {
                
                
               ?>      
               <tr>
                    <td><?php echo $value['firstname']?></td>
                    <td><?php echo $value['lastname']?></td>
                    <td><?php echo $value['username']?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['file']?></td>
                    <td>
                        <button  class="edit" data-id="<?php echo $value['id']?>" id= "<?php echo $value['id']?>" data-toggle="modal" data-target="#editModal">Edit</button>&nbsp; &nbsp;
                        <button delete-data-id="<?php echo $value['id']?>" id= "<?php echo $value['id']?>" class="delete">Delete</button>
                    </td>
                </tr>
<?php  } ?>
                </tbody>


    </table>


<script type="text/javascript">
    
    $(document).ready(function() {
    $('#example').DataTable();
} );


jQuery(document).ready(function(){
jQuery(".edit").click(function(){
    var attr = jQuery(this).attr('data-id');
   jQuery.ajax({
        type: "POST",
        url: "update.php",
        data: {"id": attr},
        cache: false,

success: function(result){
var data =jQuery.parseJSON(result);
var firstname = data.firstname;
var lastname = data.lastname;
var username = data.username;
var email = data.email;
var contact = data.file;
var hideid  =  data.id;
jQuery('.name1').val(firstname);
jQuery('.lname1').val(lastname);
jQuery('.uname1').val(username);
jQuery('.email1').val(email);
jQuery('.contact1').val(contact);
jQuery('.hide').val(hideid);
   
}

});
});
});




$(document).ready(function(){
$(".delete").click(function(){
    var dataid = $(this).attr('delete-data-id');
    
   $.ajax({
        type: "POST",
        url: "delete.php",
        data: {"deleteid": dataid},
        cache: false,

success: function(result){
    alert(result)
    if(result==1){
         location.reload();
    }


   
}

});
});
});

$(document).ready(function(){
$("#update").click(function(){
var data = $('#data_update').serialize();

//alert(data);
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "dataupdate.php",
data: data,
cache: false,
success: function(result){
  
  if(result){
    location.reload();
  }

}
});

return false;
});
});

</script>

        <!-- Modal -->
      <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Pleaes Update your information</h5>
            </div>
            <div class="modal-body">
                <!--modal update form-->
                    <form id="data_update" method="post" enctype="multipart/form-data">
            <div id="create">
               
                <div class="update_success"><h4> Please Update</h4></div>

                    <div>
                        <input type="hidden" class="hide" value="" name="hide">
                        <label> First Name :</label>
                        <input value="" id="name" name="fname" class="name1  validate[required]" type="text">
                      

                        <label> Last Name :</label>
                        <input value="" id="lname" class="lname1 validate[required]" name="lname" type="text">
                        

                        <label> Username :</label>
                        <input value="" id="uname" class="uname1 validate[required]" name="uname"type="text">
                        

                        <label>Email :</label>
                        <input value="" id="email" class="email1 validate[required,custom[email]]" name="email" type="text">
                        

                       
                        
                        <label>Contact No :</label>
                        <input value="" id="contact" class="contact1 validate[required,custom[number]] " name="contact" type="text">
                        

                        <input id="update" type="button" value="update">
                    </div>
            </div>
        </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
         </div>
     </div> 
</body>
</html>