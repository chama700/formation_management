<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Professional Training Solutions</title>
    <link rel="stylesheet" href="../css/styles.css" />
</head>
<body>
<?php require_once 'header.html' ?>
<section class="hero">
    <div class="container hero-content">
        <h1>Excellence in Professional Training</h1>
        <p>Enhance your skills with our expert-led courses in management, IT, big data, and networking across multiple locations worldwide.</p>
        <a href="#courses" class="btn">Explore Courses</a>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <h2 class="section-title">About Us</h2>
        <div class="about-content">
            <div class="about-text">
                <p>FormExpert is a leading training provider dedicated to delivering high-quality professional development courses across multiple disciplines. Our courses are designed to help professionals enhance their skills and stay ahead in today's competitive market.</p>
                <p>With experienced trainers, flexible learning options (both in-person and remote), and a wide variety of specialized courses, we provide tailored solutions to meet your training needs.</p>
                <p>Our training programs are conducted in various cities around the world, making quality education accessible to professionals globally.</p>
            </div>
            <div class="about-image">
                <img src="../uploads/about_us.jpeg" alt="Training session">
            </div>
        </div>
    </div>
</section>

<section class="section stats">
    <div class="container">
        <h2 class="section-title">Our Performance</h2>
        <div class="stats-container">
            <div class="stat-item">
                <h3>98%</h3>
                <p>Client Satisfaction</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Success Rate</p>
            </div>
            <div class="stat-item">
                <h3>85%</h3>
                <p>Global Coverage</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Previous Trainings</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="../uploads/Professional-Scrum-Master-2-Certificate.webp" alt="Training Session 1">
                <div class="gallery-caption">
                    <h3>Scrum Certification - Paris</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../uploads/Certificate-Final-london.png" alt="Training Session 2">
                <div class="gallery-caption">
                    <h3>JEE Workshop - London</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../uploads/berlin.jpeg" alt="Training Session 3">
                <div class="gallery-caption">
                    <h3>ITIL Masterclass - Berlin</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../uploads/bigData.jpeg" alt="Training Session 4">
                <div class="gallery-caption">
                    <h3>Big Data Summit - New York</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section domains" id="courses">
    <div class="container">
        <h2 class="section-title">Our Training Domains</h2>
        <div class="domain-cards">
            <div class="domain-card">
                <img src="../uploads/cobit.webp" alt="Management Domain">
                <div class="domain-content">
                    <h3>Management</h3>
                    <p>Project management methodologies including Scrum, Prince2, and service management frameworks like ITIL and COBIT.</p>
                    <a href="formations.php?domain=Management" class="btn">View Courses</a>
                </div>
            </div>
            <div class="domain-card">
                <img src="../uploads/it.png" alt="IT Domain">
                <div class="domain-content">
                    <h3>IT Development</h3>
                    <p>Programming and development courses covering JEE, Web Technologies, and other cutting-edge frameworks.</p>
                    <a href="formations.php?domain=IT" class="btn">View Courses</a>
                </div>
            </div>
            <div class="domain-card">
                <img src="../uploads/Big-data-main-application-areas.png" alt="Big Data Domain">
                <div class="domain-content">
                    <h3>Big Data</h3>
                    <p>Advanced courses on data processing frameworks including Hadoop, Spark, and modern analytics tools.</p>
                    <a href="formations.php?domain=BigData" class="btn">View Courses</a>
                </div>
            </div>
            <div class="domain-card">
                <img src="../uploads/PhysicalNetworkDiagram.jpg" alt="Networking Domain">
                <div class="domain-content">
                    <h3>Networking</h3>
                    <p>Network infrastructure and certification courses including CISCO certifications and network security.</p>
                    <a href="formations.php?domain=Networking" class="btn">View Courses</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section cta">
    <div class="container">
        <h2>Ready to Enhance Your Professional Skills?</h2>
        <p>Explore our comprehensive catalog of courses and find the perfect training program to meet your career development goals.</p>
        <a href="/includes/formations.php" class="btn">Browse Formations</a>
    </div>
</section>
<?php require_once 'footer.html' ?>
</body>
</html>