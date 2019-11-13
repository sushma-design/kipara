<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
<!--            <li class="header"></li>-->
            <li class="<?php if($page=='a1') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if($page=='addcat' || $page=='modifycategory' || $page=='deletecategory') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Category</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($page=='addcat') { echo 'active'; }?>"  ><a href="addcategory.php"><i class="fa fa-plus-square"></i>Add Category</a></li>
                    <li class="<?php if($page=='modifycategory') { echo 'active'; }?>" ><a href="modifycategory.php"><i class="fa fa-retweet"></i>Modify Category</a></li>
                    <li class="<?php if($page=='deletecategory') { echo 'active'; }?>"  ><a href="deletecategory.php"><i class="fa fa-trash-o"></i>Delete Category</a></li>
                </ul>
            </li>

            <li class="<?php if($page=='addproduct' || $page=='modifyproduct' || $page =='deleteproduct') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Product</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($page=='addproduct') { echo 'active'; }?>"  ><a href="addproduct.php"><i class="fa fa-plus-square"></i>Add Product</a></li>
                    <li class="<?php if($page=='modifyproduct') { echo 'active'; }?>" ><a href="modifyproduct.php"><i class="fa fa-retweet"></i>Modify Product</a></li>
					<!-- <li class="<?php if($page=='changeimage') { echo 'active'; }?>"  ><a href="changeimage.php"><i class="fa fa-trash-o"></i>Modify Product Image</a></li> -->
                    <li class="<?php if($page=='deleteproduct') { echo 'active'; }?>"  ><a href="deleteproduct.php"><i class="fa fa-trash-o"></i>Delete Product</a></li>

                </ul>
            </li>
            <li class="<?php if($page=='addsubcat' || $page=='modifysubcategory') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Subcategory</span>
                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($page=='addsubcat') { echo 'active'; }?>"  ><a href="addsubcategory.php"><i class="fa fa-plus-square"></i>Add Subcategory</a></li>
                    <li class="<?php if($page=='modifysubcategory') { echo 'active'; }?>" ><a href="modifysubcategory.php"><i class="fa fa-retweet"></i>Modify Subategory</a></li>
                    <!-- <li class="<?php if($page=='deletesubcategory') { echo 'active'; }?>"  ><a href="deletesubcategory.php"><i class="fa fa-trash-o"></i>Delete Subategory</a></li> -->
                </ul>
            </li>

            <li class="<?php if($page=='addinfohead' || $page=='modifyinfohead' || $page =='deleteinfohead') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Additional Information</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($page=='addinfohead') { echo 'active'; }?>"  ><a href="addinfohead.php"><i class="fa fa-plus-square"></i>Add Additional Information</a></li>
                    <li class="<?php if($page=='modifyinfohead') { echo 'active'; }?>" ><a href="modifyinfohead.php"><i class="fa fa-retweet"></i>Modify Additional Information</a></li>
                    <li class="<?php if($page=='deleteinfohead') { echo 'active'; }?>"  ><a href="deleteinfohead.php"><i class="fa fa-trash-o"></i>Delete Additional Information</a></li>

                </ul>
            </li>

            
            <li class="<?php if($page=='addspechead' || $page=='modifyspechead' || $page =='deletespechead') { echo 'active'; }?> treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Specifications</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($page=='addspechead') { echo 'active'; }?>"  ><a href="addspechead.php"><i class="fa fa-plus-square"></i>Add Specifications</a></li>
                    <li class="<?php if($page=='modifyspechead') { echo 'active'; }?>" ><a href="modifyspechead.php"><i class="fa fa-retweet"></i>Modify Specifications</a></li>
                    <li class="<?php if($page=='deletespechead') { echo 'active'; }?>"  ><a href="deletespechead.php"><i class="fa fa-trash-o"></i>Delete Specifications</a></li>
                </ul>
            </li>

            <li class="<?php if($page=='partner') { echo 'active'; }?> treeview">
                <a href="partner.php">
                    <i class="fa fa-university"></i> <span>Request For Partner</span>
                </a>
            </li>

            <li class="<?php if($page=='resume') { echo 'active'; }?> treeview">
                <a href="resume.php">
                    <i class="fa fa-university"></i> <span>Uploaded resume</span>
                </a>
            </li>

            <li class="<?php if($page=='addnews') { echo 'active'; }?> treeview">
                <a href="addnews1.php">
                    <i class="fa fa-plus-square"></i><span>Add News</span>
                </a>
            </li>

            <li class="<?php if($page=='onlineorder') { echo 'active'; }?> treeview">
                <a href="onlineorder.php">
                    <i class="fa fa-university"></i> <span>Online Order</span>
                </a>
            </li>

            <li class="<?php if($page=='pendinginvoice') { echo 'active'; }?> treeview">
                <a href="pendinginvoice.php">
                    <i class="fa fa-university"></i>
                    <span>Pending Payment</span>
                </a>
                <!-- <ul class="treeview-menu">
                    <li class="<?php if($page=='pendingpayment') { echo 'active'; }?>"  ><a href="pendingpayment.php"><i class="fa fa-plus-square"></i>Estimation</a></li>
                    <li class="<?php if($page=='pendinginvoice') { echo 'active'; }?>" ><a href="pendinginvoice.php"><i class="fa fa-retweet"></i>Invoice</a></li>
                </ul> -->
            </li>
            <li class="<?php if($page=='invoicereport') { echo 'active'; }?> treeview">
                <a href="invoicereport.php">
                    <i class="fa fa-university"></i> <span>Reports</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>