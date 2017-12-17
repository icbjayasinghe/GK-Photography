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
                <tbody id="tbody">
                <?php
                if($request->num_rows()>0){
                    foreach ($request->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->name;  ?></td>
                            <td><?php echo $row->skill;  ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->phone; ?></td>
                            <td><button class="btn btn-success" onclick="viewbtn(this)" data-toggle="modal" data-target="#mymodal">View</button><button class="btn btn-danger delete" onclick="deletebtn(this)"> Delete </button></td>



                        </tr>


                        <?php
                    }

                }
                else{

                }
                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<!--employee request modal-->


<script>
    function viewbtn(eliment) {
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
            }


        });

    }

    function deletebtn(eliment) {
        //alert("asda");
        $.ajax({
            type:"post",
            data:({email:eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML}),
            url:'<?php echo site_url('Administrator/Deletejoinus'); ?>',
            cache: false,
            success:function (data) {
                eliment.parentElement.parentElement.remove();


            }

        })

    }
</script>


