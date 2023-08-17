<!------DISPLAY ALL PUBLISH THESIS IN PROJECTS SECTION------>
<?php 
$user = $conn->query("SELECT s.*,sd.name as strand, y.name as yearlevel,CONCAT(lastname,', ',firstname,' ',middlename) as fullname FROM student_list s inner join strand_list sd on s.strand_id = sd.id inner join yearlevel_list y on s.yearlevel_id = y.id where s.id ='{$_settings->userdata('id')}'");
foreach($user->fetch_array() as $k =>$v){
    $$k = $v;
}
?>
<style>
body{
 margin-top: 6%;
 background-repeat: no-repeat;
    background-size: cover;
    background-image:url("uploads/blurr.png");
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
    background-color: ;
  
}
.card-title{

}
    </style>


<div class="content py-2">
        <div class="card card-outline card-success shadow rounded-0">
             
            <div class="card-body rounded-0">
                <h2>Repository List</h2>
                <hr class="bg-green">
                <?php 
                $limit = 10;
                $page = isset($_GET['p'])? $_GET['p'] : 1; 
                $offset = 10 * ($page - 1);
                $paginate = " limit {$limit} offset {$offset}";
                $isSearch = isset($_GET['q']) ? "&q={$_GET['q']}" : "";
                $search = "";
                if(isset($_GET['q'])){
                    $keyword = $conn->real_escape_string($_GET['q']);
                    $search = " and (title LIKE '%{$keyword}%' or abstract  LIKE '%{$keyword}%' or members LIKE '%{$keyword}%' or yearlevel_id in (SELECT id from yearlevel_list where name  LIKE '%{$keyword}%' or description  LIKE '%{$keyword}%') or yearlevel_id in (SELECT id from yearlevel_list where strand_id in (SELECT id FROM strand_list where name  LIKE '%{$keyword}%' or description  LIKE '%{$keyword}%'))) ";
                }
                $students = $conn->query("SELECT * FROM `student_list` where id in (SELECT student_id FROM repo_list where `status` = 1 {$search})");
                $student_arr = array_column($students->fetch_all(MYSQLI_ASSOC),'email','id');
                $count_all = $conn->query("SELECT * FROM repo_list where `status` = 1 {$search}")->num_rows;    
                $pages = ceil($count_all/$limit);
                $thesis = $conn->query("SELECT * FROM repo_list where `status` = 1 {$search} order by unix_timestamp(date_created) desc {$paginate}");    
                ?>
                <?php if(!empty($isSearch)): ?>
                <h3 class="text-center"><b>Search Result for "<?= $keyword ?>" keyword</b></h3>
                <?php endif ?>
                <div class="list-group">
                    <?php 
                    while($row = $thesis->fetch_assoc()):
                        $row['abstract'] = strip_tags(html_entity_decode($row['abstract']));
                    ?>
                    <a href="./?page=view_thesis&id=<?= $row['id'] ?>&&user_Id=<?= $id ?>" class="text-decoration-none text-dark list-group-item list-group-item-action">
                        <div class="row">
                           
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <h3 class="text-navy"><b><?php echo $row['title'] ?></b></h3>
                                <small class="text-muted">By <b class="text-info"><?= isset($student_arr[$row['student_id']]) ? $student_arr[$row['student_id']] : "N/A" ?></b></small>
                                <p class="truncate-5"><?= $row['abstract'] ?></p>
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
                                <li class="page-item"><a class="page-link" href="./?page=projects<?= $isSearch ?>&p=<?= $page - 1 ?>" <?= $page == 1 ? 'disabled' : '' ?>>«</a></li>
                                <?php for($i = 1; $i<= $pages; $i++): ?>
                                <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : '' ?>" href="./?page=projects<?= $isSearch ?>&p=<?= $i ?>"><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item"><a class="page-link" href="./?page=projects<?= $isSearch ?>&p=<?= $page + 1 ?>" <?= $page == $pages ? 'disabled' : '' ?>>»</a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
                </div>

            </div>
</div>
