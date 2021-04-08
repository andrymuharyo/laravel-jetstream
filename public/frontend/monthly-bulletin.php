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
                        <li class="breadcrumb-item active" aria-current="page">Monthly Bulletin</li>
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
						<h1 class="title">Monthly Bulletin</h1>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-plus-circle"></i> 2021
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - March 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - February 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - January 2021</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-plus-circle"></i> 2020
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - March 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - February 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - January 2021</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fas fa-plus-circle"></i> 2019
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - March 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - February 2021</a></li>
                                            <li><a href="#"><i class="fas fa-angle-right"></i> AIHSP Monthly Bulletin - January 2021</a></li>
                                        </ul>
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