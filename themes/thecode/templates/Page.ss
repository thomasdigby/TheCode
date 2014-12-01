<!doctype html>
<html class="no_js" lang="en">
<head>
        <% base_tag %>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="themes/thecode/css/style.min.css" />
        <title>The Code</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type=$
        <link rel="icon" type="image/png" href="codeIcon.png" />
</head>
<body class="<% if $className != 'SiteTree' %>$className<% else %>$CSS_Class<% end_if %>">
        <% include Navigation %>
        <div class="page_content">
                $Layout
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script type="text/javascript" src="themes/thecode/scripts/all.min.js"></script>
</body>
</html>