
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body{
    background-color:white;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>
<script type="text/javascript">
            $(document).ready(function()
            {
                $("#email").keyup(function()
                {
                   
                    //get selected parent option 
                    var student_email = $("#email").val();              
                    //alert(student_email);
                    
                    $.ajax(
                            {
                                type: "GET",
                                url: "email.php?id="+student_email,
                                success: function(data)
                                {                                    
                                    $("#info").html(data);                                    
                                }
                            });
                    
                });

            });
        </script>
</head>
<?php
$conn = mysqli_connect("localhost","root","","orange");
if(isset($_POST['submit'])){
   
    $fname=$_POST['first_name']	; 
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $mobile=$_POST['mobile'];
    $query2= "SELECT * FROM students where student_email='$email'";
    $result2 = mysqli_query($conn,$query2);
           $row2 = mysqli_fetch_assoc($result2);
if(!$row2){
    $query="INSERT INTO students (student_name,,student_email,student_password,student_mobile)
    VALUES ('$fname',,'$email','$pass','$mobile')";
     $result=mysqli_query($conn,$query);
}


}
?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="POST">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="mobile">
			    					</div>
			    				</div>
			    			</div>
                            <div id="info"></div>
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
                            
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block" name="submit">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>