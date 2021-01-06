<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{page_title}</title>
</head>
<body>
    <h1>{page_heading}</h1>
    {subjects_list}
    <h1>{subject}</h1>
    <p>{abbr}</p>
    {/subjects_list}
    {if($status)}
    <p>Welcome to ci4</p>
    {endif}
</body>
</html>