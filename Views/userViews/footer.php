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
    <div id="logo">
            <img src="<?php echo $GLOBALS['base-url'];?>Images/logo.png" alt="">
        </div>
    <div class="footer-menu">
        <ul>
            <?php foreach ($links as $link) {
            ?>
            <li>
                    <a href="<?php echo $GLOBALS['base-url'].$link['link'] ?>" class=""><?php echo $link['name'] ?></a>
            </li>
            <?php
            } ?>
        </ul>
    </div>
</footer>
</body>
</html>