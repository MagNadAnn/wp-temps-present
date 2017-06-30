<form method="get" id="form" action="<?php bloginfo('url'); ?>/" class="search-form">
  <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Ouvrage, thème...">
  <input type="submit" id="submit" class='btn' value="Rechercher">
</form>