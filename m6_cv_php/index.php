<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style_Cv.css">
</head>

<body>


    <div class="container my-5">
        <h1 class="text-center">Create Your Cv</h1>
        <hr>

        <section class="gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7 w-75">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <div class="input-group mb-5">
                                    <form action="./search.php">
                                        <div class="form-outline">
                                            <input type="search" name="search" placeholder="Search Your Cv ..." id="form1" class="form-control" />
                                        </div>
                                    </form>
                                    <i id="search" class="fas fa-search"></i>
                                </div>


                                <form action="./cv.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="mex1 col-6 col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" name="full_name" class="form-control form-control-lg" placeholder="Enter Your name" required />
                                            </div>

                                            <div class="form-outline pt-3">
                                                <label class="form-label">Job Name</label>
                                                <input type="text" name="job_name" class="form-control form-control-lg" placeholder="Enter Your Jop name" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label">Email address</label>
                                                <input type="text" name="email" class="form-control form-control-lg" placeholder="Enter Your Email" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label">Link LinkedIn</label>
                                                <input type="text" class="form-control form-control-lg" name="linked" placeholder="Enter Your Linked In" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label" for="firstName">Github</label>
                                                <input type="text" id="firstName" class="form-control form-control-lg" name="github" placeholder="Enter Your Github" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label">Phone</label>
                                                <input type="tel" name="phone" class="form-control form-control-lg" placeholder="07#########" pattern="[0-9]{3}[0-9]{2}[0-9]{5}" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label">Intership</label>
                                                <input type="text" name="intership" class="form-control form-control-lg" placeholder="Enter Intership" required />
                                            </div>
                                            <div class="form-outline pt-3">
                                                <label class="form-label">Date of Intership</label>
                                                <input type="date" name="date_intership" class="form-control form-control-lg" placeholder="Enter Intership" required />
                                            </div>


                                            <div class="form-floating mt-4">
                                                <textarea class="form-control" name="summary" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Summary</label>
                                            </div>

                                            <div class="form-outline pt-3">
                                                <button type="submit" name="save_data" class="text-center btn btn-primary">Save</button>
                                            </div>

                                        </div>
                                        <div class="mex2 col-6 -md-6 mb-4">

                                            <div class="form-outline mt-4">
                                                <select class="select form-control-lg" name="languages[]" multiple>
                                                    <option value="1" disabled>Choose Your languages</option>
                                                    <option value="Arabic">Arabic</option>
                                                    <option value="English">English</option>
                                                    <option value="Frensh">Frensh</option>
                                                </select>
                                            </div>

                                            <div class="form-outline mt-4">
                                                <select class="select form-control-lg" name="personal_skills[]" multiple>
                                                    <option value="1" disabled>Choose Personal skills</option>
                                                    <option value="commnication">Commnication</option>
                                                    <option value="leader ship">Leader ship</option>
                                                    <option value="team work">team work</option>
                                                    <option value="hard work">hard work</option>
                                                </select>
                                            </div>

                                            <div class="form-outline mt-4">
                                                <select class="select form-control-lg" name="technical_skills[]" multiple>
                                                    <option value="1" disabled>Choose Technical Skills</option>
                                                    <option value="php">PHP</option>
                                                    <option value="css">CSS</option>
                                                    <option value="html">HTML</option>
                                                    <option value="js">JS</option>
                                                    <option value="bootstrap">Bootstrap</option>
                                                    <option value="api">API</option>
                                                </select>
                                            </div>

                                            <div class="form-floating mt-4">
                                                <textarea class="form-control" name="projects" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Projects</label>
                                            </div>

                                            <div class="form-floating mt-4">
                                                <textarea class="form-control" name="experiance" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Experiance</label>
                                            </div>


                                            <div class="form-floating mt-4">
                                                <textarea class="form-control" name="education" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Education</label>
                                            </div>

                                            <div class="form-outline mt-3 mb-3">
                                                Select image to upload:
                                                <input type="file" name="upload" id="uplodeimgedit">

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>