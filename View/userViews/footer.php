<?php
$links = [
    ["name" => "Home", 'link' => ''],
    ["name" => "News", 'link' => 'news'],
    ["name" => "Comparateur", 'link' => 'compare'],
    ["name" => "Marques", 'link' => 'marques'],
    ["name" => "Avis", 'link' => 'avis'],
    ["name" => "Guides", 'link' => 'guides'],
    ["name" => "Contacts", 'link' => 'contact-us']
 ]

?>
</div>
<footer>
    <p>Copyright 2024</p>
<ul>
    <?php foreach ($links as $link) {
    ?>
    <li>
            <a href="/Comparateur-vehicule/<?php echo $link['link'] ?>" class=""><?php echo $link['name'] ?></a>
    </li>
    <?php
    } ?>
</ul>


</footer>
</body>
</html>