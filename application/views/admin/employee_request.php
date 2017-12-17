<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 11:11 PM
 */?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>dist/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>css/navmenu-reveal.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/homestyle.css" rel="stylesheet">
<h2>Employee Requests</h2>
<br>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table" id="result">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Skill</th>
                    <th>Email</th>
                    <th>Phone</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if($request->num_rows()>0){
                    foreach ($request->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->name;  ?></td>
                            <td><?php echo $row->skill;  ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->phone; ?></td>
                            <td><button class="btn btn-success" onclick="viewbtn(this)" data-toggle="modal" data-target="#mymodal">View</button><button class="btn btn-danger delete" > Delete </button></td>



                        </tr>


                        <?php
                    }

                }
                else{

                }

                //$requestList = "";
//                foreach ($request as $row){
//                    //$customerDetals = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
//                    //$rowString = implode(",", $customerDetals);
//                    $requestList.= "<tr>";
//                    $requestList.= "<td>{$row->name}</td>";
//                    $requestList.= "<td>{$row->skill}</td>";
//                    //$$requesttList.= "<td>{$row->start_time}h</td>";
//                    //$$requesttList.= "<td>{$row->end_time}h</td>";
//                    //$$requesttList.= "<td>{$row->description}</td>";
//                    //$$requesttList.= "<td><a class=\"customer_check\" onclick=\"loadCustomerModal('$rowString')\" id={$row->cust_id}><b>{$row->first_name} {$row->last_name}</b></a></td>";
//                    $requestList.= "</tr>";
//                }
//                echo $requestList;
                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<!--employee request modal-->
<div id="mymodal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                asdsad
            </div>
            <div class="modal-footer">
                <!--                                        <button type="button" class="close" data-dismiss="modal">&times;</button>-->

            </div>

        </div>
    </div>

</div>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script>
    function viewbtn(eliment) {
        //alert(eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML);
        // $.ajax({
        //     type:"post",
        //     data:({email:eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML}),
        //     url:"",
        //     success:function (data) {
        //
        //         // document.getElementById('message1').innerHTML=" deleted successfully";
        //         // $('#modal-success').modal('show');
        //
        //     }
        //
        //
        // });
        //eliment.parentElement.parentElement.remove();

    }
</script>
