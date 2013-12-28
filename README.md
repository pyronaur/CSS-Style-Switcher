*I'll start off saying, that you can read more about the script here: http://justnorris.com/css-switch-script/*

##Overwiew: =
A Simple PHP Script to switch CSS Styles. Support for multiple CSS files at once. Has support for default CSS files, additional ones, etc. A pretty neat script and a lot more reliable solution then JavaScript. 


## Functionality

  * No PHP Knowledge required at all, No installing, just drop the file in your CSS Folder, and make sure the server supports PHP.
  * Ideal to showcase your work in multiple stylesheets but one HTML File.
  * Faster than JavaScript method and works with browsers who don’t have JS enabled
  * Automatically defines one or more default CSS file in the following order:
  * Look for `default_1.css` and `default_2.css` to set as default
  * If not found scan the directory for CSS files and use the first one found (ordered alphabetically)
  * Use Links to change styles. So `<a href=”css/switcher.php?style=another_1.css+another_2.css+another_3.css”>Another Style</a>` is going to switch the style, set a cookie for 1 hour and then redirect back to last page. If last page visited can’t be found (HTTP_REFERER) PHP script will redirect back to index of the site.

## Setup

  * Download the script
  * Insert switcher.php to your CSS Folder (In best scenario, you have a seperate folder with CSS files, if not, it’s okay, the script filters CSS files when listing them)
  * In the site `<head>` insert something like this:
    - `<link rel="stylesheet" type="text/css" href="css/switch.php">`
