
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
                url: '<?php echo site_url('users/searchUserDetails'); ?>',
                method: "post",
                data:{filter:filter,txt:txt},
                cache: false,
                success: function (data) {
                    $('#user_table_results').html(data);
                }
            });
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
                $('#change_user_id').val(data.id);
                $('#change_password_Modal').modal('show');
            }
        });
    }

    // matching password
    // matching password
    $('#change_confirm_password').on('keyup', function () {
        if($(this).val() == ' '){
            $('#message').html("");
        }
        if ($(this).val() == $('#change_password').val()) {
            $('#message').html('Password Match').css('color', '#32cb00');
        }
        else {
            $('#message').html('Password does not match. Please Re-Enter!').css('color', '#7f0000');

        }
    });

    $(document).ready(function(){
        $('#user_table_results').load("<?php echo base_url();?>index.php/users/searchUserDetails/all/");
    });
</script>
