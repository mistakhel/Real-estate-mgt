<?php
$pageTitle = 'Add Property';
include('account-header.php');
include('../functions.php');
?>
<style>
    #properties {
        color: #1b4fa1;
    }
</style>
<div class="container-fluid">
    <h3 class="text-primary">Add Property</h3>
    <div class="text-right top-btns">
        <a href="properties.php" class="btn btn-outline-info btn-sm px-3">
            <i class="fa fa-cubes mr-1"></i>
            properties
        </a>
        <button class="btn btn-outline-info btn-sm">
            <i class="fa fa-refresh mr-1"></i>
            Refresh
        </button>
    </div>

    <?php if (count(agents())):?>
        <div class="card mt-2 mb-4">
            <form id="add_property_form" method="POST" action="xhr/add-property.php">
                <div class="card-header bg-white">
                    <h4 class="card-title">
                        <i class="fa fa-plus-square mr-2 text-primary"></i>
                        Property Form
                    </h4>
                </div>
                <div class="card-body pb-5">
                    <div class="row mb-4">
                        <div class="offset-md-3 col-md-8">
                            <div class="alert alert-secondary alert-dismissible">
                                All fields of this form is mandatory!
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right" for="agent">
                            Agent
                        </label>
                        <div class="col-md-8">
                            <select class="form-control" name="agent" id="agent" required>
                                <option value="">Choose an agent</option>
                                <?php foreach (agents() as $agent):?>
                                    <option value="<?php echo $agent->id ?>">
                                        <?php echo $agent->first_name.' '.$agent->last_name; ?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label text-md-right">
                            Address
                        </label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="address" placeholder="property address here.." id="address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-3 col-form-label text-md-right">
                            State
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="state" id="state" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="area" class="col-md-3 col-form-label text-md-right">
                            Area
                        </label>
                        <div class="col-md-8">
                            <input type="number" step="0.001" name="area" id="area" class="form-control" placeholder="Area of property in square foot" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="garages" class="col-md-3 col-form-label text-md-right">
                            Garages
                        </label>
                        <div class="col-md-8">
                            <input type="number" name="garages" id="garages" class="form-control" placeholder="Number of garages" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bedrooms" class="col-md-3 col-form-label text-md-right">
                            Bedrooms
                        </label>
                        <div class="col-md-8">
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control" placeholder="Number of bedrooms" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bathrooms" class="col-md-3 col-form-label text-md-right">
                            Bathrooms
                        </label>
                        <div class="col-md-8">
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control" placeholder="Number of bathrooms" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="purpose" class="col-md-3 col-form-label text-md-right">Purpose</label>
                        <div class="col-md-8">
                            <select class="form-control" name="purpose" id="purpose" required>
                                <option value="">Choose target purpose</option>
                                <option value="rent">Rent</option>
                                <option value="sale">Sale</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="offset-md-3 col-md-8 text-right">
                            <button class="btn btn-lg btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-lg btn-primary" type="submit">Add Property</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php else:?>
        <div class="my-5 text-center text-muted container">
            <h1 class="display-1">No agent found! Agent needed for property addition!</h1>
        </div>
    <?php endif;?>
    

</div>
<!-- scripts -->
<script src="../js/account.property.js"></script>
<?php include('account-footer.php') ?>