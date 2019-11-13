<?php
include 'header.php';
$page = 'deletespechead';
include 'sidebar.php';
include 'connection.php';

?>

<style type="text/css">
    table{
        width: 40%;
        margin: 20px 0px 20px 10px;
        border-collapse: collapse;


    }
    table, th, td{
        font-size: 20px;

    }
    table th, table td{
        padding: 5px;
        text-align: left;  }

    tr {
        font-size:23px  }
</style>


<script>

    function deleteCat(id)
    {
        var conf =(confirm("Are You Sure To Delete This Information..?"));

        if(conf == true) {

            var catid = $("#catid-"+id).val();
            $('#tr-'+id).hide(1000);

            $.ajax({
                type: "POST",
                url: "delinfohead.php",
                dataType: 'json',
                data: {
                    catid: catid
                },
                success: function (msg) {
                    alert(msg);


                }
            });

        }
    }


</script>

<div class="content-wrapper" >
    <section class="content" >
        <div class="row"  >
            <div class="col-lg-12 col-xs-12" >

                <div class="box box-danger"style="padding: 0px 0px 20px 20px;">
                    <div class="box-header">
                        <h2>Delete Additional Information</h2>
                    </div>

                    <form role="form" method="post" name="form1" action="" >
                        <table  class="" style="margin : 10px 20px 20px 0px;width: 25%">

                            <thead>
                            <tr>
                                <th style="font-size: 16px; text-align: center">Sr. No.</th>
                                <th style="font-size: 16px; text-align: center">Additional Information</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr id="firstrow">
                                <td style="font-size: 16px">
                                    <?php
                                    $result =mysql_query("SELECT * FROM infohead WHERE deletestatus='YES' ");
                                    $count=0;
                                    while ($row = mysql_fetch_array($result)){
                                    $id = $row['id'];
                                    $infohead = $row['infohead'];
                                    $count=$count+1;
                                    ?>

                            <tr id="tr-<?php echo $count;?>">
                                <td><div class="col-md-12">
                                        <input class="form-control" style="width:50px" type="text" name="" value="<?php echo $count; ?>" readonly>
                                        <input type="hidden" name="catid[]" id="catid-<?php echo $count;?>" value="<?php echo $id;?>">
                                    </div></td>


                                <td> <div class="col-md-12">
                                        <input type="text" style="width: 250px;" class="form-control" value="<?php echo  $infohead; ?>" name="infohead[]" readonly  id="infohead<?php echo $count;?>">
                                    </div></td>

                                <td><i class="fa fa-trash-o" aria-hidden="true" onclick="deleteCat(<?php echo $count;?>);"></i></td>

                                <?php
                                }
                                ?>
                            </tr>
                            </tbody>
                        </table>

                        <input type="hidden" name="count" id="count" value="<?php echo $count; ?>">


                    </form>
                </div>

            </div>
        </div>
    </section>
</div>

<?php
include 'footer.php';
?>
