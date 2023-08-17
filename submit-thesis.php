<?php 
$userQuery = $conn->query("SELECT s.*, sd.name as strand, y.name as yearlevel, CONCAT(lastname, ', ', firstname, ' ', middlename) as fullname FROM student_list s inner join strand_list sd on s.strand_id = sd.id inner join yearlevel_list y on s.yearlevel_id = y.id where s.id = '{$_settings->userdata('id')}'");
$userData = $userQuery->fetch_assoc();
$user_Id = $userData['id'];
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM `repo_list` where id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    if(isset($student_id)){
        if($student_id != $_settings->userdata('id')){
            echo "<script> alert('You don\'t have an access to this page'); location.replace('./'); </script>";
        }
    }
}
?>
<style>
.banner-img {
    object-fit: scale-down;
    object-position: center center;
    height: 30vh;
    width: calc(100%);
}
</style>

<!------STUDENT SUBMIT THESIS------>
<style>
body {
    margin-top: 6%;
    background-color: #e3eaa7;
}
</style>

<style>
    body{
 margin-top: 6%;
 background-color:#A7C7E7;
}
.card{
    background-color: #e3eaa7;
    border-color: black;
    border-style: double;
    box-shadow: 10px 13px;
}
.card-header{
    background-color: #4ed34e;
  
}
.card-title{

}
    </style>
<div class="content py-4">
    <div class="card">
    <div class="card card-outline card-success shadow rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title"><?= isset($id) ? "Update thesis-{$thesis_code} Details" : "Submit Project" ?></h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <form action="" id="thesis-form">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title" class="control-label text-navy">Title</label>
                                <input type="text" name="title" id="title" autofocus placeholder="Project Title"
                                    class="form-control form-control-border" value="<?= isset($title) ?$title : "" ?>"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php if($_settings->userdata('id') > 0): ?>
                                <label for="year" class="control-label text-navy">Year</label>
                                <select name="year" id="year" class="form-control form-control-border" required>
                                    <?php 
                                        for($i= 0;$i < 51; $i++):
                                    ?>
                                    <option
                                        <?= isset($year) && $year == date("Y",strtotime(date("Y")." -{$i} years")) ? "selected" : "" ?>>
                                        <?= date("Y",strtotime(date("Y")." -{$i} years")) ?></option>
                                    <?php endfor; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="abstract" class="control-label text-navy">Strand</label>
                                <textarea rows="3" name="abstract" id="abstract" placeholder="Name of Strand"
                                    class="form-control form-control-border summernote"><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="members" class="control-label text-navy">Members</label>
                                <textarea rows="3" name="members" id="members" placeholder="members"
                                    class="form-control form-control-border summernote-list-only"><?= isset($members) ? html_entity_decode($members) : "" ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="shared_with" class="control-label text-navy">Tag Members</label>
                                <input type="text" name="shared_with" id="shared_with" placeholder="e.g., sample@email.com, anothersample@gmail.com, extra@email.com"
                                    class="form-control form-control-border"
                                    value="<?= isset($shared_with) ? $shared_with : "" ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pdf" class="control-label text-muted">Project Document (PDF File
                                    Only)</label>
                                <input type="file" id="pdf" name="pdf" class="form-control form-control-border"
                                    accept="application/pdf" <?= !isset($id) ? "required" : "" ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button class="btn btn-default bg-success btn-flat"> Upload</button>
                                <a href="./?page=profile" class="btn btn-secondary border btn-flat"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this JavaScript code after the jQuery and jQuery UI libraries -->

<script>
$(function() {
    $("#shared_with").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "search_users.php",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Access the email of the selected user
            var email = ui.item.email;

            // Add the email to the input field
            var currentValue = $("#shared_with").val();
            
            // Check if there is already a value in the input field
            if (currentValue.length > 0) {
                // Split the current value by comma and add the new email
                var emailsArray = currentValue.split(', ');
                emailsArray.push(email);
                $("#shared_with").val(emailsArray.join(' '));
            } else {
                // If the input field is empty, just set the selected email
                $("#shared_with").val(email);
            }
            
            // Prevent the default behavior of the autocomplete plugin
            return false;
        },
        focus: function(event, ui) {
            // Prevent the default behavior of the autocomplete plugin
            event.preventDefault();
        },
        search: function(event, ui) {
            // Extract the last term after comma (if any) as the current search term
            var term = this.value.split(/,\s*/).pop();
            $(this).autocomplete('option', 'source', function(request, response) {
                $.ajax({
                    url: "search_users.php",
                    data: {
                        term: term
                    },
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
            });
        },
    });
});
</script>

<!------THESIS FORM FUNCTION------>
<script>
function displayImg(input, _this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#cimg').attr('src', "<?= validate_image(isset($avatar) ? $avatar : "") ?>");
    }
}
$(function() {


    $('#thesis-form').submit(function(e) {
        e.preventDefault()
        var _this = $(this)
        $(".pop-msg").remove()
        var el = $("<div>")
        el.addClass("alert pop-msg my-2")
        el.hide()
        start_loader();

        // Get the shared_with field value and split it into an array of user IDs
        var sharedWith = $('#shared_with').val().split(',');

        $.ajax({
            url: _base_url_ + "classes/Master.php?f=save_thesis",
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error: err => {
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader()
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    // location.href = "./?page=view_thesis&id=" + resp.id
                    location.href = "./?page=submit-thesis"
                } else if (!!resp.msg) {
                    el.text(resp.msg)
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                } else {
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }
                end_loader();
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast')
            }
        })
    })
})
</script>