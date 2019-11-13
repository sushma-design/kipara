<style>
.pro_name {
    margin: 0 16px 12px;
    height: 20px;
}

.text-new {
	margin-left: 15px;
}

body {
    font-family: 'Muli', sans-serif;
    color: #292929;
    /*font-size: 16px;*/
    line-height: 14px;
    font-weight: 400;
}
.blog-isotope1 .cat {
    float: left;
    width: calc(105.33% - 20px);
    padding: 20px 1px 20px;
    margin-bottom: 30px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}

</style>



                      <?php 
					  include 'connection.php';
					        $id = $_REQUEST['id'];
							
							$result = mysql_query("SELECT * FROM product WHERE id='$id'");
							$row1 = mysql_fetch_array($result);
							$cat = $row1['category'];
							$productname = $row1['productname'];
							$mainprice = $row1['mainprise'];
							$scratchprice = $row1['scratchprise'];
							
					  ?>
						

                         <div class="title-highlighter" style=""><strong><span>CATEGORY</span></strong></div>
                        <div class="blog-isotope1" style="position: relative;height: 414.24px;">

                        <div class="cat" style="position: absolute; top: 0px;">

                            <ul class="post-meta">
                                <?php
                                $query = mysql_query("SELECT * FROM category WHERE status='YES' GROUP BY name");

                                while($row=mysql_fetch_array($query)) {
                                    $id1 = $row['id'];
                                    $category = $row['name'];

                                    ?>
                                    <li class="abc1" style=""><a href="product.php?id=<?php echo $row['id']?>" ><?php echo $category; ?></a>
                                     <hr>
                                    </li>
                                <?php
                                }

                                ?>
                            </ul>

                        </div>
                        </div>

<div class="title-highlighter" style=""><strong><span>BEST SELLERS</span></strong></div>
    <?php

    $count =0;
    $result6 = mysql_query("SELECT * FROM product WHERE deletestatus='YES' ORDER BY id DESC ");

    while($row6 = mysql_fetch_array($result6))
    {
        //$cat = $row1['category'];
        $productname1 = $row6['productname'];
        $mainprice1 = $row6['mainprise'];
        $scratchprice1 = $row6['scratchprise'];
        $count++;
        if($count<=2)
        {

            ?>
<div class="blog-isotope1" style="position: relative;height: 165.24px;">

    <div class="cat" style="position: absolute; top: 0px;">

                <div class="thubmnail-recent col-sm-4">
                    <a href="pro_details1.php?id=<?php echo $row6['id'] ?>"><img src="kipara/<?php echo $row6['img1'];?>" class="recent-thumb" alt="" style="height: 70px; width:85px;"></a>
                </div>

                <div class="col-sm-8">

                    <h6><a href="pro_details1.php?id=<?php echo $row6['id'] ?>"><?php echo $productname1;?></a></h6>
                    <div class="pro_name">
                        <ins class="product-sidebar-price">Rs.&nbsp;<?php echo $mainprice1;?></ins> <del>Rs.&nbsp;<?php echo $scratchprice1;?></del>
                    </div><br/>
                </div>
                <div class="text-new">
                    <a class="btn btn-cart btn-invert" href="pro_details1.php?id=<?php echo $row6['id']?>"><span><i class="fa fa-shopping-cart"></i></span></a>&nbsp;&nbsp;
                    <a class="btn" href="pro_details1.php?id=<?php echo $row6['id']?>"><span><i class="fa fa-cog"></i>&nbsp;&nbsp;Details</i></span></a>
                </div><br/>

    </div>
    </div>

        <?php }} ?>
