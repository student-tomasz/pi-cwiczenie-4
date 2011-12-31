<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta http-equiv='Content-Language' content='pl' />
    <meta name='Description' content='Projekt do ćwiczenia nr 4 z przedmiotu
      Programowanie internetowe 2011/2012.' />
    <meta name='Author' content='cudzilot' />

    <title>
      Programowanie internetowe 2011/2012
      &raquo; Ćwiczenie 4
    </title>

    <link rel='index' title='Spis projektów z przedmiotu Programowanie internetowe 2011/2012' href='../' />

    <link href='shared/stylesheets/style.css' type='text/css' rel='stylesheet' media='all' />
    <link href='shared/favicon.ico' type='image/ico' rel='shortcut icon' />

    <script src='shared/vendor/javascripts/jquery-latest.min.js' type='text/javascript'></script>
    <script src='shared/vendor/javascripts/prettify-latest/prettify.js' type='text/javascript'></script>
    <link href='shared/vendor/javascripts/prettify-latest/prettify.css' type='text/css' rel='stylesheet' />

    <link href='stylesheets/style.css' type='text/css' rel='stylesheet' media='all' />
  </head>

  <body id='project-4'>
    <div class='header'>
      <h1>
        <a href='../'>Programowanie internetowe 2011/2012</a>
        &raquo; Ćwiczenie 4
      </h1>
    </div>

    <div id='upload' class='section'>
      <h3>Prześlij plik na serwer</h3>
      <form id='upload-form' action='upload.php' enctype='multipart/form-data' method='post'>
        <input type='hidden' id='MAX_FILE_SIZE' name='MAX_FILE_SIZE' value='50000' />  
        <input type='file' id='upload-input' name='file' /> 
        <input type='submit' id='upload-submit' name='submit' value='Wyślij' />
        <p class='hint'>maksymalny rozmiar pliku to <strong>50kB</strong></p>
      </form>
    </div>

    <div id='files'>
      <h3>Pliki na serwerze</h3>
      <table id='files-table'>
        <thead>
          <tr>
            <th>#</th>
            <th>Nazwa</th>
            <th>Typ</th>
            <th>Rozmiar</th>
            <th>Akcje</th>
          </tr>
        </thead>
        <tbody id='files-table-body'>
        </tbody>
      </table>
    </div>

    <div id='validations'>
      <h2>Walidacje:</h2>
      <ul>
        <li id='html_validation'>
          <a href='#'>
            <img alt='Valid XHTML 1.0 Strict' src='shared/images/valid-xhtml-1.0.png' style='border 0; height 31px; width 88px;' />
          </a>
        </li>
        <li id='css_validation'>
          <a href='#'>
            <img alt='Valid CSS!' src='shared/images/valid-css.gif' style='border 0; height 31px; width 88px;' />
          </a>
        </li>
      </ul>
    </div>

    <script type='text/javascript' src='javascripts/helpers.js'></script>
    <script type='text/javascript' src='javascripts/uploader.js'></script>
  </body>
</html>
