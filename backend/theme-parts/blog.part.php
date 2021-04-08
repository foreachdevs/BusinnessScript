
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Full page editing with Document Properties plugin</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
</head>

<body>
  <textarea cols="80" id="editor1" name="icerik" rows="10" required>

</textarea>
  <script>
      CKEDITOR.replace('editor1', {
          fullPage: true,
          extraPlugins: 'docprops',
          // Disable content filtering because if you use full page mode, you probably
          // want to  freely enter any HTML content in source mode without any limitations.
          allowedContent: true,
          height: 320
      });
  </script>
</body>

</html>