<?php include("includes/header.php"); ?>
</head>
<body>



<main role="main">
    <?php include("includes/header-content.php"); ?>
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">News & Publications</a></li>
                        <li class="breadcrumb-item"><a href="#">Publication</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<div class="landing-overview base-padding">
			<div class="row">
				<div class="col-md-8">
					<div class="content">
						<h1 class="title">Photo</h1>

                        <div class="media-container">
                            <form class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="staticEmail2">Category:</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <select class="form-control form-control-sm">
                                        <option>All Photos</option>
                                    </select>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="media">
                                        <a class="media-content" href="photo-details.php">
                                            <div class="media-image" style="background-image: url(images/feature-image-3.jpg">
                                                <img src="images/news-thumb.png" />
                                            </div>
                                            <div class="media-image-text">
                                                <h2>Public Health Seminar 2021</h2>
                                                <h4>Health Security</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="media">
                                        <a class="media-content" href="#">
                                            <div class="media-image" style="background-image: url(images/feature-image-3.jpg">
                                                <img src="images/news-thumb.png" />
                                            </div>
                                            <div class="media-image-text">
                                                <h2>Public Health Seminar 2021</h2>
                                                <h4>Health Security</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="media">
                                        <a class="media-content" href="#">
                                            <div class="media-image" style="background-image: url(images/feature-image-3.jpg">
                                                <img src="images/news-thumb.png" />
                                            </div>
                                            <div class="media-image-text">
                                                <h2>Public Health Seminar 2021</h2>
                                                <h4>Health Security</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="media">
                                        <a class="media-content" href="#">
                                            <div class="media-image" style="background-image: url(images/feature-image-3.jpg">
                                                <img src="images/news-thumb.png" />
                                            </div>
                                            <div class="media-image-text">
                                                <h2>Public Health Seminar 2021</h2>
                                                <h4>Health Security</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="side-nav">
						<h4>News & Publications</h4>
                        <ul>
                            <li><a href="articles.php">Stories from the Field</a></li>
                            <li class="has-child"><a href="monthly-bulletin.php">Publication</a>
                                <ul>
                                    <li><a href="monthly-bulletin.php">Monthly Bulletin</a></li>
                                    <li><a href="video.php">Video</a></li>
                                    <li><a href="photo.php">Photo</a></li>
                                    <li><a href="media-coverage.php">Media Coverage</a></li>
                                    <li><a href="press-releases.php">Press Releases</a></li>
                                </ul>
                            </li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>	
</main>


	 
<?php include("includes/footer.php"); ?>


</body>
</html>