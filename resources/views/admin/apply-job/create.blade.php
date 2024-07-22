<!DOCTYPE html>
<html lang="en">

<head>
    <title>Website Rekrutmen</title>

    @include('layouts.components-backend.head')
</head>

<body>

    @include('layouts.components-backend.header')
    @include('layouts.components-backend.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Applicant</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/applicant">Applicant</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close">
            </button>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Applicant</h5>
                            <!-- General Form Elements -->
                            <form method="post" action="/admin/applicant/create" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="<%= typeof formData !== 'undefined' ? formData.name : '' %>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phoneNumber"
                                            value="<%= typeof formData !== 'undefined' ? formData.phoneNumber : '' %>">
                                    </div>
                                    <label for="inputText" class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="email"
                                            value="<%= typeof formData !== 'undefined' ? formData.email: '' %>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="address"><%= typeof formData !== 'undefined' ? formData.address : '' %></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Last Education</label>
                                    <div class="col-sm-6">
                                        <select class="form-select" aria-label="Default select example"
                                            name="lastEducation">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <label for="inputText" class="col-sm-1 col-form-label">IPK</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="ipk"
                                            value="<%= typeof formData !== 'undefined' ? formData.ipk : '' %>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Work Experience</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="workExperience"><%= typeof formData !== 'undefined' ? formData.workExperience : '' %></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">KTP</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="formFile" name="ktp">
                                    </div>
                                    <label for="inputNumber" class="col-sm-1 col-form-label">CV</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="file" id="formFile" name="cv">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Application
                                        Letter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile"
                                            name="applicationLetter">
                                    </div>
                                </div>
                                <div class="row mb-3"><label for="inputText"
                                        class="col-sm-2 col-form-label">Skill</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="skill"><%= typeof formData !== 'undefined' ? formData.skill : '' %></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy;<strong><span>SPK - SAW Method</span></strong>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layouts.components-backend.script')

</body>

</html>
