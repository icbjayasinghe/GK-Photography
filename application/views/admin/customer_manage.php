<h2>Manage Customers</h2>

<div class="row">
    <div class="col-md-12">
        <div class="input-group my-search-panel top-buffer">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#user_id" value="cust_id">ID</a></li>
                    <li><a href="#first_name" value="first_name">First Name</a></li>
                    <li><a href="#last_name" value="last_name">Last Name</a></li>
                    <li><a href="#cust_email" value="cust_email">Email</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="customer_table_results">

        </div>
    </div>
</div>

<script>
    // to change the filter when clicked
    $(document).ready(function(e){
        $('#customer_table_results').load("<?php echo base_url();?>index.php/customer_manage/searchCustomerDetails/all/");

        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });

    // load suitable results on keyup
    $(document).ready(function(){
        $('#search_text').keyup(function (){
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val().trim();
            $.ajax({
                url: '<?php echo site_url('customer_manage/searchCustomerDetails'); ?>',
                method: "post",
                data:{filter:filter,txt:txt},
                cache: false,
                success: function (data) {
                    $('#customer_table_results').html(data);
                }
            });
        });
    });

    function getCustomerDetails() {
        $.ajax({
            url:'<?php echo site_url('customer_manage/viewCustomers'); ?>',
            method: "post",
            success: function() {
                $('#table_results').html();
            }
        });
    }

    // load modal to edit customer details
    function edit_customer(customerDetails){
        customerDetails = customerDetails.split(",");
        alert(customerDetails);
        $('#edit_cust_id').val(customerDetails[0]);
        $('#customer_edit_first_name').val(customerDetails[1]);
        $('#customer_edit_last_name').val(customerDetails[2]);
        $('#edit_cust_phone').val(customerDetails[3]);
        $('#edit_cust_address').val(customerDetails[4]);
        $('#edit_cust_email').val(customerDetails[5]);
        $('#edit_customer_Modal').modal('show');
    }

    // when update button is pressed in the modal
    function onclickUpdateCustomer(){
        var edit_cust_id = document.getElementById("edit_cust_id").value;
        var edit_first_name = document.getElementById("customer_edit_first_name").value;
        var edit_last_name = document.getElementById("customer_edit_last_name").value;
        var edit_cust_phone = document.getElementById("edit_cust_phone").value;
        var edit_cust_address = document.getElementById("edit_cust_address").value;
        var edit_cust_email = document.getElementById("edit_cust_email").value;

        $.ajax({
            url:'<?php echo site_url('customer_manage/updateCustomer'); ?>', //the page containing php script
            type: "post", //request type
            data: {edit_cust_id : edit_cust_id,edit_first_name : edit_first_name,edit_last_name : edit_last_name,edit_cust_phone : edit_cust_phone,edit_cust_address : edit_cust_address,edit_cust_email : edit_cust_email},
            cache: false,
            success:function(result){
                $('#edit_customer_Modal').modal('hide');
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
            }
        });
    }

    // load modal to view customer details
    function loadCustomerModal(customerDetails){
        customerDetails = customerDetails.split(",");
        alert(customerDetails);
        $('#cust_id').val(customerDetails[0]);
        $('#first_name').val(customerDetails[1]);
        $('#last_name').val(customerDetails[2]);
        $('#cust_phone').val(customerDetails[3]);
        $('#cust_address').val(customerDetails[4]);
        $('#cust_email').val(customerDetails[5]);
        $('#customer_Modal').modal('show');
    }

    $(document).ready(function(){
        $('#customer_table_results').load("<?php echo base_url();?>index.php/customer_manage/searchCustomerDetails/all/");
    });

    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("<?php echo base_url();?>index.php/administrator/manageCustomers");
    });
</script>
