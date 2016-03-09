<?php
header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
?>
<rss xmlns:orgsource="http://purl.org/dc/elements/1.1/" version="2.0">
    <channel>
        <title>News site</title>
        <link><?php echo "http://".$_SERVER["HTTP_HOST"]; ?> </link>
        <description>News site from Ukraine</description>

        <?php foreach($items as $item): ?>
        <item>
            <title><?php echo $item['title']; ?></title>
            <link><?php echo "http://".$_SERVER["HTTP_HOST"]."/news/view/".$item['id']; ?> </link>
            <description><?php echo $item['article'] ?></description>
        </item>
        <?php endforeach; ?>

    </channel>
</rss>