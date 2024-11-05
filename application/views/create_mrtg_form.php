<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create MRTG Config</title>
</head>
<body>

<h1>Create MRTG Configuration</h1>

<form action="<?php echo site_url('MrtgController/createConfig'); ?>" method="post">
    <label for="site_name">Nama Site (contoh: sitebms.cfg):</label>
    <input type="text" id="site_name" name="site_name" required>
    <br><br>

    <label for="target">Target:</label>
    <input type="text" id="target" name="target" value=".1.3.6.1.2.1.31.1.1.1.6.34&.1.3.6.1.2.1.31.1.1.1.10.34:public@103.158.28.1" required>
    <br><br>

    <label for="max_bytes">Max Bytes:</label>
    <input type="text" id="max_bytes" name="max_bytes" value="100000000000" required>
    <br><br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="IPT TERABIT" required>
    <br><br>

    <label for="page_top">Page Top:</label>
    <textarea id="page_top" name="page_top"><H1>IPT TERABIT</H1></textarea>
    <br><br>

    <button type="submit">Create Config</button>
</form>

</body>
</html>
