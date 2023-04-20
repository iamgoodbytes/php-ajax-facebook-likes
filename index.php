<?php

include_once("bootstrap.php");
$posts = Post::getAll();



?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Become a fan</title>
	<style>
		body {
			background-color: #e9eaed;
			font-family: Helvetica, Arial, 'lucida grande', tahoma, verdana, arial, sans-serif;
		}

		article {
			background-color: #fff;
			font-size: 15px;
			padding: 0.5em;
			width: 300px;
			margin-bottom: 1em;
		}

		article div {
			color: #3b5998;
		}
	</style>
</head>

<body>

	<a href="#" data-location="Mechelen" data-campus="Ham"></a>

	<?php foreach ($posts as $post) : ?>
		<article>
			<p><?php echo $post->text; ?></p>
			<img src="https://picsum.photos/300/200?random=<?php echo rand(1, 10000); ?>" alt="">
			<div><a href="#" data-id="<?php echo $post->id; ?>" class="like">Like</a> <span class='likes' id="counter<?php echo $post->id ?>"><?php echo $post->getLikes(); ?></span> people like this </div>
		</article>
	<?php endforeach; ?>
	Profielfoto van tibo_m
	<script>
		//add click event to a.like
		let likes = document.querySelectorAll(".like");

		for (let i = 0; i < likes.length; i++) {
			likes[i].addEventListener("click", function(e) {
				e.preventDefault();
				//get data-id attribute from clicked element
				let id = this.getAttribute("data-id");
				//get counter element
				let counter = document.querySelector("#counter" + id);
				//fetch request (POST) to '/ajax/like.php', use formdata
				let formData = new FormData();
				formData.append("id", id);
				fetch("ajax/like.php", {
						method: "POST",
						body: formData
					})
					.then(function(response) {
						return response.json();
					})
					.then(function(json) {
						//update counter
						counter.innerHTML = json.likes;
					});

			});
		}
	</script>


</body>

</html>