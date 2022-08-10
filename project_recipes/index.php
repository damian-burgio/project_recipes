<?php
include_once('functions.php');
define('NUM_ITEMS_BY_PAGE', 6);

if (isset($_POST['meal_name'])) {
	$meal_name = $_POST['meal_name'];
} else {
	$meal_name = 'chicken';
}


$response_array = convert_into_array($meal_name);

$entries = $response_array['meals'];


if ($entries != null) {
	$pageNow = isset($_GET['page']) ? $_GET['page'] : 1;

	$totalPages = ceil(count($entries) / NUM_ITEMS_BY_PAGE);

	$x = ($pageNow - 1) * NUM_ITEMS_BY_PAGE;
	$y = NUM_ITEMS_BY_PAGE;

	$entries = array_slice($entries, $x, $y);
}

include_once('header.php');
?>

<body data-bs-spy="scroll" data-bs-target="#navScrollspy">
	<nav class="navbar bg-primary navbar-dark navbar-expand-lg fixed-top">
		<div class="container">
			<a href="index.html" class="navbar-brand">Webb app Recipes</a>
			<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav" id="navScrollspy">
					<li class="nav-item">
						<a class="nav-link" href="#section-hero">To the top</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#section-recipe-of-the-month">Recipe of the month</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#section-tips">Tips</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#section-find-your-recipe">Find your recipe</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#section-reviews">Reviews</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<section id="section-hero" class="text-center text-white d-flex justify-content-center align-items-center py-5">
		<div class="container">
			<h1 class="display-1 text-primary text-uppercase mt-5">The Simply Recipes Team</h1>

			<p class="lead text-dark"><b>Simply Recipes</b> is a trusted resource for home cooks with more than 3,000
				tested recipes, guides, and meal plans.</p>
			<p class="lead">Laborum unde dolores ullam nostrum?</p>

		</div>
	</section>
	<div class="container">
		<section id="section-recipe-of-the-month" class="mt-5">
			<h2 class="display-4 text-center">Recipe of the month: CHICKEN ENCHILADAS</h2>
			<p>My favorite chicken enchilada recipe is easy to make, customizable with your favorite fillings, and made
				with my favorite homemade enchilada sauce. It’s always a crowd fave, and perfect for meal prep and
				freezing too!</p>
			<p>This chicken enchilada recipe was actually one of the first-ever posts that I shared here on Gimme Some
				Oven back in 2009. And now, more than a decade later, it still continues to be one of the recipes I make
				most often for dinner here in our house — and one of the recipes that our readers make most often too!
				I’m so happy you all continue to enjoy it!</p>
		</section>
		<section class="mt-5">
			<h2 class="display-4 text-center">Dinner Hacks</h2>
			<p class="text-center">by El Monterrey</p>
			<div class="ratio ratio-16x9">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/x7tgSm6YS7Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</section>
		<section id="section-tips" class="mt-5">
			<h2 class="display-4 text-center">Tips</h2>
			<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
			<div id="carousel" class="carousel slide" data-bs-ride="carousel">
				<ol class="carousel-indicators">
					<li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
					<li data-bs-target="#carousel" data-bs-slide-to="1"></li>
					<li data-bs-target="#carousel" data-bs-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img src="img/carousel1.jpg" alt="Slide #1" class="d-block img-fluid">
						<div class="carousel-caption">
							<h3 class="display-4">Slide Heading</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/carousel3.jpg" alt="Slide #2" class="d-block img-fluid">
						<div class="carousel-caption">
							<h3 class="display-4">Slide Heading</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/carousel4.jpg" alt="Slide #3" class="d-block img-fluid">
						<div class="carousel-caption">
							<h3 class="display-4">Slide Heading</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>

				</div>
				<a href="#carousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</a>
				<a href="#carousel" class="carousel-control-next" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</a>
			</div>
		</section>

		<section id="section-find-your-recipe" class="mt-5">
			<h2 class="display-4 text-center">Find your recipe...</h2>
			<form action="index.php" method="POST">
				<div class="mb-3 mt-3 mx-auto w-50">
					<input type="text" class="form-control mb-3" id="meal_name" placeholder="Example: 'Chicken'" name="meal_name" required>
					<button type="submit" class="btn btn-primary d-block mx-auto w-50 mb-5">Search</button>
				</div>
			</form>
			<!-------------------------------------------------------------->
			<div class="container-lg main">
				<div class="row mt-4">
					<?php


					if ($entries) {

						foreach ($entries as $obj) {
					?>
							<div class="col-lg-4 col-md-12 col-sm-12 text-center mb-3">
								<div class="mx-auto card" style="width: 20rem;">
									<img src="<?php echo $obj['strMealThumb'] ?>" class="single-card-img p-2" alt="">
									<div class="card-body">
										<h5 class="card-title"><?php echo $obj['strMeal'] ?></h5>
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $obj['idMeal'] ?>">
											Instructions
										</button>
									</div>
								</div>
							</div>

							<!-- The Modal -->
							<div class="modal" id="myModal<?php echo $obj['idMeal'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h3 class="modal-title"><?php echo $obj['strMeal'] ?></h3>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
											<p><b>Area:</b><br><?php echo $obj['strArea'] ?></p>
											<p><b>Instructions:</b><br><?php echo $obj['strInstructions'] ?></p>
											<div class="text-center">
												<a href="<?php echo $obj['strYoutube'] ?>"><i class="fa-brands fa-youtube fa-2xl"></i></a>
											</div>
										</div>

										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
										</div>

									</div>
								</div>
							</div>

						<?php } ?>
				</div>
			</div>
			<!-------------------------------------------------------------->
			<div class="mt-3 d-flex justify-content-center">
				<ul class="pagination">
				<?php
						for ($i = 1; $i <= $totalPages; $i++) {

							echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
						}
					} else {
						echo '<div class="alert alert-info">
								<p class="mt-3 d-flex justify-content-center"><strong>Holy guacamole!</strong> You should try another name...</p>
			  				  </div>';
					} ?>
				</ul>
			</div>
		</section>


		<section id="section-reviews" class="mt-5">
			<h2 class="display-4 text-center">Reviews</h2>
			<div class="row mb-3">
				<div class="col-12 col-md-6 col-xl-3 gx-5 gy-3">
					<figure>
						<blockquote class="blockquote">
							<p><i class="fas fa-fw fa-quote-left text-secondary" aria-hidden="true"></i> Lorem ipsum
								dolor sit amet consectetur adipisicing elit. Perspiciatis voluptates sint at! Laboriosam
								ducimus expedita reiciendis suscipit quibusdam ad ipsa distinctio voluptatem ullam
								adipisci id molestias, explicabo iusto atque. <i class="fas fa-fw fa-quote-right text-secondary" aria-hidden="true"></i></p>
						</blockquote>
						<figcaption class="blockquote-footer">Firstname Lastname <time datetime="2020-09-01T12:00">(September 01 2020 12:00)</time></figcaption>
					</figure>
				</div>
				<div class="col-12 col-md-6 col-xl-3 gx-5 gy-3">
					<figure>
						<blockquote class="blockquote">
							<p><i class="fas fa-fw fa-quote-left text-secondary" aria-hidden="true"></i> Lorem ipsum
								dolor sit amet consectetur adipisicing elit. Perspiciatis voluptates sint at! Laboriosam
								ducimus expedita reiciendis suscipit quibusdam ad ipsa distinctio voluptatem ullam
								adipisci id molestias, explicabo iusto atque. <i class="fas fa-fw fa-quote-right text-secondary" aria-hidden="true"></i></p>
						</blockquote>
						<figcaption class="blockquote-footer">Firstname Lastname <time datetime="2020-09-01T12:00">(September 01 2020 12:00)</time></figcaption>
					</figure>
				</div>
				<div class="col-12 col-md-6 col-xl-3 gx-5 gy-3">
					<figure>
						<blockquote class="blockquote">
							<p><i class="fas fa-fw fa-quote-left text-secondary" aria-hidden="true"></i> Lorem ipsum
								dolor sit amet consectetur adipisicing elit. Perspiciatis voluptates sint at! Laboriosam
								ducimus expedita reiciendis suscipit quibusdam ad ipsa distinctio voluptatem ullam
								adipisci id molestias, explicabo iusto atque. <i class="fas fa-fw fa-quote-right text-secondary" aria-hidden="true"></i></p>
						</blockquote>
						<figcaption class="blockquote-footer">Firstname Lastname <time datetime="2020-09-01T12:00">(September 01 2020 12:00)</time></figcaption>
					</figure>
				</div>
				<div class="col-12 col-md-6 col-xl-3 gx-5 gy-3">
					<figure>
						<blockquote class="blockquote">
							<p><i class="fas fa-fw fa-quote-left text-secondary" aria-hidden="true"></i> Lorem ipsum
								dolor sit amet consectetur adipisicing elit. Perspiciatis voluptates sint at! Laboriosam
								ducimus expedita reiciendis suscipit quibusdam ad ipsa distinctio voluptatem ullam
								adipisci id molestias, explicabo iusto atque. <i class="fas fa-fw fa-quote-right text-secondary" aria-hidden="true"></i></p>
						</blockquote>
						<figcaption class="blockquote-footer">Firstname Lastname <time datetime="2020-09-01T12:00">(September 01 2020 12:00)</time></figcaption>
					</figure>
				</div>
			</div>
		</section>
	</div>
	<section id="section-newsletter" class="bg-secondary py-5">
		<div class="container">
			<form class="text-white" method="POST" action="db.php">
				<h2 class="display-4 text-center">Newsletter</h2>
				<p class="lead text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<div class="row">
					<div class="col-12 col-sm-6">
						<div class="mb-3">
							<label for="input-name" class="visually-hidden">Your name:</label>
							<input type="text" class="form-control" placeholder="Firstname Lastname" name="name">
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="mb-3">
							<label for="input-email" class="visually-hidden">Your email:</label>
							<input type="email" class="form-control" placeholder="mail@example.com" name="email">
						</div>
					</div>
				</div>
	
				<div class="d-flex">
					<button type="submit" class="btn btn-primary text-white mx-auto w-50">Suscribe</button>
				</div>
			</form>
			<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">>
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalTitle">Terms and conditions</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas feugiat, urna ut
								pharetra ultricies, augue tellus euismod turpis, vitae semper ipsum augue a velit.
								Pellentesque id finibus velit. Ut sagittis maximus maximus. In aliquet enim sed turpis
								mollis ornare. Suspendisse elementum a magna eu luctus. Etiam tincidunt mattis mauris,
								non lobortis nulla tempor in. Sed lacinia metus viverra, scelerisque enim sed,
								sollicitudin magna. Sed non augue sit amet nisl tincidunt ultrices. Praesent nec lacus
								eget tortor ultricies pulvinar. Praesent euismod ut lorem sit amet bibendum.</p>
							<p>Pellentesque vitae convallis magna. Morbi non elementum mi. Suspendisse at mollis arcu,
								eu tempus tellus. Aenean fringilla eleifend nisl. Aliquam erat volutpat. Sed a tortor
								quis tortor convallis mattis. Nunc congue massa vitae lectus dictum, a mattis metus
								dignissim.</p>
							<p>Nulla feugiat, lorem sit amet vehicula hendrerit, velit eros pellentesque est, at dictum
								elit risus id diam. In ante lorem, blandit vel dui in, sagittis laoreet erat. Proin
								dictum sit amet urna ut placerat. Pellentesque laoreet, dolor vitae facilisis feugiat,
								quam quam gravida elit, nec sagittis orci metus at leo. In scelerisque felis vel neque
								lobortis ullamcorper. Praesent quis sagittis neque, nec eleifend neque. Suspendisse at
								consectetur eros. Mauris lectus libero, molestie vel dapibus sit amet, luctus gravida
								ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero neque, pretium
								quis malesuada eget, congue ac mauris.</p>
							<p>Aenean quis tristique libero. Vestibulum sagittis, sapien gravida lobortis posuere, diam
								arcu auctor libero, at tempor mauris nulla vel odio. Phasellus semper eros rutrum mi
								scelerisque interdum. Maecenas euismod est sit amet justo vestibulum bibendum. Etiam
								scelerisque sodales nisi nec efficitur. Pellentesque arcu mauris, accumsan eget mollis
								at, ultrices id ante. Duis in mi eget nisi euismod gravida. Cras pharetra sollicitudin
								elit, vel eleifend felis dignissim non. Integer leo ex, feugiat eu lorem egestas, mollis
								suscipit nulla. Duis quis tellus nulla. Maecenas risus ipsum, fringilla at orci sit
								amet, mattis fringilla orci. Vivamus odio tellus, ornare eu leo id, pellentesque sodales
								ante.</p>
							<p>Sed laoreet ut ligula eget fringilla. Suspendisse dapibus dui at ex dictum hendrerit.
								Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
								Morbi efficitur ac purus eget dignissim. Aliquam ultrices, orci finibus sollicitudin
								tempus, elit metus scelerisque magna, a rhoncus justo nisl vitae lectus. Nam mollis sed
								est ut ullamcorper. Curabitur consequat feugiat erat quis molestie. Fusce suscipit sem
								et nulla dignissim, id malesuada felis laoreet. Cras leo ligula, vulputate id mi ac,
								gravida porta sem. Mauris ullamcorper lectus ac eleifend elementum. Ut id velit
								consequat, facilisis leo vitae, volutpat nisi. Nunc hendrerit libero mi. Integer
								scelerisque mattis neque placerat condimentum. Pellentesque habitant morbi tristique
								senectus et netus et malesuada fames ac turpis egestas. Nulla eu odio mi. Duis interdum
								vulputate turpis pretium congue.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	include_once('footer.php');

	?>