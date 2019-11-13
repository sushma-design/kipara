<?php
$page='invoicereport';
include 'connection.php';
include 'header.php';
include 'sidebar.php';

?>
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <style type="text/css">
        table{
            width: 90%;
            margin: 20px 0px 20px 50px;
            border-collapse: collapse;

        }
        table, th, td{
            font-size: 20px;
        }
        table th, table td{
            padding: 10px;
            text-align: left;  }

        tr {
            font-size:23px  }
    </style>

    <script type="text/JavaScript">
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode != 46 && charCode > 31
                && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
		 function validation()
        {
            var fdate = $("#fdate").val();
            var tdate = $("#tdate").val();
          
			if(fdate =='')
			{
		       alert("Please Select Date") ;
			   return false;
			}if(tdate =='')
			{
		       alert("Please Select Date") ;
			   return false;
			}
				document.getElementById("Submit").disabled = true;
                document.form1.action = "showinvoicereport.php";
                document.form1.submit();    // Submit the page
               return true;
        }
		
        
    </script>
    <!-- The Modal -->
   

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <form role="form" action="" method="post" name="form1">
                        <div class="box box-danger" style="padding: 0px 0px 10px 20px; ">
                            <div class="box-header with-border">
                                <h3>Online Order Invoice Report</h3>
                            </div>
 
                              <table width="100%" class="">
                                <tr>
                                    <td width="25%">Select From Date:</td>
                                    <td width="25%">
										<?php $date = date('Y-m-d');?>
                                         <input id="fdate" name="fdate" class="form-control" type="date" value="<?php echo $date; ?>">
                                    </td>
                               
								
                                    <td width="25%">Select To Date:</td>
                                    <td width="25%">
										<?php $date = date('Y-m-d');?>
                                         <input id="tdate" name="tdate" class="form-control" type="date" value="<?php echo $date; ?>">
                                    </td>
                                </tr>
								
                            </table>
							<input type="hidden" name="user" id="user" value="<?php echo $user1; ?>">
                            <input type="hidden" name="counter" id="counter" value="1">
                            <input type="button" name="btnSubmit" id="Submit" value="Submit" onclick="validation();" class="btn btn-primary" style="margin: 5px 0px 0px 40%; width: 100px">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


<?php include 'footer.php' ?>