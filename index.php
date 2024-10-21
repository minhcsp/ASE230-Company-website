<?php
    require 'lib/readText.php';
    require 'lib/readCSV.php';
    require 'lib/readJSON.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo readPlainText('name.txt'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesbrand" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css" />

    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/colors/cyan.css" id="color-opt">
</head>

<body data-bs-theme="light">

    <!-- STRAT NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky sticky-white" role="navigation"
        id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.php">
                <i class="mdi mdi-alien"></i><?php echo readPlainText('name.txt'); ?>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a data-scroll href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#services" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#awards" class="nav-link">Awards</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="admin/pages/index.php" class="nav-link">Admin</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!--START HOME-->
    <section class="section bg-home home-half" id="home" data-image-src="images/bg-home.jpg">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-white text-center">
                    <h4 class="home-small-title">WELCOME TO</h4>
                    <h1 class="home-title"><?php echo readPlainText('name.txt'); ?></h1>
                    <p class="pt-3 home-desc mx-auto"><?php echo readPlainText('overview.txt'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!--END HOME-->

    <?php
    $services = readJSON('admin/products/services.json');

    function displayApplications($applications) {
        echo '<ul class="pt-2 text-muted">';
        foreach ($applications as $application) {
            echo '<li>' . $application . '</li>';
        }
        echo '</ul>';
    }

    function displayServices($services) {
        foreach ($services['products_services'] as $service) {
            echo '<div class="col-lg-6 mt-4">';
            echo '<div class="services-box">';
            echo '<div class="d-flex">';
            echo '<i class="pe-7s-diamond text-primary"></i>';
            echo '<div class="ms-4">';
            echo '<h4>' . $service['name'] . '</h4>';
            echo '<p class="pt-2 text-muted">' . $service['description'] . '</p>';
            
            echo '<h5>Applications:</h5>';
            displayApplications($service['applications']);

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>

    <!--START SERVICES-->
    <section class="section bg-light" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="section-title text-center">Our Services</h1>
                <div class="section-title-border mt-3"></div>
                <p class="section-subtitle text-muted text-center pt-4 font-secondary">
                <?php echo readPlainText('statement.txt'); ?>
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <?php displayServices($services); ?>
        </div>
    </div>
    </section>
    <!--END SERVICES-->


    <?php
    $teamData = readCSV('admin/team/team.csv');

    function displayTeamMembers($teamData) {
        for ($i = 1; $i < count($teamData); $i++) {
            $name = $teamData[$i][0];
            $title = $teamData[$i][1];
            $expertise = $teamData[$i][2];
            $biography = $teamData[$i][3];

            $imageSrc = "images/team/img-" . ($i) . ".jpg";

            echo '<div class="col-lg-4 col-sm-6">';
            echo '<div class="team-box text-center">';
            echo '<div class="team-wrapper">';
            echo '<div class="team-member">';
            echo '<img alt="" src="' . $imageSrc . '" class="img-fluid rounded">';
            echo '</div>';
            echo '</div>';
            echo '<h4 class="team-name">' . $name . '</h4>';
            echo '<p class="text-uppercase team-designation">' . $title . '</p>';
            echo '<p class="text-muted">' . $expertise . '</p>';
            echo '<p class="team-bio">' . $biography . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>



    <!--START ABOUT-US-->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="about-title mx-auto text-center">
                        <h2>MEET OUR TEAM</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <?php displayTeamMembers($teamData); ?>
            </div>
        </div>
    </section>
    <!--END ABOUT-US-->

    <?php
    function displayAwards($awards) {
        if (is_array($awards) && !empty($awards)) {
            foreach ($awards as $award) {
                if (isset($award['year']) && isset($award['achievement'])) {
                    echo '<p class="text-white" style="font-size: 14px;">' . htmlspecialchars($award['year']) . ': ' . htmlspecialchars($award['achievement']) . '</p>';
                }
            }
        } else {
            echo '<p class="text-white">No awards found.</p>';
        }
    }
    ?>

    <!--START AWARD-->
    <section class="section section-lg bg-get-start" id="awards">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="get-started-title text-white">Our Awards</h1>
                    <p class="section-subtitle font-secondary text-white pt-4">
                        <?php
                        $awards = readJSON('admin/awards/awards.json');
                        displayAwards($awards['awards']);
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--END AWARD-->


    <?php
    $jsonFile = 'admin/contacts/contacts.json';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
        $comments = isset($_POST['comments']) ? $_POST['comments'] : '';

        $contactData = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'comments' => $comments,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        if (file_exists($jsonFile)) {
            $currentData = json_decode(file_get_contents($jsonFile), true);
            $currentData[] = $contactData;
        } else {
            $currentData = [$contactData];
        }

        file_put_contents($jsonFile, json_encode($currentData, JSON_PRETTY_PRINT));

        $successMessage = "Your message has been sent successfully.";
    }
    ?>
    <!-- CONTACT FORM START-->
    <section class="section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="section-title text-center">Get In Touch</h1>
                    <div class="section-title-border mt-3"></div>
                    <p class="section-subtitle text-muted text-center font-secondary pt-4">We thrive when coming up with
                        innovative ideas but also understand that a smart concept should be supported with measurable
                        results.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-4 pt-4">
                        <p class="mt-4"><span class="h5">Office Address 1:</span><br> <span
                                class="text-muted d-block mt-2">4461 Cedar Street Moro, AR 72368</span></p>
                        <p class="mt-4"><span class="h5">Office Address 2:</span><br> <span
                                class="text-muted d-block mt-2">2467 Swick Hill Street <br />New Orleans, LA
                                70171</span></p>
                        <p class="mt-4"><span class="h5">Working Hours:</span><br> <span
                                class="text-muted d-block mt-2">9:00AM To 6:00PM</span></p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="custom-form mt-4 pt-4">
                        <?php if (isset($successMessage)): ?>
                            <div class="alert alert-success">
                                <?php echo $successMessage; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Your name*" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Your email*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Your Subject.." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <textarea name="comments" id="comments" rows="4" class="form-control"
                                            placeholder="Your message..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary"
                                        value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM END-->

    <!--START FOOTER-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- First Column -->
                <div class="col-lg-4 mt-3"> <!-- Changed from col-lg-3 to col-lg-4 for wider columns -->
                    <a class="footer-logo text-uppercase" href="#">
                        <i class="mdi mdi-alien"></i><?php echo readPlainText('name.txt'); ?>
                    </a>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-lg-4 mt-3"> <!-- Changed from col-lg-3 to col-lg-4 for wider columns -->
                    <h4>Information</h4>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Bookmarks</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Third Column -->
                <div class="col-lg-4 mt-3"> <!-- Changed from col-lg-3 to col-lg-4 for wider columns -->
                    <h4>Support</h4>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Discussion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--END FOOTER-->


    <!--START FOOTER ALTER-->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-sm-start pull-none">
                        <p class="copy-rights  mb-3 mb-sm-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © <?php echo readPlainText('name.txt'); ?>
                        </p>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                </div>
            </div>
        </div>
    </div>
    <!--END FOOTER ALTER-->

    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/gumshoe.polyfills.min.js"></script>
    <!-- Main Js -->
    <script src="js/app.js"></script>
</body>

</html>