	<div class="text-center float-center"  id='content'><?php
	
		// output 'headline' if available, otherwise 'title'
		echo "<h1>" . $page->get('headline|title') . "</h1>";
	
		// output bodycopy
		echo $page->body;

			// if the page has images on it, grab one of them randomly... 
			// $image = $page->images->getRandom();
		
			
			// output the image at the top of the sidebar...
			// echo "<img src='$image->url' alt='$image->description' />";
	

	?>





