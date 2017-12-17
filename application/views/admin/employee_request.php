<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 11:11 PM
 */?>

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


<script>
    function viewbtn(eliment) {
        //alert(eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML);
        $.ajax({
            type:"post",
            data:({email1:eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML}),
            url:'<?php echo site_url('Administrator/Viewjoinus'); ?>',
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#name_modal').val(data.name);
                $('#email_modal').val(data.email);
                $('#phone').val(data.phone);
                $('#address').val(data.address);
                $('#skill').val(data.skill);
                $('#works').val(data.works);

                //$('#name').val(data.name);

                // document.getElementById('message1').innerHTML=" deleted successfully";
                // $('#modal-success').modal('show');

            }


        });
        //eliment.parentElement.parentElement.remove();

    }
</script>
