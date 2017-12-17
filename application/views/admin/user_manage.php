
<h2>Manage Users</h2>

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
                    <li><a href="#last_login" value="cust_email">Last Login</a></li>
                    <li><a href="#type" value="cust_phone">Type</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search user here..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="user_table_results">

        </div>
    </div>
</div>


<script>

    $(document).ready(function(e){

        $('#user_table_results').load("<?php echo base_url();?>index.php/users/searchUserDetails/all/");

        // to change the filter when clicked
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });

        // load suitable results on keyup
        $('#search_text').keyup(function (){
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val().trim();
            $.ajax({
                url: '<?php echo site_url('users/searchUserDetails'); ?>',
                method: "post",
                data:{filter:filter,txt:txt},
                cache: false,
                success: function (data) {
                    $('#user_table_results').html(data);
                }
            });
        });

        // load modal to delete user data
        $(document).on('click','.delete_user',function(){
            var id = $(this).attr("id");
            var table = 'user';
            $('#table_name').val(table);
            $('#record_id').val(id);
            $('#delete_Modal').modal('show');
        });

        // matching password
        $('#change_confirm_password').on('keyup', function () {
            if($(this).val() == ' '){
                $('#message').html("");
            }
            if ($(this).val() == $('#change_password').val()) {
                $('#message').html('Password Match').css('color', '#32cb00');
            }
            else {
                $('#message').html('Password does not match. Please Re-Enter!').css('color', '#c62828');

            }
        });
    });



    // load modal to change password
    function loadChangePassword(id) {
        $.ajax({
            url:'<?php echo site_url('users/getUserDetails'); ?>',
            method: "post",
            data: {user_id:id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#change_first_name').val(data.first_name);
                $('#change_last_name').val(data.last_name);
                $('#change_email').val(data.email);
                $('#change_type').val(data.type);
                $('#change_password').val("");
                $('#change_confirm_password').val("");
                $('#message').html("");
                $('#change_user_id').val(data.user_id);
                $('#change_password_Modal').modal('show');
            }
        });
    }

    // change user password
    function onclickChangePassword() {
        var newPassword = document.getElementById("change_password").value;
        var confirmNewPassword = document.getElementById("change_confirm_password").value;
        if (newPassword.length<4){
            $('#message').html('Please enter a password more than 4 characters in length').css('color', '#7f0000');
            return;
        }
        if (newPassword != confirmNewPassword){
            $('#insert_form')[0].reset();
            $('#change_password_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html("<h4>New password mismatched</h4>");
            return;
        }

        var user_id = document.getElementById("change_user_id").value;
        var password = newPassword;

        $.ajax({
            url:'<?php echo site_url('users/changeUserPassword'); ?>',
            type: "post",
            data: {user_id:user_id,password:password},
            cache: false,
            success: function (data) {
                $('#insert_form')[0].reset();
                $('#change_password_Modal').modal('hide');
                $('#msg_Modal').modal('show');
                $('#msg_result').html(data);
            }
        });
    }



    // when delete button is pressed in the modal
    function deleteRecord(){
        $('#delete_Modal').modal('hide');
        var record_id = document.getElementById('record_id').value;
        var table_name = document.getElementById('table_name').value;
        $.ajax({
            url:'<?php echo site_url('users/deleteUser'); ?>', //the page containing php script
            type: "post", //request type
            data: {record_id : record_id},
            cache: false,
            success:function(result){
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
            }
        });
    }

    // when cancel button is pressed in the modal
    function notDeleteRecord() {
        $('#delete_Modal').modal('hide');
    }

    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("<?php echo base_url();?>index.php/administrator/manageUsers");
    });
</script>
