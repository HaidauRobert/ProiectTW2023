<!DOCTYPE html>
<head>
<title>I DisLike It</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/admin.css">
</head>
<nav>
        <div class="logo">
            <a href="home">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-buttons">
            <ul>
              <li><a href="home">Home</a></li>
                <li><a href="myprofile">My Profile</a></li>
                <li><a href="newsfeed">Newsfeed</a></li>
            </ul>
        </div>
  </nav>
<body>  
<div class="container">
        <div class="card">
            <b><h1 class="panel-text">Admin Panel</h1></b>
            <div class="tag-buttons">
                <h3>Write the name of a tag in a box and click 'Add' to add that tag, or 'Remove' to remove it</h3>
                <form method="post">
                    <input type="text" name="tagName" id="tagName" placeholder="Enter tag name">
                    <button class="button" type="submit" name="addTag" id="addTag">Add</button>
                    <button class="button" type="submit" name="removeTag" id="removeTag">Remove</button>
                </form>
                    <?php if (!empty($data['addTagMessage'])): ?>
                        <p><?php echo $data['addTagMessage']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($data['removeTagMessage'])): ?>
                        <p><?php echo $data['removeTagMessage']; ?></p>
                    <?php endif; ?>
            </div>
            <div class="tags-section">
                <h3>Tags:</h3>
                <ul>
                    <?php foreach ($data['tags'] as $tag) : ?>
                        <li>Tag ID: <?php echo $tag['class_id']; ?>, Tag Name: <?php echo $tag['class_name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="export-data">
                <h3>Select the table you want to export, then choose the format and click the Export button to download it</h3>
                <form action="" method="POST">
                <select id="databaseSelect" name="databaseSelect">
                    <option value="" disabled selected>Select table</option>
                    <?php foreach ($data['tables'] as $table) : ?>
                        <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="formatSelect" name="formatSelect">
                    <option value="" disabled selected>Select format</option>
                    <option value="csv">CSV</option>
                    <option value="json">JSON</option>
                </select>
                <button class="button" id="exportButton" name="exportButton">Export</button>
                </form>
                <?php if (!empty($data['csvDone'])): ?>
                    <p>Tabelul a fost exportat cu succes in folderul "csv" din public</p>
                <?php endif; ?>
                <?php if (!empty($data['jsonDone'])): ?>
                    <p>Tabelul a fost exportat cu succes in folderul "json" din public</p>
                <?php endif; ?>
            </div>

	</div>
</body>