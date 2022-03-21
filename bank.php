<!doctype html>
<html lang="en">

<head>
    <title>Bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
function interset_rate($year){
    if($year < 3)
    return 0.1;
    else 
    return 0.15;
}
function calculate_interest($money,$year){
return $money*interset_rate($year)*$year;
}
function getTotalamount($money,$year){
    return $money+calculate_interest($money,$year);
}
function getmonthvalue($total_money,$year){
    return $total_money/($year*12);
}

if($_POST){
    $errors=[];
    if(empty($_POST['name']))
    $errors['name']="<div class='alert alert-danger text-center'> Please enter a your name </div>";
    if(empty($_POST['loan']))
    $errors['loan']="<div class='alert alert-danger text-center'> Please enter a loan amount </div>";
    if(empty($_POST['years']))
    $errors['years']="<div class='alert alert-danger text-center'> Please enter a loan years </div>";
    if(empty($errors)){
        $interest_value=calculate_interest($_POST['loan'],$_POST['years']);
        $totalAmount=getTotalamount($_POST['loan'],$_POST['years']);
        $montly=round(getmonthvalue($totalAmount,$_POST['years']));
    }
}

?>

<body style='background:linear-gradient(#e66465, #9198e5) ;height:100vh;'>
    <div class='container mt-5'>
        <div class='row'>
            <h1 class='col-lg-12 text-center'>Bank</h1>
            <div class='col-lg-6 offset-lg-3'>
                <form method='POST'>
                    <div class="form-group">
                        <label for="input1">Name</label>
                        <input type="text" class="form-control" id="input1" name='name' value='<?= isset($_POST['name'])?$_POST["name"]:"";?>'>
                    </div>
                    <?= isset($errors['name'])?$errors['name']:"";?>

                    <div class="form-group">
                        <label for="input2">Loan amount</label>
                        <input type="number" class="form-control" name='loan' id="input2" value='<?= isset($_POST['loan'])?$_POST["loan"]:"";?>' >
                    </div>
                    <?= isset($errors['loan'])?$errors['loan']:"";?>
                    <div class="form-group">
                        <label for="input3">Loan years</label>
                        <input type="number" class="form-control" name='years' id="input3" value='<?= isset($_POST['years'])?$_POST["years"]:"";?>'>
                    </div>
                    <?= isset($errors['years'])?$errors['years']:"";?>
                    <div class="form-group">
                    <button type="submit" class="btn btn-danger form-control">Submit</button>
                    </div>      
                </form>
            </div>
        </div>
    </div>

    <div class='container mt-5'>
        <div class='row'>
            <div class='col-lg-6 offset-lg-3'>
   <table class="table table-bordered" style='display:<?= ($_POST and empty($errors))?"table":"none"?>'>
   <thead>:
     <tr>
       <th scope="col">Interest rate</th>
       <th scope="col">Loan after interest</th>
       <th scope="col">Monthly paid amount</th>
     </tr>
   </thead>
   <tbody>
     <tr >
       <td><?= $interest_value?></td>
       <td><?=$totalAmount?></td>
       <td><?=$montly?></td>
     </tr>
   </tbody>
 </table>
 </div>
        </div>
    </div>
   



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>