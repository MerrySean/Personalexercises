<htm>
    <head>
        <title>Exercise | one</title>
        <link rel="stylesheet" href="./../../public/css/bootstrap.css">
        <link rel="stylesheet" href="./../../public/css/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="./public/css/app.css">
    </head>
    <body>
        <div class="d-flex justify-content-center">
            <div class="card mt-4" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title text-center">Registration Form</h4>
                </div>
                <div class="card-body">
                    <!--firstname-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Firstname" name="fname" value="">
                    </div>
                    <!--lastname-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Lastname" name="lname">
                    </div>
                    <!--gender-->
                    <div class="d-flex form-check justify-content-around mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="g_male"> <i class="fa fa-male" aria-hidden="true"></i> Male
                        </label>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="g_fmale"> <i class="fa fa-female" aria-hidden="true"></i> Female
                        </label>
                    </div>
                    <!--email-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <!--username-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="uname">
                    </div>
                    <!--password-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                    </div>
                    <!--confirm password-->
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                    </div>
                    <!--submit button-->
                    <button class="btn btn-primary" style="width: 100%;" onclick="submitform ()">Submit</button>
                </div>
            </div>
        </div>

        <!--Scripts-->
        
        <script src="./public/js/app.js" ></script>
    </body>
</html>