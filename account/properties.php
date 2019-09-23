<?php
$pageTitle = 'All Users';
include('account-header.php');
include('../functions.php');

$search_mode = false;
$_SESSION['old_search'] = null;
$searched_props = [];
$search = null;
if (isset($_GET['search'])) {
    $search_mode = true;
    $search = filter_input(INPUT_GET, 'search');
    $_SESSION['old_search'] = $search;
    $searched_props = searchProperties($search);
}
?>
<style>
    #properties {
        color: #1b4fa1;
    }
</style>
<div class="container-fluid">
    <h3 class="text-primary">Users</h3>
    <div class="text-right top-btns">
        <a href="add-property.php" class="btn btn-outline-info btn-sm">
            <i class="fa fa-plus-circle mr-1"></i>
            Add Property
        </a>
        <button class="btn btn-outline-info btn-sm">
            <i class="fa fa-refresh mr-1"></i>
            Refresh
        </button>
    </div>
    <?php if (count(properties())) : ?>
        <div class="row mb-2">
            <form class="offset-md-3 col-md-6" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="input-group">
                    <input type="text" name="search" value="<?php echo $_SESSION['old_search'] ?>" class="form-control bg-transparent" placeholder="Search for properties by address...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <?php if ($search_mode) : ?>
            <?php if (count($searched_props)) : ?>
                <div class="alert alert-light alert-dismissible">
                    <?php echo count($searched_props);?> results found!
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="row">
                    <?php foreach ($searched_props as $p) : ?>
                        <div class="col-md-4">
                            <div class="card m-2" style="width: 20rem;">
                                <img class="card-img-top" src="../img/video.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 class="font-weight-bold"><?php echo $p->address ?></h6>
                                        <small>
                                            <i class="fa fa-map-marker mr-1"></i>
                                            <?php echo $p->state ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">view</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="container my-4 text-center text-muted">
                    <h1 class="">No property matching "<?php echo $search ?>" was found!</h1>
                    <a href="properties.php" class="btn btn-default">Return</a>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="row">
                <?php foreach (properties() as $p) : ?>
                    <div class="col-md-4">
                        <div class="card m-2" style="width: 20rem;">
                            <img class="card-img-top" src="../img/video.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold"><?php echo $p->address ?></h6>
                                    <small>
                                        <i class="fa fa-map-marker mr-1"></i>
                                        <?php echo $p->state ?>
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">view</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="my-5 text-center text-muted">
            <h4 class="display-4">
                No Property found!
            </h4>
            <a class="btn btn-lg btn-primary" href="add-property.php">
                Add a property
            </a>
        </div>
    <?php endif; ?>

</div>
<!-- scripts -->
<script src="../js/account.users.js"></script>
<?php include('account-footer.php') ?>