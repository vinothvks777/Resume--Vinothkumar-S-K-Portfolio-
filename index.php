<?php
$msg = '';
if ($_POST['submit']) {
    $to = 'vinothvks777@gmail.com'; // Your email [file:1]
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $subject = "Portfolio Contact: $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\nX-Mailer: PHP/".phpversion();
    if (mail($to, $subject, $body, $headers)) {
        $msg = '<div class="alert alert-success text-center mb-4 animate-fade-in">Message sent successfully! I\'ll reply soon.</div>';
    } else {
        $msg = '<div class="alert alert-danger text-center mb-4 animate-fade-in">Error sending. Try again or email directly.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinothkumar S K - Cloud & System Engineer | Portfolio</title>
    <meta name="description" content="Bangalore System Engineer | AWS Azure GCP Red Hat Admin | Automation & Web Dev">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: linear-gradient(135deg, #0d6efd, #6610f2); --success: #28a745; --dark: #1a1a1a; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; line-height: 1.7; color: #333; overflow-x: hidden; scroll-behavior: smooth; }
        .navbar { background: rgba(26,26,26,0.95)!important; backdrop-filter: blur(20px); transition: all 0.4s; box-shadow: 0 2px 20px rgba(0,0,0,0.3); }
        .navbar.scrolled { background: rgba(26,26,26,0.98)!important; }
        .nav-link { color: #fff !important; font-weight: 500; transition: color 0.3s; }
        .nav-link:hover { color: #0d6efd !important; }
        #home { min-height: 100vh; background: var(--primary), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1.5" fill="white" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>'); background-blend-mode: overlay; display: flex; align-items: center; text-align: center; position: relative; }
        #home::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); z-index: 1; }
        #home > * { position: relative; z-index: 2; }
        .profile-img { width: 220px; height: 220px; border: 5px solid rgba(255,255,255,0.3); transition: all 0.5s cubic-bezier(0.25,0.46,0.45,0.94); }
        .profile-img:hover { transform: scale(1.1) rotate(5deg); border-color: rgba(255,255,255,0.6); box-shadow: 0 20px 50px rgba(13,110,253,0.4); }
        h1 { font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 700; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }
        .lead { font-size: 1.4rem; font-weight: 300; opacity: 0.95; }
        .btn-primary { background: var(--primary); border: none; padding: 15px 40px; font-weight: 600; font-size: 1.1rem; border-radius: 50px; transition: all 0.4s; box-shadow: 0 10px 30px rgba(13,110,253,0.4); }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 40px rgba(13,110,253,0.6); }
        section { padding: 100px 0; }
        .section-title { font-size: 3rem; font-weight: 600; margin-bottom: 4rem; position: relative; display: inline-block; }
        .section-title::after { content: ''; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--primary); border-radius: 2px; }
        .card { border: none; border-radius: 20px; overflow: hidden; transition: all 0.5s cubic-bezier(0.25,0.46,0.45,0.94); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .card:hover { transform: translateY(-15px); box-shadow: 0 30px 60px rgba(0,0,0,0.2); }
        .progress { height: 12px; border-radius: 10px; background: rgba(255,255,255,0.2); overflow: hidden; backdrop-filter: blur(10px); }
        .progress-bar { border-radius: 10px; transition: width 2.5s cubic-bezier(0.25,0.46,0.45,0.94); }
        .timeline { position: relative; max-width: 800px; margin: 0 auto; }
        .timeline-item { position: relative; padding-left: 50px; margin-bottom: 40px; opacity: 0; transform: translateX(-50px); transition: all 0.8s; }
        .timeline-item.animate { opacity: 1; transform: translateX(0); }
        .timeline-item::before { content: ''; position: absolute; left: 20px; top: 0; width: 2px; height: 100%; background: linear-gradient(to bottom, #0d6efd, #6610f2); }
        .timeline-item i { position: absolute; left: 12px; top: 5px; background: white; color: #0d6efd; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        .skills-grid, .projects-grid { opacity: 0; transform: translateY(50px); transition: all 1s; }
        .skills-grid.animate, .projects-grid.animate { opacity: 1; transform: translateY(0); }
        .form-control { border-radius: 15px; border: 2px solid rgba(0,0,0,0.1); padding: 15px 20px; transition: all 0.3s; backdrop-filter: blur(10px); }
        .form-control:focus { border-color: #0d6efd; box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25); transform: scale(1.02); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(50px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        @media (max-width: 768px) { section { padding: 60px 0; } h1 { font-size: 2.5rem; } }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">VSK</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="d-flex align-items-center justify-content-center min-vh-100 text-white">
        <div class="container text-center px-4">
            <img src="images/photo.jpg" alt="Vinothkumar S K" class="profile-img mx-auto mb-4 shadow-lg">
            <h1 class="display-3 fw-bold mb-3">Vinothkumar S K</h1>
            <p class="lead fs-3 mb-5 px-3">System & Cloud Engineer | Red Hat Administrator<br>AWS • Azure • GCP • Automation Expert<br>Bangalore, India</p>
            <a href="#contact" class="btn btn-primary btn-lg px-5 py-3 fs-5 shadow-lg me-3 mb-3">Let's Connect</a>
            <a href="#projects" class="btn btn-outline-light btn-lg px-5 py-3 fs-5 shadow">View Projects</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center text-dark mb-5">About Me</h2>
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="images/photo.jpg" alt="Profile" class="img-fluid rounded-4 shadow-lg" style="max-height:400px; object-fit:cover;">
                </div>
                <div class="col-lg-6">
                    <p class="fs-5 text-muted mb-4">Experienced IT professional with 4+ years in system administration, cloud engineering, and automation. Specialized in multi-cloud environments (AWS, Azure, GCP) and Red Hat Linux administration. Passionate about scripting, network management, and web development (Django/Flask). Currently in Bangalore, supporting pharma manufacturing systems. [file:1]</p>
                    <div class="row g-3">
                        <div class="col-6"><i class="fas fa-map-marker-alt text-primary fs-4"></i> Bangalore, India</div>
                        <div class="col-6"><i class="fas fa-graduation-cap text-primary fs-4"></i> B.Sc. Computer Science</div>
                        <div class="col-6"><i class="fas fa-phone text-primary fs-4"></i> +91 90474 00147</div>
                        <div class="col-6"><i class="fas fa-envelope text-primary fs-4"></i> vinothvks777@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Technical Skills</h2>
            <div class="row g-4 skills-grid">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center p-4">
                        <i class="fab fa-aws fs-1 text-primary mb-3"></i>
                        <h5 class="fw-bold">Cloud Platforms</h5>
                        <p class="text-muted">AWS Associate, Azure VMs/Storage, GCP Compute</p>
                        <div class="progress mx-auto" style="width:80%;"><div class="progress-bar bg-primary" style="width:92%"></div></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center p-4">
                        <i class="fab fa-redhat fs-1 text-success mb-3"></i>
                        <h5 class="fw-bold">Red Hat Admin</h5>
                        <p class="text-muted">RHEL Config, Ansible, Security Hardening</p>
                        <div class="progress mx-auto" style="width:80%;"><div class="progress-bar bg-success" style="width:88%"></div></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-terminal fs-1 text-info mb-3"></i>
                        <h5 class="fw-bold">Scripting & Automation</h5>
                        <p class="text-muted">PowerShell, Bash, Python, Batch</p>
                        <div class="progress mx-auto" style="width:80%;"><div class="progress-bar bg-info" style="width:90%"></div></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-code fs-1 text-warning mb-3"></i>
                        <h5 class="fw-bold">Web Development</h5>
                        <p class="text-muted">Django, Flask, PHP, JS, HTML/CSS</p>
                        <div class="progress mx-auto" style="width:80%;"><div class="progress-bar bg-warning" style="width:82%"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-5 bg-gradient-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Work Experience</h2>
            <div class="timeline">
                <div class="timeline-item animate-fade-in-up">
                    <i class="fas fa-briefcase"></i>
                    <h5 class="fw-bold mb-2">System Administrator</h5>
                    <h6 class="text-primary mb-3">Viatris Inc via Wipro Ltd, Bangalore</h6>
                    <p>Jan 2025 – Present: Windows/Linux servers, MySQL, Azure/AWS backups, Red Hat deployments, ServiceNow, manufacturing HMI/IPC support. [file:1]</p>
                </div>
                <div class="timeline-item animate-fade-in-up" style="animation-delay:0.2s">
                    <i class="fas fa-briefcase"></i>
                    <h5 class="fw-bold mb-2">System Administrator</h5>
                    <h6 class="text-primary mb-3">Vindhya E-Infomedia Pvt Ltd</h6>
                    <p>Aug 2023 – Dec 2024: AD/DNS/DHCP/Group Policy for 450 users, Sophos Firewall, backups, remote support. [file:1]</p>
                </div>
                <div class="timeline-item animate-fade-in-up" style="animation-delay:0.4s">
                    <i class="fas fa-briefcase"></i>
                    <h5 class="fw-bold mb-2">Desktop Support Engineer</h5>
                    <h6 class="text-primary mb-3">HR Lotus, Krishnagiri</h6>
                    <p>Feb 2021 – Aug 2023: User systems, VPN/Citrix, printers, Outlook/O365 troubleshooting. [file:1]</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Featured Projects</h2>
            <div class="row g-4 projects-grid">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/project-aws.jpg" class="card-img-top" alt="AWS Backup" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">AWS S3 Backup Automation</h5>
                            <p class="card-text text-muted flex-grow-1">PowerShell script for automated multi-cloud backups with Red Hat cron jobs. Deployed in production.</p>
                            <a href="#" class="btn btn-outline-primary mt-auto">View Code <i class="fas fa-external-link-alt ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/project-redhat.jpg" class="card-img-top" alt="Red Hat" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Red Hat Ansible Playbooks</h5>
                            <p class="card-text text-muted flex-grow-1">Infrastructure as Code for RHEL servers: patching, config mgmt, security compliance.</p>
                            <a href="#" class="btn btn-outline-success mt-auto">Live Demo <i class="fas fa-external-link-alt ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/project-flask.jpg" class="card-img-top" alt="Web App" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Network Monitor Dashboard</h5>
                            <p class="card-text text-muted flex-grow-1">Flask/PHP app for Cisco AP/WLC monitoring with real-time alerts and charts.</p>
                            <a href="#" class="btn btn-outline-info mt-auto">GitHub <i class="fas fa-external-link-alt ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Get In Touch</h2>
            <?php echo $msg; ?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control fs-5" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control fs-5" placeholder="Email Address" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control fs-5" rows="6" placeholder="Tell me about your project or opportunity..." required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg px-5 py-3 fs-5 shadow-lg">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center mt-5 pt-4 border-top">
                <div class="col-md-8 text-center">
                    <h5 class="fw-bold mb-3">Connect Elsewhere</h5>
                    <a href="https://linkedin.com/in/vinothkumar-sk" class="btn btn-outline-primary btn-lg me-3 mb-2" target="_blank"><i class="fab fa-linkedin-in fs-4"></i> LinkedIn</a>
                    <a href="https://github.com/yourusername" class="btn btn-outline-dark btn-lg me-3 mb-2" target="_blank"><i class="fab fa-github fs-4"></i> GitHub</a>
                    <a href="mailto:vinothvks777@gmail.com" class="btn btn-outline-success btn-lg mb-2"><i class="fas fa-envelope fs-4"></i> Email</a>
                    <p class="mt-4 mb-0 text-muted">&copy; 2026 Vinothkumar S K. Built with ❤️ in Bangalore.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.querySelector('.navbar').classList.toggle('scrolled', window.scrollY > 50);
        });

        // Smooth scrolling & active nav
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        // Scroll animations with Intersection Observer
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    // Skills progress
                    if (entry.target.id === 'skills') {
                        entry.target.querySelectorAll('.progress-bar').forEach((bar, i) => {
                            setTimeout(() => bar.style.width = bar.style.width, i * 200);
                        });
                    }
                    // Timeline items
                    entry.target.querySelectorAll('.timeline-item, .skills-grid, .projects-grid').forEach((el, i) => {
                        el.style.animationDelay = `${i * 0.1}s`;
                        el.classList.add('animate-fade-in-up');
                    });
                }
            });
        }, observerOptions);

        // Observe sections
        document.querySelectorAll('section[id]').forEach(section => observer.observe(section));

        // Mobile navbar collapse
        document.querySelector('.navbar-toggler').addEventListener('click', () => {
            document.querySelector('#navbarNav').classList.toggle('show');
        });
    </script>
</body>
</html>
