<?php
include 'includes/db_connection.php';
include 'includes/header.php';
?>



    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">PC <span class="text-primary-custom">MASTER</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="build.php">Build PC</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-info ms-lg-3 px-3 text-white" href="admin_login.php">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-2 fw-bold mb-3 animate-title">
                LEVEL UP YOUR <span class="text-primary-custom">GAME</span>
            </h1>
            
            <p class="lead mb-5 text-light sub-heading">
                Precision tools for the ultimate PC building experience. Compatible. Powerful. Custom.
            </p>
            
            <a href="build.php" class="btn btn-primary btn-lg px-5 py-3 shadow-lg fw-bold btn-start">
                START YOUR BUILD <i class="fas fa-chevron-right ms-2"></i>
            </a>
        </div>
    </header>

    <section class="container my-5 py-5">
        <h2 class="text-center mb-5 fw-bold animate-title">Why Choose <span class="text-primary-custom">PC Master</span>?</h2>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm">
                    <i class="fas fa-check-double fa-3x text-primary-custom mb-3 align-items-center"></i>
                    <h4>Smart Compatibility</h4>
                    <p class="text-light opacity-75">Our system checks every part to ensure 100% compatibility with your CPU and Motherboard.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm">
                    <i class="fas fa-microchip fa-3x text-primary-custom mb-3 align-items-center"></i>
                    <h4>Premium Parts</h4>
                    <p class="text-light opacity-75">We only offer the latest and most powerful components from top global brands.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm">
                    <i class="fas fa-headset fa-3x text-primary-custom mb-3 align-items-center"></i>
                    <h4>Expert Support</h4>
                    <p class="text-light opacity-75">Need help? Our team of PC enthusiasts is ready to assist you in every step of your build.</p>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php' ?>