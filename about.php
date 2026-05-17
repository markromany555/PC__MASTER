<?php
include 'includes/db_connection.php';

if (isset($_GET['delete_id'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_GET['delete_id']);
    
    $sql = "DELETE FROM products WHERE id = $id_to_delete";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | PC MASTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .about-header {
            background: linear-gradient(45deg, #0b0c10, #1f2833);
            padding: 100px 0;
            border-bottom: 2px solid #45a29e;
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            background: #1f2833;
            border: 2px solid #66fcf1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px;
            color: #66fcf1;
            font-size: 30px;
        }
        .team-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #66fcf1;
            margin-bottom: 15px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">PC <span class="text-info">MASTER</span></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="build.php">Build PC</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="about-header text-center">
        <div class="container">
            <h1 class="display-3 fw-bold text-info">OUR MISSION</h1>
            <p class="lead text-light mx-auto" style="max-width: 700px;">
                We empower gamers and professionals to build high-performance machines with zero compatibility errors.
            </p>
        </div>
    </section>

    <div class="container my-5 py-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="text-info mb-4">Who We Are</h2>
                <p class="fs-5">
                    Founded in 2026, **PC MASTER** started as a small project to solve a big problem: the complexity of PC hardware compatibility. Today, we are a leading platform providing smart building tools for enthusiasts worldwide.
                </p>
                <p class="text-light">
                    Our system cross-references thousands of components to ensure every build is stable, powerful, and ready for action.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <i class="fas fa-microchip fa-10x text-secondary opacity-25"></i>
            </div>
        </div>

        <hr class="border-secondary my-5">

        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h4 class="text-info">Reliability</h4>
                <p class="text-light">Every part in our database is verified for genuine quality and performance.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h4 class="text-info">Speed</h4>
                <p class="text-light">Generate a full compatible build in under 60 seconds with our optimized UI.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon"><i class="fas fa-heart"></i></div>
                <h4 class="text-info">Community</h4>
                <p class="text-light">Built by hardware lovers, for hardware lovers. We understand your passion.</p>
            </div>
        </div>
    </div>

    <section class="bg-dark py-5 border-top border-secondary">
        <div class="container text-center">
            <h2 class="text-info mb-5">The Developer</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="./includes/personal-photo.jpg" class="team-img mx-auto" alt="Developer">
                        <h5 class="mb-1">Mark Romany</h5>
                        <p class="text-info small">Full-Stack Web-Developer</p>
                        <div class="d-flex justify-content-center gap-3 mt-2">
                            <a href="https://github.com/markromany555" target="_blank" class="text-white"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/mark-romany-848481380" target="_blank" class="text-white"><i class="fab fa-linkedin"></i></a>
                            <a href="https://wa.me/201550231555" target="_blank" class="text-white"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.facebook.com/share/1DoYykYUZi/" target="_blank" class="text-white"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/markromany53?igsh=MWd0MnFiMjA3emppYQ==" target="_blank" class="text-white"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 mt-5 text-center border-top border-secondary">
        <p class="text-light mb-0">&copy; 2026 PC MASTER, Graduation Project | Designed by Mark Romany</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>