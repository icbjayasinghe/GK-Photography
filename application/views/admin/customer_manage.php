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
                url: '<?php echo site_url('users/searchCustomerDetails'); ?>',
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
        // alert(customerDetails);
        $('#edit_cust_id').val(customerDetails[0]);
        $('#edit_first_name').val(customerDetails[1]);
        $('#edit_last_name').val(customerDetails[2]);
        $('#edit_cust_phone').val(customerDetails[3]);
        $('#edit_cust_address').val(customerDetails[4]);
        $('#edit_cust_email').val(customerDetails[5]);
        $('#edit_customer_Modal').modal('show');
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
        $('#customer_table_results').load("<?php echo base_url();?>index.php/users/searchCustomerDetails/all/");
    });
</script>
