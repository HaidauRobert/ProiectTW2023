<!DOCTYPE html>
<head>
<title>I DisLike It</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/admin.css">
</head>
<body>  
    <nav>
        <div class="logo">
            <a href="home">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-buttons">
            <ul>
                <li><a href="myprofile">Profilul meu</a></li>
            </ul>
        </div>
    </nav>
<div class="container">
        <div class="card">
            <b><h1 class="panel-text">Admin Panel</h1></b>
            <div class="tag-buttons">
                <h3>Write the name of a tag in a box and click 'Add' to add that tag, or 'Remove' to remove it</h3>
                <input type="text" id="tagName" placeholder="Enter tag name">
                <button class="button" id="addTag">Add</button>
                <button class="button" id="removeTag">Remove</button>
            </div>
            <div class="export-data">
                <h3>Select the database you want to export, then the format you want it exported in and finally click the Export button to download it</h3>
                <select id="databaseSelect">
                    <option value="" disabled selected>Select database</option>
                    <option value="database1">Database 1</option>
                    <option value="database2">Database 2</option>
                </select>
                <select id="formatSelect">
                    <option value="" disabled selected>Select format</option>
                    <option value="csv">CSV</option>
                    <option value="json">JSON</option>
                </select>
                <button class="button" id="exportButton">Export</button>
            </div>
	</div>
</body>