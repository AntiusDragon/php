<?php require ROOT . 'views/nav.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <form action="<?= URL ?>/colors/store" method="post">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Create new Color</h1>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sizeInput" class="form-label">Size</label>
                            <input type="range" class="form-range" id="sizeInput" name="size">
                        </div>
                        <div class="mb-3">
                            <label for="ColorInput" class="form-label">Color picker</label>
                            <input type="color" class="form-control form-control-color" 
                                name="color" id="colorInput" value="#ffffff" 
                                title="Choose your color">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>