<?php 
$thesis_id = "";
if(isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['user_Id'])) {
    $logged_in_user_Id = $_GET['user_Id'];
    $thesis_id = $_GET['id'];

    $qry = $conn->query("SELECT a.* FROM `repo_list` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
        $shared_with = isset($shared_with) ? $shared_with : "N/A";
    }

    $submitted = "N/A";
    if(isset($student_id)){
        $student = $conn->query("SELECT * FROM student_list where id = '{$student_id}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted = $res['email'];
        }
    }

    $check = $conn->query("SELECT * from num_views where student_id='$logged_in_user_Id' AND thesis_id='$thesis_id' ");
    if($check->num_rows < 1){
        $save = $conn->query("INSERT INTO num_views (student_id, thesis_id) VALUEs ('$logged_in_user_Id', '$thesis_id') ");
        
    } 


} else {
    $qry = $conn->query("SELECT a.* FROM `repo_list` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
        $shared_with = isset($shared_with) ? $shared_with : "N/A";
    }

    $submitted = "N/A";
    if(isset($student_id)){
        $student = $conn->query("SELECT * FROM student_list where id = '{$student_id}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted = $res['email'];
        }
    }
}
$count = $conn->query("SELECT num_Id FROM num_views WHERE thesis_id='$thesis_id' ");
$count_email = mysqli_num_rows($count);


?>
<style>
    #document_field{
        min-height:80vh
    }
</style>

<!------STUDENT VIEW THESIS------>
<style>
body{
 margin-top: 6%;
 background-color: #e3eaa7;
}

</style>
<div class="content py-4">
    <div class="col-12">
        <div class="card card-outline card-success shadow rounded-0">
            <div class="card-header">
                <h3 class="card-title">
                    Thesis - <?= isset($thesis_code) ? $thesis_code : "" ?>
                    <h4 font style="text-align: right;">Number of views: <span id="views"><?= $count_email ?></span></h4>
                </h3>
            </div>

            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h2><b><?= isset($title) ? $title : "" ?></b></h2>
                    <small class="text-muted">Submitted by <b class="text-info"><?= $submitted ?>, <?= $shared_with ?></b> on  <?= date("F d, Y h:i A",strtotime($date_created)) ?></small>
                    <?php if(isset($student_id) && $_settings->userdata('login_type') == "2" && $student_id == $_settings->userdata('id')): ?>
                        <div class="form-group">
                            <a href="./?page=submit-thesis&id=<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-default bg-secondary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button type="button" data-id = "<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-danger btn-sm delete-data"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <center>
                    </center>
                    <fieldset>
                        <legend class="text-navy">Project Year:</legend>
                        <div class="pl-4"><large><?= isset($year) ? $year : "----" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Strand:</legend>
                        <div class="pl-4"><large><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Members:</legend>
                        <div class="pl-4"><large><?= isset($members) ? html_entity_decode($members) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Tag Members:</legend>
                        <div class="pl-4"><large><?= isset($shared_with) ? html_entity_decode($shared_with) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Project Document:</legend>
                        <div class="pl-4">
                            <iframe src="<?= isset($document_path) ? base_url.$document_path : "" ?>" frameborder="0" id="document_field" class="text-center w-100">Loading Document ...</iframe>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<!------DELETE THESIS FUNCTION------>
<script>
    $(function(){
        $('.delete-data').click(function(){
            _conf("Are you sure to delete <b>Thesis-<?= isset($thesis_code) ? $thesis_code : "" ?></b>","delete_thesis")
        })
    })
    function delete_thesis(){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Master.php?f=delete_thesis",
            method:"POST",
            data:{id: "<?= isset($id) ? $id : "" ?>"},
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("An error occured.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp== 'object' && resp.status == 'success'){
                    location.replace("./");
                }else{
                    alert_toast("An error occured.",'error');
                    end_loader();
                }
            }
        })
    }
</script>