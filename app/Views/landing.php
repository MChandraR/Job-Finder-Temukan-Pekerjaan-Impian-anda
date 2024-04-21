<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Job Finder Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    .bgimage{
        background-image: url("/images/banner.jpg");
        background-repeat : no-repeat;
        background-size : cover;
        padding : 10rem;
    }

    .body2{
        padding : 1rem;

    }

    .s-text{
        color : blue;
    }
</style>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="font-famyli:arial; font-size : 2rem; font-weight:bold;">Job Finder</a>
        <!-- Add other navigation links here -->
    </nav>
    <div class="bgimage">
        <!-- Hero Section -->
        <section class="hero">
            <div class="container text-center">
                <h1>Find Your Dream Job</h1>
                <p>Explore thousands of job listings across various industries.</p>
            </div>
        </section>

        <!-- Job Search Form -->
        <section id="search" class="py-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <form action="job" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control"  id="key" placeholder="Search for jobs...">
                                <div class="input-group-append">
                                    <button type="submit" id="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <center>           
    <!-- Featured Jobs -->
    <!-- <section class="featured-jobs body2">
        <div class="container">
            <h1 class="s-text"> Temukan pekerjaan mu </h1>
        </div>
    </section> -->
    <center>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <!-- Display testimonials from satisfied users -->
            </div>
        </div>
    </section>

      <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <!-- Display testimonials from satisfied users -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3" style="position:relative; bottom:0;">
        <p>© 2024 Job Finder. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    let submit = document.getElementById("submit");
    console.log(submit);
    submit.addEventListener('click',(e)=>{
        e.preventDefault();
        window.location.href = "job?key=" + document.getElementById("key").value ;
    });
</script>
</html>
