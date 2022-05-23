<?php
include ('config.php');

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <?php
        
        if(isset($_POST['create'])){
            $firstname=$_POST['firstname'];
            $age=$_POST['age'];
            $trainer=$_POST['trainer'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $country=$_POST['country'];

            $sql = "SELECT * FROM user_inside WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user_inside (firstname,age,trainer, email,phone,country)
					VALUES ('$firstname','$age','$trainer', '$email','$phone', '$country')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$firstname = "";
                $age="";
                $trainer="";
				$email = "";
                $phone="";
                $country="";
				#$_POST['password'] = "";
				#$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
        
        //header("Location:registration.php");
       // exit;
        }
        ?>
    </div>

    <div>
        <form action="" method="post">
            <div class="container">
                <div class="row">
                <div class="col-sm-3">
                <h1>Registration</h1>
                <p>Payment through Whatsapp.</p>
                <div class="whatsapp_float">
    <a href="https://wa.me/919728705343" target="_blank"><img src="whatsapp.png" width="50px" class="whatsapp_float_btn"/></a>
</div>
                <hr class="mb-3">
                <label for="firstname"><b>Full Name</b></label>
                <input class="form-control" type="text" id="firstname" name="firstname" required="" onkeypress="return /[a-z]/i.test(event.key)">

                <label for="age"><b>Age</b></label>
                <input class="form-control" type="text" id="age" name="age" required="" onkeypress="return /[0-9]/i.test(event.key)">

                <label for="trainer"><b>Trainer name</b></label>
                <input class="form-control" type="text" id="trainer" name="trainer" required>

                <label for="email"><b>Email address</b></label>
                <input class="form-control" type="text" id="email" name="email" required>

                <label for="phone"><b>Phone number </b></label>
                <input class="form-control" type="text" id="phone" name="phone" required="" onkeypress="return /[0-9]/i.test(event.key)">

                <label for="country"><b>Country</b></label>
                <input class="form-control" type="text" id="country" name="country" required="" onkeypress="return /[a-z]/i.test(event.key)">
                <hr class="mb-3">

                <input class="btn btn-primary" type="submit" id="register" name="create" value="Submit Details">
                <input class="btn btn-primary" type="button" value="Go back!" onclick="history.go(-2)">
                </div>
                
                </div>
                </div>
            </div>
<!-- </form> -->
<!-- </div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){
            var valid=this.form.checkValidity();
            if(valid){
                var firstname=$('#firstname').val();
            var age=$('#age').val();
            var trainer=$('#trainer').val();
            var email =$('#email').val();
            var phone=$('#phone').val();
            var country=$('#country').val();
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:'process.php',
                    data:{firstname: firstname, age: age,trainer: trainer,email: email, phone: phone, country: country},
                    sucess:function(data){
                        Swal.fire({
            'title': 'Successful',
            'text':'data',
            'type':'success'
        })

                    },
                    error: function(data){

                        Swal.fire({
            'title': 'Errors',
            'text':'There were errors while saving the data',
            'type':'error'
        })

                    }
                });
            
            }
            else{
                
            }
            

        });
        
    
    });
</form>
    </div>
    
</body>
</html>