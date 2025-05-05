<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Our Formations</title>
    <link rel="stylesheet" href="../css/formations.css" />
</head>
<body>
<?php require_once 'header.html' ?>
<section class="page-header">
    <div class="container">
        <h1>Our Training Programs</h1>
        <p>Discover our comprehensive range of professional training courses designed to enhance your skills and boost your career.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="search-filters">
            <h2>Find Your Perfect Course</h2>
            <form id="filter-form">
                <div class="filter-group">
                    <div class="filter-item">
                        <label for="domain">Domain</label>
                        <select id="domain" name="domain">
                            <option value="">All Domains</option>
                            <option value="management">Management</option>
                            <option value="computer-science">Computer Science</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject">
                            <option value="">All Subjects</option>
                            <!-- Subjects will be loaded based on domain selection -->
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="course">Course</label>
                        <select id="course" name="course">
                            <option value="">All Courses</option>
                            <!-- Courses will be loaded based on subject selection -->
                        </select>
                    </div>
                </div>
                <div class="filter-group">
                    <div class="filter-item">
                        <label for="location">Location</label>
                        <select id="location" name="location">
                            <option value="">All Locations</option>
                            <option value="paris">Paris, France</option>
                            <option value="london">London, UK</option>
                            <option value="berlin">Berlin, Germany</option>
                            <option value="madrid">Madrid, Spain</option>
                            <option value="remote">Remote</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="date-from">Date From</label>
                        <input type="date" id="date-from" name="date-from">
                    </div>
                    <div class="filter-item">
                        <label for="date-to">Date To</label>
                        <input type="date" id="date-to" name="date-to">
                    </div>
                </div>
                <div class="filter-actions">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn">Search Courses</button>
                </div>
            </form>
        </div>

        <div class="formation-grid">
            <!-- Formation Card 1 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="Scrum Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Management</span>
                    <h3 class="formation-title">Scrum Fundamentals</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>Paris, France</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>June 15-17, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>Michel Dubois</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🏢</span>
                            <span>On-site</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€1,200</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Formation Card 2 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="ITIL Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Management</span>
                    <h3 class="formation-title">ITIL Foundation</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>Remote</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>July 5-7, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>Sophie Martin</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🖥️</span>
                            <span>Online</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€950</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Formation Card 3 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="JEE Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Computer Science</span>
                    <h3 class="formation-title">Advanced JEE Development</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>Berlin, Germany</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>June 22-26, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>Hans Mueller</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🏢</span>
                            <span>On-site</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€1,800</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Formation Card 4 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="Hadoop Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Computer Science</span>
                    <h3 class="formation-title">Big Data with Hadoop</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>London, UK</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>July 10-14, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>James Wilson</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🏢</span>
                            <span>On-site</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€2,200</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Formation Card 5 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="COBIT Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Management</span>
                    <h3 class="formation-title">COBIT 2019 Foundation</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>Madrid, Spain</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>August 3-5, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>Elena Rodriguez</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🏢</span>
                            <span>On-site</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€1,350</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Formation Card 6 -->
            <div class="formation-card">
                <div class="formation-image">
                    <img src="/api/placeholder/400/200" alt="Web Technologies Course">
                </div>
                <div class="formation-content">
                    <span class="formation-domain">Computer Science</span>
                    <h3 class="formation-title">Modern Web Technologies</h3>
                    <div class="formation-details">
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📍</span>
                            <span>Remote</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">📅</span>
                            <span>July 20-24, 2025</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">👨‍🏫</span>
                            <span>David Chen</span>
                        </div>
                        <div class="formation-detail">
                            <span class="formation-detail-icon">🖥️</span>
                            <span>Online</span>
                        </div>
                    </div>
                    <div class="formation-actions">
                        <span class="formation-price">€1,500</span>
                        <a href="#" class="btn">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <a href="#" class="pagination-item active">1</a>
            <a href="#" class="pagination-item">2</a>
            <a href="#" class="pagination-item">3</a>
            <a href="#" class="pagination-item">4</a>
            <a href="#" class="pagination-item">5</a>
        </div>
    </div>
</section>

<script>
    // Simple JavaScript to handle filtering and form submission
    document.addEventListener('DOMContentLoaded', function() {
        const domainSelect = document.getElementById('domain');
        const subjectSelect = document.getElementById('subject');
        const courseSelect = document.getElementById('course');

        // Domain to subjects mapping
        const domainSubjects = {
            'management': ['Management de Projet', 'Management de Services'],
            'computer-science': ['IT', 'Big Data', 'Reseau']
        };

        // Subject to courses mapping
        const subjectCourses = {
            'Management de Projet': ['Scrum', 'Prince 2'],
            'Management de Services': ['ITIL', 'COBIT'],
            'IT': ['JEE', 'Web Technologies'],
            'Big Data': ['Hadoop', 'Spark'],
            'Reseau': ['CISCO']
        };

        // Update subjects based on domain selection
        domainSelect.addEventListener('change', function() {
            const selectedDomain = this.value;

            // Clear subject options
            subjectSelect.innerHTML = '<option value="">All Subjects</option>';
            courseSelect.innerHTML = '<option value="">All Courses</option>';

            if (selectedDomain && domainSubjects[selectedDomain]) {
                // Add new subject options
                domainSubjects[selectedDomain].forEach(subject => {
                    const option = document.createElement('option');
                    option.value = subject.toLowerCase().replace(' ', '-');
                    option.textContent = subject;
                    subjectSelect.appendChild(option);
                });
            }
        });

        subjectSelect.addEventListener('change', function() {
            const selectedSubject = this.options[this.selectedIndex].text;

            courseSelect.innerHTML = '<option value="">All Courses</option>';

            if (selectedSubject && subjectCourses[selectedSubject]) {
                subjectCourses[selectedSubject].forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.toLowerCase().replace(' ', '-');
                    option.textContent = course;
                    courseSelect.appendChild(option);
                });
            }
        });

        document.getElementById('filter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Search filters applied. In a real implementation, this would fetch filtered results.');
        });
    });
</script>
<?php require_once 'footer.html' ?>
</body>
</html>