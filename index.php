<?php 
$conn = mysqli_connect("localhost","root","","form"); mysqli_query($conn,"set names utf8");

if (isset($_POST['submit'])){

    $name = $_POST['name'];
	$number = $_POST['number'];
	$city = $_POST['city'];
	$other = $_POST['other'];
	
    $res = mysqli_query($conn, "INSERT INTO form(name,number,city,other) VALUES('$name','$number','$city','$other')");
    if($res)header("location:ok.php");
    else echo "خطا";

}

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap-rtl.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
  
  @font-face {
				font-family: 'IranianSansBold';
				src: url('fonts/IranianSansBold.ttf') format('truetype');
				font-weight: normal;
				font-style: normal;
			}

			@font-face {
				font-family: 'IranianSans';
				src: url('fonts/IranianSansRegular.ttf') format('truetype'),
					 url('fonts/IRANSans-web.woff') format('woff');
				font-weight: normal;
				font-style: normal;
			}

			h1,h2,h3,h4,h5,h6,p,span,label,input,.btn,table,select,div,ul,li {
			   font-family: IranianSans !important;
			}
			
			::placeholder {
			  color: red;
			  opacity: 0;
			}
  </style>
</head>
<body style="background: #fff;">
<div class="container-fluid" dir="rtl">

<br>
 <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-5" style="background: #eeeeee61;border-radius: 10px;box-shadow: 1px 1px 7px rgba(0,0,0,.2);border: 2px solid #d2d2d2;margin: 0 auto;">
  <br>
	<h5 class="text-center">ثبت شماره جهت انصراف از دریافت پیامک</h5>
	<hr>
      <form action="" method="post">
		<div class="form-group">
			<div class="row">
				<div class="col-sm-5"><label>نام و نام خانوادگی :</label><span style="color: #f44336; padding: 5px;">*</span></div>
				<div class="col-sm-7"><input name="name" type="text" class="form-control" required="" oninvalid="this.setCustomValidity('این فیلد اجباری است.')" oninput="setCustomValidity('')" placeholder="احمد احمدی"></div>
			</div>
        </div>
		
		
		<div class="form-group">
			<div class="row">
				<div class="col-sm-5"><label>شماره تلفن همراه :</label><span style="color: #f44336; padding: 5px;">*</span></div>
				<div class="col-sm-7"><input name="number" id="number" type="text" class="form-control" required="" oninvalid="this.setCustomValidity('این فیلد اجباری است.')" oninput="setCustomValidity('')" dir="ltr" placeholder=" 09121234567" value="09" maxlength="11"></div>
			</div>
        </div>
		
		<!--<div class="form-group">
			<div class="row">
				<div class="col-sm-5"><label>شماره تلفن همراه :</label><span style="color: #f44336; padding: 5px;">*</span></div>
				<div class="col-sm-7" style=" position: relative; "><input name="number" type="text" class="form-control" required="" oninvalid="this.setCustomValidity('این فیلد اجباری است.')" oninput="setCustomValidity('')" dir="ltr" placeholder=" 09121234567" style="padding-left: 17px;" value="09" maxlength="11"><span style=" position: absolute; top: 7px; left: 33px; background: #fff;">09</span></div>
			</div>
        </div>-->
		
		<div class="form-group">
			<div class="row">
				<div class="col-sm-5"><label>استان محل اقامت :</label><span style="color: #f44336; padding: 5px;">*</span></div>
				<div class="col-sm-7">
					<select class="form-control" name="city" required="" oninvalid="this.setCustomValidity('این فیلد اجباری است.')" oninput="setCustomValidity('')">
						<option value="">لطفا انتخاب کنید</option>
						
						<?php $res  = mysqli_query($conn,"SELECT * from city");
						while($row = mysqli_fetch_assoc($res)) { ?>
						<option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
						<?php } ?>
						
					</select>
				</div>
			</div>
        </div>
		
		<br>
		
		<h6 style="float: right;">علت انصراف</h6><span style="color: #f44336; padding: 5px;">*</span>
		<span style="font-size: 13px; margin-right: 20px; color: #f44336;display: none;" id="error">لطفا یک گزینه را انتخاب کنید.</span>
		<hr>
		
		<div class="form-check" style="margin-bottom: 15px;">
		  <label class="form-check-label">
			<input type="radio" class="form-check-input" name="other" value="تمایلی به دریافت پیامک ندارم" dir="ltr">تمایلی به دریافت پیامک ندارم
		  </label>
		</div>
		<div class="form-check" style="margin-bottom: 15px;">
		  <label class="form-check-label">
			<input type="radio" class="form-check-input" name="other" value="تعداد پیام ها زیاد است">تعداد پیام ها زیاد است
		  </label>
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input type="radio" class="form-check-input" name="other" value="پیام ها تکراری هستند">پیام ها تکراری هستند
		  </label>
		</div>
		<br>
		
		<button type="submit" name="submit" id="submit" class="btn btn-success" style="margin: 0 auto; display: block;padding: 5px 30px; border-radius: 50px;">ثبت شماره</button>
  </form>
	 <br>

  </div>
 </div> 

<br>
</div>

<script>
$("#submit").click(function(){
  var a = $("form :radio:checked").val();
  if(a == undefined){
	  $("#error").show();
  }else $("#error").hide();
});


var input = document.querySelector('#number[type="text"]');

input.addEventListener("keydown", function() {
  var oldVal = this.value;
  console.log(oldVal);
  var field = this;
  console.log("funciona");
  
  setTimeout(function () {
    if(field.value.indexOf('09') !== 0) {
        field.value = oldVal;
    } 
}, 1);
});

</script>

</body>
</html>