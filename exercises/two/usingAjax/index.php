<html>
<head>
    <title>Exercise | Two</title>
    <link rel="stylesheet" href="./../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="./../../../public/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./../public/css/app.css">
</head>
<body>
    <button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#Thoughts">
        Thoughts 
    </button>
    <a type="button" class="btn btn-primary m-4 text-white" href="../">Using Regular Request</a>
    <div class="d-flex justify-content-around">
        <div class="card mt-4" style="width: 30rem; ">
            <div class="card-body">
                <h4 class="card-title text-center">Registration Form</h4>
            </div>
            <!-- Form -->
            <div class="card-body">
                <!--firstname-->
                <div class="input-group input-group-lg mb-3">
                    <span id='fnameIcon' class='input-group-addon'>
                            <i class="fa fa-address-card"></i>
                    </span>
                    <input class="form-control" placeholder="Firstname" id="fname" value="">
                </div>
                <!--lastname-->
                <div class="input-group input-group-lg mb-3">
                    <span id='lnameIcon' class='input-group-addon'><i class="fa fa-address-card"></i></span>
                    <input class="form-control" placeholder="Lastname" id="lname" value="">
                </div>
                <!--Address-->
                <div class="input-group input-group-lg mb-3">
                    <span id='addressIcon' class='input-group-addon'><i class="fa fa-envelope"></i></span>
                    <input class="form-control" placeholder="Address" id="Address" value="">
                </div>
                <!--email-->
                <div class="input-group input-group-lg mb-3">
                    <span id='emailIcon' class='input-group-addon'><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email" id="email" value="">
                </div>
                <!--gender-->
                <div class="d-flex form-check justify-content-around mb-3">
                    <input type='hidden' name='gender' checked="checked" value='' />
                    <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="g_male" value="male"><i class="fa fa-male"></i> Male
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="g_fmale" value="female"> <i class="fa fa-female"></i> Female
                    </label>
                </div>
                <!--username-->
                <div class="input-group input-group-lg mb-3">
                    <span id='unameIcon' class='input-group-addon'><i class="fa fa-user-circle-o" ></i></span>
                    <input class="form-control" placeholder="Username" id="uname" value="">
                </div>
                <!--password-->
                <div class="input-group input-group-lg mb-3">
                    <span id='passIcon' class='input-group-addon'><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Password" id="pass">
                </div>
                <!--confirm password-->
                <div class="input-group input-group-lg mb-3">
                    <span id='cpassIcon' class='input-group-addon'><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Confirm Password" id="cpass">
                </div>
                <!--submit button-->
                <div class="d-flex justify-content-around">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="clearForm()" id="btnclear" class="btn btn-primary">Clear</button>
                </div>
            </div>
        </div>
    </div>

    <div id="output">
    
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Thoughts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thoughts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        This is one of my most treasured projects, 
                        it's because I have learned so much from it.
                        it really pushes me to create my own Dynamic Form Validation
                        and now I could re-use this Form Validation code for all of my project
                        that needs Validation. It may not be that perfectly made but if you
                        think about it, I'm still 19 years old and a 3rd year college-level student.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- End of Modal -->

    

    <!--Scripts-->
    <script src="./../../../public/js/jquery.js" ></script>
    <script src="./../../../public/js/bootstrap.bundle.js" ></script>
    <script src="./../public/js/app2.js" ></script>

    
</body>
</html>