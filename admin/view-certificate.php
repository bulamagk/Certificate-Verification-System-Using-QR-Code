<?php
$page = "VIEW CERTIFICATES";
require_once "header.php";
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
            <th>Matriculation Number</th>
            <th>Certificate</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = 'SELECT * FROM certificate';
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '
                
                <tr>
                    <td>'.strtoupper($row["matricno"]).'</td>
                    <td>
                    <a href="../'.$row['certificate'].'" target="_blank" class="cert-img"><img src="../'.$row['certificate'].'" alt=""></a>
                    </td>
                    <td>
                    <a href="delete.php?cid='.$row['id'].'" class="action" onclick="return myFunc()"><i class="fas fa-trash red" title="Delete"></a></i>&nbsp;
                    <a href="edit-certificate.php?cid='.$row['id'].'" class="action"><i class="fas fa-edit blue" title="Edit"></a></i>&nbsp;
                    </td>
                </tr>
                ';
            }

        }else{
            echo "<tr>
                <td colspan='3'><h3 style='color: black;'> No Certificate </h3> <td>
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