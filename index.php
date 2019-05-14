<?php
include( 'head.php' );


// Declares the function
function display_post($post){
        echo "<div class='content'>";
        echo "<h2>".$post['title']."</h2>";
        $date = ($post['post_date']);
        echo "<p><i>".date('j F, Y', $date)."</i></p>";
        echo "<p>".$post['author']."</p>";
        echo "<p>".$post['content']."</p>";
        echo "</div>";
}
// Gets the data we work with
$posts_data = file_get_contents("data/posts.json");
// decodes the data so we can use it
$posts_data = json_decode($posts_data, TRUE);
// creates table with one column per value
$dates = array_column($posts_data, 'post_date');
//rearranges posts by date
array_multisort($dates, SORT_DESC, $posts_data);
// run the function for each individual post
foreach($posts_data as $post){

  display_post($post);

}
?>
</div>
<?php
include('foot.php');
?>
