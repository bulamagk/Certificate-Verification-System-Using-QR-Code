<?php
$page = "VIEW STAFF";
require_once "header.php";

if($_SESSION['role'] != 'Admin'){
    header('location: dashboard.php');
}
 ?>

<div class="table-div">
    <?php 
  if(isset($_SESSION['message'])){
    echo '
    <div class="'.$_SESSION['class'].'"><i class="fas fa-check fa-3x"></i> &nbsp; <br> <br>'.$_SESSION['message'].'</div>
    ';
    unset($_SESSION['message']);
  }
  ?>
    <table>
        <tr>
            <th style = "text-align: left;">First Name</th>
            <th style = "text-align: left;">Surname</th>
            <th style = "text-align: left;">Othername</th>
            <th style = "text-align: left;">Email</th>
            <th style = "text-align: left;">Phone</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = 'SELECT id, firstname, surname, othername, email, phone FROM user WHERE role != "Admin"';
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '
                
                <tr>
                    <td style = "text-align: left; padding-left:3px;">'.strtoupper($row["firstname"]).'</td>
                    <td style = "text-align: left;">'.strtoupper($row["surname"]).'</td>
                    <td style = "text-align: left;">'.strtoupper($row["othername"]).'</td>
                    <td style = "text-align: left;">'.strtoupper($row["email"]).'</td>
                    <td style = "text-align: left;">'.$row["phone"].'</td>
                    <td>
                    <a href="delete.php?uid='.$row['id'].'" class="action" onclick="return myFunc()"><i class="fas fa-trash red" title="Delete"></a></i>&nbsp;
                    <a href="edit-user.php?uid='.$row['id'].'" class="action"><i class="fas fa-edit blue" title="Edit"></a></i>&nbsp;
                    </td>
                </tr>
                ';
            }

        }else{
            echo "<tr>
                <td colspan='3'><h3 style='color: black;'> No User </h3> <td>
                </tr>";
        }

        ?>

    </table>
</div>
<script>
    function myFunc(){
        return confirm('Are you sure you want to delete?');
    }
</script>

<?php require_once "footer.php"; ?>