<?php 
if(isset($_GET['id'])){

    $qry = $conn->query("SELECT * FROM strand_list where `status` = 1 and id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            if(!is_numeric($k)){
                $value[$k] = $v;
            }
        }
    }else{
        echo "<script> alert('Unkown Strand ID'); location.replace('./') </script>";
    }

}else{
    echo "<script> alert('Strand ID is required'); location.replace('./') </script>";
}

?>

<!------STRAND LIST OF SUBMITED THESIS------>
<style>
body{
 margin-top: 6%;
 background-repeat: no-repeat;
    background-size: cover;
    background-image:url("uploads/blurr.png");
}
</style>
<style>
    body{
 margin-top: 6%;
 background-color:#A7C7E7;
}
.card{
    background-color: ;
    border-color: black;
    border-style: double;
    box-shadow: 10px 13px;
}
.card-header{
    background-color: 
  
}
.card-title{

}
    </style>
<div class="content py-2">
    <div class="card">
    <div class="col-12">
        <div class="card card-outline card-success shadow rounded-0">
            <div class="card-body rounded-0">
                <h2>Thesis List of <?= isset($value['name']) ? $value['name'] : "" ?> </h2>
                <p><small><?= isset($value['description']) ? $value['description'] : "" ?></small></p>
                <hr class="bg-navy">
                <?php 
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $limit = 10;
                $page = isset($_GET['p'])? $_GET['p'] : 1; 
                $offset = 10 * ($page - 1);
                $paginate = " limit {$limit} offset {$offset}";
                $wheredid = " where strand_id = '{$id}' ";
                $students = $conn->query("SELECT * FROM `student_list` where id in (SELECT student_id FROM repo_list where `status` = 1 and yearlevel_id in (SELECT id from 
                    yearlevel_list {$wheredid} ))");
                $student_arr = array_column($students->fetch_all(MYSQLI_ASSOC),'email','id');
                $count_all = $conn->query("SELECT * FROM repo_list where `status` = 1 and yearlevel_id in (SELECT id from yearlevel_list {$wheredid} )")->num_rows;    
                $pages = ceil($count_all/$limit);
                $thesis = $conn->query("SELECT * FROM repo_list where `status` = 1 and yearlevel_id in (SELECT id from yearlevel_list {$wheredid} ) order by unix_timestamp(date_created) desc {$paginate}");    
                ?>
                <div class="list-group">
                    <?php 
                    while($row = $thesis->fetch_assoc()):
                        $row['abstract'] = strip_tags(html_entity_decode($row['abstract']));
                    ?>
                    <a href="./?page=view_thesis&id=<?= $row['id'] ?>" class="text-decoration-none text-dark list-group-item list-group-item-action">
                        <div class="row">
                      
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <h3 class="text-navy"><b><?php echo $row['title'] ?></b></h3>
                                <small class="text-muted">By <b class="text-info"><?= isset($student_arr[$row['student_id']]) ? $student_arr[$row['student_id']] : "N/A" ?></b></small>
                                <p class="truncate-5"><?= $row['abstract'] ?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="card-footer clearfix rounded-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6"><span class="text-muted">Display Items: <?= $thesis->num_rows ?></span></div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="./?page=projects_strand&id=<?= $id ?>&p=<?= $page - 1 ?>" <?= $page == 1 ? 'disabled' : '' ?>>«</a></li>
                                <?php for($i = 1; $i<= $pages; $i++): ?>
                                <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : '' ?>" href="./?page=projects_strand&id=<?= $id ?>&p=<?= $i ?>"><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item"><a class="page-link" href="./?page=projects_strand&id=<?= $id ?>&p=<?= $page + 1 ?>" <?= $page == $pages || $pages <= 1 ? 'disabled' : '' ?>>»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</div>
